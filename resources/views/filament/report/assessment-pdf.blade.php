<!DOCTYPE html>
<html>
<head>
    <title>Rekap Bulanan Penilaian</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; }
        .table th { background-color: #f0fdf4; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #22c55e; padding-bottom: 10px; }
        .title { font-size: 20px; font-weight: bold; color: #166534; }
        .subtitle { font-size: 16px; margin-top: 5px; }
        .info-table { margin-bottom: 20px; }
        .info-table td { padding: 4px; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">REKAPITULASI PENILAIAN BULANAN (SEPERTI BUKU SETORAN)</div>
        <div class="subtitle">SIT Pondok As-Syams</div>
        <div>Tahun: {{ $assessment->year }} | Bulan: {{ ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'][$assessment->month - 1] ?? $assessment->month }}</div>
    </div>
    
    <table class="info-table">
        <tr><td><strong>Santri</strong></td><td>: {{ $assessment->student ? $assessment->student->name : '-' }}</td></tr>
        <tr><td><strong>Kelas</strong></td><td>: {{ $assessment->classGroup ? $assessment->classGroup->name : '-' }}</td></tr>
        <tr><td><strong>Ustad</strong></td><td>: {{ ($assessment->classGroup && $assessment->classGroup->teacher) ? $assessment->classGroup->teacher->name : '-' }}</td></tr>
        <tr><td><strong>Jenis Penilaian</strong></td><td>: <span style="text-transform: uppercase; font-weight: bold;">{{ $assessment->assessment_type }}</span></td></tr>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Nama Santri / Penyetor</th>
                <th width="15%">Nilai Penyetoran</th>
                <th width="20%">Surah</th>
                <th width="15%">Ayat</th>
                <th width="15%">L/C/TL</th>
            </tr>
        </thead>
        <tbody>
            @if(is_array($assessment->data) && count($assessment->data) > 0)
                @foreach($assessment->data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['nama'] ?? '-' }}</td>
                    <td>{{ $item['nilai_penyetoran'] ?? '-' }}</td>
                    <td>{{ $item['surah'] ?? '-' }}</td>
                    <td>{{ $item['ayat'] ?? '-' }}</td>
                    <td>{{ $item['nilai'] ?? '-' }}</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada item penilaian.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div style="margin-top: 50px; text-align: right; margin-right: 50px;">
        <p>Pekanbaru, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
        <br><br><br>
        <p><strong>{{ ($assessment->classGroup && $assessment->classGroup->teacher) ? $assessment->classGroup->teacher->name : 'Ust. / Usth.' }}</strong></p>
    </div>
</body>
</html>
