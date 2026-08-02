<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bookings\Pages;

use App\Actions\Booking\CancelBookingAction;
use App\Enums\BookingStatus;
use App\Filament\Resources\Bookings\BookingResource;
use App\Jobs\SendBookingConfirmedJob;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('confirm')
                ->label('Konfirmasi')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->visible(fn (): bool => $this->record->status === BookingStatus::Pending)
                ->action(function (): void {
                    $this->record->update(['status' => BookingStatus::Confirmed]);

                    SendBookingConfirmedJob::dispatch($this->record);

                    $this->redirect(request()->header('Referer', $this->getUrl(['record' => $this->record])));
                }),
            Action::make('complete')
                ->label('Selesaikan')
                ->color('primary')
                ->visible(fn (): bool => $this->record->status === BookingStatus::Confirmed)
                ->action(function (): void {
                    $this->record->update(['status' => BookingStatus::Completed]);

                    $this->redirect(request()->header('Referer', $this->getUrl(['record' => $this->record])));
                }),
            Action::make('cancel')
                ->label('Batalkan')
                ->color('danger')
                ->icon('heroicon-o-x-circle')
                ->visible(fn (): bool => ! in_array($this->record->status, [BookingStatus::Completed, BookingStatus::Cancelled], true))
                ->action(function (): void {
                    app(CancelBookingAction::class)->handle($this->record, 'Cancelled from admin');

                    $this->redirect(request()->header('Referer', $this->getUrl(['record' => $this->record])));
                }),
            DeleteAction::make(),
        ];
    }
}
