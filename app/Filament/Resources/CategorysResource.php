<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorysResource\Pages;
use App\Filament\Resources\CategorysResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use App\Models\{Categorys, Users};
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Illuminate\Support\Str;

class CategorysResource extends Resource
{
    protected static ?string $model = Categorys::class;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $slug = 'blog/categories';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Hidden::make('user_id')->default(auth()->user()->id),
                        TextInput::make('title')
                            ->label('Category')
                            ->maxLength(250)
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->disabled()
                            ->required()
                            ->unique(column: 'slug')
                            ->default(fn () => Str::slug(request()->input('title'))),
                        TextInput::make('body')->label('Description')->maxLength(250)->columnSpan(3)->nullable(),
                        SpatieMediaLibraryFileUpload::make('category')->collection('category')->label('Photo')->required()->columnSpan(3),
                        Toggle::make('is_visible')
                            ->label('Visible to guests.')
                            ->default(true),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (?Categorys $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (?Categorys $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('category')->collection('category')->conversion('thumb'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('body'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('views'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategorys::route('/'),
            'create' => Pages\CreateCategorys::route('/create'),
            'edit' => Pages\EditCategorys::route('/{record}/edit'),
        ];
    }
}
