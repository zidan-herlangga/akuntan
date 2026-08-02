<?php

declare(strict_types=1);

namespace App\Filament\Resources\Bookings\Schemas;

use App\Enums\BookingStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Klien')
                    ->description('Data kontak dan perusahaan klien')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('client_name')
                                    ->label('Nama Klien')
                                    ->required()
                                    ->maxLength(150),
                                TextInput::make('client_email')
                                    ->label('Email Klien')
                                    ->required()
                                    ->email(),
                                TextInput::make('client_phone')
                                    ->label('Telepon Klien')
                                    ->required()
                                    ->tel()
                                    ->maxLength(30),
                                TextInput::make('company_name')
                                    ->label('Nama Perusahaan')
                                    ->maxLength(200),
                                TextInput::make('company_npwp')
                                    ->label('NPWP Perusahaan')
                                    ->maxLength(30)
                                    ->mask('99.999.999.9-999.999'),
                            ]),
                        Textarea::make('financial_issue_description')
                            ->label('Deskripsi Isu Keuangan')
                            ->rows(4)
                            ->columnSpanFull(),
                        Textarea::make('notes')
                            ->label('Catatan')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Penjadwalan')
                    ->description('Konsultan dan waktu pelaksanaan sesi')
                    ->icon('heroicon-o-calendar-days')
                    ->schema([
                        Select::make('consultant_id')
                            ->label('Konsultan')
                            ->relationship('consultant', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                        DateTimePicker::make('starts_at')
                            ->label('Mulai')
                            ->required()
                            ->native(false),
                        DateTimePicker::make('ends_at')
                            ->label('Selesai')
                            ->required()
                            ->native(false)
                            ->after('starts_at'),
                    ])
                    ->columns(2),

                Section::make('Status & Sistem')
                    ->description('Informasi status booking dan data otomatis dari sistem')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->collapsible()
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options(BookingStatus::class)
                            ->default(BookingStatus::Pending->value)
                            ->live()
                            ->required(),
                        TextInput::make('meeting_link')
                            ->label('Link Meeting')
                            ->url()
                            ->visible(fn (callable $get) => $get('status') === BookingStatus::Confirmed->value)
                            ->columnSpanFull(),
                        TextInput::make('booking_number')
                            ->label('Nomor Booking')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Otomatis dari sistem'),
                        TextInput::make('source')
                            ->label('Sumber')
                            ->maxLength(30)
                            ->readOnly(),
                        TextInput::make('ip_address')
                            ->label('Alamat IP')
                            ->readOnly(),
                    ])
                    ->columns(2),
            ]);
    }
}