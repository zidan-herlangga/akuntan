<?php

declare(strict_types=1);

namespace App\Filament\Resources\CaseStudies\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CaseStudyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Klien')
                    ->description('Identitas klien dan industri')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('client_name')
                                    ->label('Nama Klien')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $state, callable $set, ?string $old, callable $get) {
                                        if (blank($get('slug')) || $get('slug') === Str::slug($old)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Kosongkan untuk generate otomatis dari nama klien')
                                    ->unique(ignoreRecord: true),
                                TextInput::make('industry')
                                    ->label('Industri')
                                    ->maxLength(100),
                            ]),
                    ]),

                Section::make('Narasi Studi Kasus')
                    ->description('Tantangan, solusi, dan hasil yang dicapai')
                    ->icon('heroicon-o-chart-bar')
                    ->collapsible()
                    ->schema([
                        Textarea::make('challenge')
                            ->label('Tantangan')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('solution')
                            ->label('Solusi')
                            ->rows(3)
                            ->columnSpanFull(),
                        Textarea::make('results')
                            ->label('Hasil')
                            ->rows(3)
                            ->columnSpanFull(),
                        KeyValue::make('metrics')
                            ->label('Metrik Hasil')
                            ->keyLabel('Metrik')
                            ->valueLabel('Nilai')
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengaturan')
                    ->description('Status publikasi dan tanda unggulan')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Toggle::make('nda_compliant')
                                    ->label('NDA Compliant')
                                    ->helperText('Sesuai perjanjian kerahasiaan klien'),
                                Toggle::make('is_featured')
                                    ->label('Tampilkan sebagai Unggulan'),
                                Toggle::make('is_active')
                                    ->label('Aktif')
                                    ->default(true),
                            ]),
                    ]),

                Section::make('Sampul')
                    ->icon('heroicon-o-photo')
                    ->collapsible()
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('cover')
                            ->label('Gambar Sampul')
                            ->collection('cover')
                            ->image()
                            ->imageEditor()
                            ->directory('case-study-covers'),
                    ]),
            ]);
    }
}