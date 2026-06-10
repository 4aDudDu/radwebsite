<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
    protected static ?string $navigationLabel = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Berita')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(['lg' => 2]),

                Section::make('Data Berita')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('thumbnail')
                            ->collection('thumbnail')
                            ->image()
                            ->required(),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable(),
                        DateTimePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now())
                            ->required(),
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('published')
                            ->required()
                            ->native(false),
                        Forms\Components\Hidden::make('author_id')
                            ->default(fn () => auth()->id()),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->collection('thumbnail'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'review' => 'warning',
                        'published' => 'success',
                        default => 'gray',
                    }),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('author.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('views_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('headline')
                    ->icon('heroicon-o-star')
                    ->iconButton()
                    ->color(fn (Post $record) => $record->is_headline ? 'warning' : 'gray')
                    ->action(fn (Post $record) => $record->update(['is_headline' => !$record->is_headline]))
                    ->tooltip('Set as Headline'),

                Tables\Actions\Action::make('breaking')
                    ->icon('heroicon-o-bolt')
                    ->iconButton()
                    ->color(fn (Post $record) => $record->is_breaking_news ? 'warning' : 'gray')
                    ->action(fn (Post $record) => $record->update(['is_breaking_news' => !$record->is_breaking_news]))
                    ->tooltip('Set as Breaking News'),

                Tables\Actions\EditAction::make()
                    ->iconButton(),
                Tables\Actions\DeleteAction::make()
                    ->iconButton(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
