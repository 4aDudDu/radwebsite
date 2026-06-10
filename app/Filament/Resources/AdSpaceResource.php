<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdSpaceResource\Pages;
use App\Filament\Resources\AdSpaceResource\RelationManagers;
use App\Models\AdSpace;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdSpaceResource extends Resource
{
    protected static ?string $model = AdSpace::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    
    protected static ?string $modelLabel = 'Ruang Iklan';
    protected static ?string $pluralModelLabel = 'Ruang Iklan';
    protected static ?string $navigationLabel = 'Ruang Iklan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Ad Reference Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('title')
                            ->label('Ad Display Title')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->label('Destination URL')
                            ->url()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Ad Description')
                            ->columnSpanFull()
                            ->rows(3),
                        Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                            ->collection('ad_images')
                            ->multiple()
                            ->image()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('location')
                            ->options([
                                'header' => 'Header (Top)',
                                'sidebar' => 'Sidebar (Right)',
                                'footer' => 'Footer (Bottom)',
                                'content' => 'Inside Content',
                            ])
                            ->required()
                            ->native(false),
                        Forms\Components\Textarea::make('code')
                            ->label('Custom HTML/Script (Optional)')
                            ->columnSpanFull()
                            ->rows(3),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->collection('ad_images'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdSpaces::route('/'),
            'create' => Pages\CreateAdSpace::route('/create'),
            'edit' => Pages\EditAdSpace::route('/{record}/edit'),
        ];
    }
}
