<?php

namespace App\Filament\Resources\ScheduleSlots\Pages;

use App\Filament\Resources\ScheduleSlots\ScheduleSlotResource;
use App\Imports\ScheduleSlotsImport;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Maatwebsite\Excel\Facades\Excel;

class ListScheduleSlots extends ListRecords
{
    protected static string $resource = ScheduleSlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('downloadTemplate')
                ->label('Unduh Template')
                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->action(fn () => response()->streamDownload(function (): void {
                    echo implode("\n", [
                        'consultant,starts_at,ends_at,status',
                        'Budi Santoso,2026-08-03 09:00:00,2026-08-03 10:00:00,available',
                        'Siti Rahma,2026-08-04 09:00:00,2026-08-04 10:00:00,booked',
                    ]);
                }, 'template-jadwal.csv', ['Content-Type' => 'text/csv'])),
            Action::make('import')
                ->label('Import Jadwal')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('primary')
                ->modalHeading('Import Data Jadwal')
                ->modalDescription('Unggah file CSV atau Excel. Kolom yang didukung: consultant (nama/email/ID), starts_at, ends_at, status (opsional: available/booked/blocked). Baris dengan konsultan tidak ditemukan, tanggal tidak valid, atau duplikat akan dilewati. Gunakan pemisah koma dan pastikan file ber-encoding UTF-8.')
                ->form([
                    FileUpload::make('file')
                        ->label('File CSV / Excel')
                        ->disk('local')
                        ->directory('imports')
                        ->acceptedFileTypes([
                            'text/csv',
                            'text/plain',
                            'text/comma-separated-values',
                            'application/csv',
                            'application/vnd.ms-excel',
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/octet-stream',
                        ])
                        ->maxSize(5120)
                        ->required()
                        ->getUploadedFileNameForStorageUsing(fn (TemporaryUploadedFile $file): string => 'jadwal-'
                            . now()->format('Ymd-His')
                            . '-' . Str::random(6)
                            . '.' . $file->getClientOriginalExtension()),
                ])
                ->action(function (array $data): void {
                    $import = new ScheduleSlotsImport();
                    $path = Storage::disk('local')->path($data['file']);

                    try {
                        Excel::import($import, $path);
                    } catch (\Throwable $exception) {
                        Notification::make()
                            ->title('Import gagal')
                            ->body('File tidak dapat dibaca. Pastikan format file CSV/Excel benar.')
                            ->danger()
                            ->send();

                        return;
                    }

                    Notification::make()
                        ->title('Import selesai')
                        ->body(sprintf(
                            '%d slot berhasil diimpor, %d baris dilewati (%d duplikat).',
                            $import->imported,
                            $import->skipped,
                            $import->duplicates,
                        ))
                        ->success()
                        ->send();
                }),
            CreateAction::make(),
        ];
    }
}
