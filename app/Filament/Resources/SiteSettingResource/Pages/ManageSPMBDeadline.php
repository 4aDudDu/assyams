<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\Page;
use Filament\Support\Enums\MaxWidth;
use Carbon\Carbon;

class ManageSPMBDeadline extends Page
{
    protected static string $resource = SiteSettingResource::class;

    protected static string $view = 'filament.resources.site-setting-resource.pages.manage-spmb-deadline';

    protected static ?string $title = 'Atur Deadline SPMB';

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Deadline SPMB';

    protected static ?int $navigationSort = 1;

    public ?array $data = [];

    public function mount(): void
    {
        // Ambil data deadline dari database
        $setting = SiteSetting::where('key', 'spmb_deadline')->first();
        
        if ($setting && $setting->value) {
            $this->data['deadline'] = $setting->value;
        } else {
            $this->data['deadline'] = now()->endOfYear()->format('Y-m-d H:i');
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Heading::make('Pengaturan Waktu Countdown SPMB')
                        ->description('Atur kapan pendaftaran SPMB akan berakhir. Countdown akan ditampilkan di halaman depan.'),

                    Forms\Components\DateTimePicker::make('deadline')
                        ->label('Waktu Berakhir Pendaftaran SPMB')
                        ->description('Pilih tanggal dan jam kapan SPMB akan ditutup')
                        ->required()
                        ->seconds(false)
                        ->native(false),

                    Forms\Components\TextInput::make('display')
                        ->label('Tampilan Countdown')
                        ->disabled()
                        ->formatStateUsing(fn () => 
                            Carbon::parse($this->data['deadline'] ?? now())->translatedFormat('d F Y, H:i') . ' WIB'
                        )
                        ->helperText('Ini adalah tampilan yang akan muncul di halaman depan (SPMB Akan Berakhir Pada)'),

                    Forms\Components\Placeholder::make('info')
                        ->label('Informasi Tambahan')
                        ->content(fn () => view('filament.resources.site-setting-resource.pages.spmb-info', [
                            'deadline' => Carbon::parse($this->data['deadline'] ?? now()),
                        ])),
                ])
                    ->columns(1),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Simpan atau update setting
        SiteSetting::updateOrCreate(
            ['key' => 'spmb_deadline'],
            ['value' => Carbon::createFromFormat('Y-m-d H:i', $data['deadline'])->format('Y-m-d H:i:s')]
        );

        $this->dispatch('notify', [
            'type' => 'success',
            'title' => 'Berhasil',
            'message' => 'Deadline SPMB telah diperbarui!',
        ]);
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Simpan Pengaturan')
            ->submit('save')
            ->keyBindings(['mod+s']);
    }
}
