<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostsResource\Pages;
use App\Filament\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Toggle;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Support\Str;

class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $slug = 'blog/posts';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')->default(auth()->user()->id),
                TextInput::make('title')
                    ->label('Title')
                    ->maxLength(250)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->disabled()
                    ->required()
                    ->unique(column: 'slug')
                    ->default(fn () => Str::slug(request()->input('title'))),
                TinyEditor::make('body')->required()->columnSpan(3),
                SpatieMediaLibraryFileUpload::make('post')->collection('posts')->label('Photo')->required()->columnSpan(3),
                Toggle::make('is_visible')
                    ->label('Visible to guests.')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('body'),
                Tables\Columns\TextColumn::make('views'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            'create' => Pages\CreatePosts::route('/create'),
            'edit' => Pages\EditPosts::route('/{record}/edit'),
        ];
    }
}
