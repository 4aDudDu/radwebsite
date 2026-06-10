<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class HeadlinePostsWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Berita Headline (Carousel) Saat Ini';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()->where('is_headline', true)->latest()
            )
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Berita')
                    ->limit(50),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                ToggleColumn::make('is_headline')
                    ->label('Status Headline'),
                TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
            ])
            ->actions([
                Tables\Actions\Action::make('edit')
                    ->url(fn (Post $record): string => route('filament.admin.resources.posts.edit', $record))
                    ->icon('heroicon-m-pencil-square'),
            ]);
    }
}
