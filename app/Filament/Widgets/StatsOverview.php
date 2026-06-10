<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalViews = Post::sum('views_count');
        $totalPosts = Post::count();
        $totalCategories = Category::count();

        return [
            Stat::make('Total Kunjungan Web', number_format($totalViews))
                ->description('Total akumulasi pembaca')
                ->descriptionIcon('heroicon-m-eye')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
                
            Stat::make('Total Berita', number_format($totalPosts))
                ->description('Artikel yang telah diterbitkan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
                
            Stat::make('Total Kategori', number_format($totalCategories))
                ->description('Kategori berita aktif')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('warning'),
        ];
    }
}
