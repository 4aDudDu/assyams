<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $activeSemester = Semester::where('is_active', true)->first();

        if (!$activeSemester) {
            return response()->json(['message' => 'Tidak ada semester aktif'], 404);
        }

        // 1. Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // 2. Cek apakah sudah ada data pembayaran pending?
        $payment = Payment::where('user_id', $user->id)
            ->where('semester_id', $activeSemester->id)
            ->first();

        // Jika belum ada, buat baru
        if (!$payment) {
            $orderId = 'SPP-' . $user->id . '-' . time(); // ID Unik: SPP-USERID-TIMESTAMP
            
            $payment = Payment::create([
                'user_id' => $user->id,
                'semester_id' => $activeSemester->id,
                'order_id' => $orderId,
                'amount' => $activeSemester->tuition_fee,
                'status' => 'pending',
            ]);
        }

        // 3. Jika token snap belum ada atau expired, minta baru ke Midtrans
        if (empty($payment->snap_token)) {
            $params = [
                'transaction_details' => [
                    'order_id' => $payment->order_id,
                    'gross_amount' => (int) $payment->amount,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
                'item_details' => [[
                    'id' => 'SPP-' . $activeSemester->id,
                    'price' => (int) $payment->amount,
                    'quantity' => 1,
                    'name' => 'SPP Semester ' . $activeSemester->name,
                ]]
            ];

            $snapToken = Snap::getSnapToken($params);
            
            // Simpan token ke database biar gak request ulang terus
            $payment->update(['snap_token' => $snapToken]);
        }

        return response()->json(['snap_token' => $payment->snap_token]);
    }

    // Nanti kita butuh callback di sini, tapi untuk sekarang checkout dulu
    public function success(Request $request)
    {
        // Update status sederhana (Untuk demo, idealnya pakai Webhook/Callback)
        $orderId = $request->query('order_id');
        $payment = Payment::where('order_id', $orderId)->first();
        
        if($payment) {
            $payment->update(['status' => 'success']);
        }

        return redirect()->route('dashboard')->with('success', 'Pembayaran Berhasil!');
    }
}