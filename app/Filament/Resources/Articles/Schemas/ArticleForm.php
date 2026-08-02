<?php

declare(strict_types=1);

namespace App\Filament\Resources\Articles\Schemas;

use App\Models\Article;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Artikel')
                    ->description('Judul, slug, dan isi utama artikel')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Artikel')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $state, callable $set, ?string $old, callable $get) {
                                        // hanya auto-generate kalau slug belum diubah manual
                                        if (blank($get('slug')) || $get('slug') === Str::slug($old)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),
                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Kosongkan untuk generate otomatis dari judul')
                                    ->unique(ignoreRecord: true),
                            ]),
                        Textarea::make('excerpt')
                            ->label('Excerpt')
                            ->rows(2)
                            ->maxLength(255)
                            ->columnSpanFull(),
                        RichEditor::make('body')
                            ->label('Isi Artikel')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Kategori & Tag')
                    ->icon('heroicon-o-tag')
                    ->collapsible()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('category')
                                    ->label('Kategori')
                                    ->options(fn (): array => Article::query()
                                        ->whereNotNull('category')
                                        ->pluck('category', 'category')
                                        ->all())
                                    ->searchable()
                                    ->createOptionForm([
                                        TextInput::make('name')->label('Nama Kategori')->required(),
                                    ])
                                    ->createOptionUsing(fn (array $data): string => $data['name']),
                                TagsInput::make('tags')
                                    ->label('Tag'),
                            ]),
                    ])
                    ->collapsible(),

                Section::make('Publikasi')
                    ->description('Atur status terbit dan jadwal publikasi')
                    ->icon('heroicon-o-rocket-launch')
                    ->collapsible()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Toggle::make('is_published')
                                    ->label('Terbitkan')
                                    ->live()
                                    ->inline(false),
                                DateTimePicker::make('published_at')
                                    ->label('Tanggal Terbit')
                                    ->default(now())
                                    ->visible(fn (callable $get) => $get('is_published')),
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
                            ->directory('article-covers'),
                    ]),
            ]);
    }
}
