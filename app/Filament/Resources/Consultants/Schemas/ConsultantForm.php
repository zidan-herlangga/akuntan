<?php

declare(strict_types=1);

namespace App\Filament\Resources\Consultants\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ConsultantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Dasar')
                    ->description('Data identitas dan akun pengguna')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('email')
                                    ->label('Email')
                                    ->required()
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->label('Telepon')
                                    ->tel()
                                    ->maxLength(30),
                                Select::make('user_id')
                                    ->label('Akun Pengguna')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->helperText('Hubungkan dengan akun login (opsional)'),
                            ]),
                    ]),

                Section::make('Detail Profesional')
                    ->description('Spesialisasi dan biografi singkat')
                    ->icon('heroicon-o-academic-cap')
                    ->collapsible()
                    ->schema([
                        TextInput::make('specialization')
                            ->label('Spesialisasi')
                            ->maxLength(150),
                        Textarea::make('bio')
                            ->label('Biografi')
                            ->rows(4)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ]),

                Section::make('Penjadwalan')
                    ->description('Zona waktu dan integrasi kalender')
                    ->icon('heroicon-o-calendar-days')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('timezone')
                                    ->label('Zona Waktu')
                                    ->maxLength(100)
                                    ->default('Asia/Jakarta')
                                    ->required(),
                                TextInput::make('google_calendar_id')
                                    ->label('ID Google Calendar')
                                    ->placeholder('primary')
                                    ->maxLength(255),
                            ]),
                    ]),

                Section::make('Status')
                    ->description('Ketersediaan konsultan untuk booking baru')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->collapsible()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Nonaktifkan jika konsultan tidak lagi menerima booking baru'),
                    ]),
            ]);
    }
}