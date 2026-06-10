<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class PopularPostsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Berita Paling Populer (Banyak Dibaca)';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()->where('status', 'published')->orderBy('views_count', 'desc')->limit(5)
            )
            ->columns([
                TextColumn::make('title')
                    ->label('Judul Berita')
                    ->limit(50),
                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge(),
                TextColumn::make('views_count')
                    ->label('Jumlah Pembaca')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->label('Tanggal Publikasi')
                    ->dateTime()
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Lihat')
                    ->url(fn (Post $record): string => route('posts.show', $record->slug))
                    ->icon('heroicon-m-eye')
                    ->openUrlInNewTab(),
            ]);
    }
}
