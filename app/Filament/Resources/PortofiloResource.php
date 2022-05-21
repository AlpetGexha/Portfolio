<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortofiloResource\Pages;
use App\Filament\Resources\PortofiloResource\RelationManagers;
use App\Models\Portofilo;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieTagsInput;
use Illuminate\Support\Str;

class PortofiloResource extends Resource
{
    protected static ?string $model = Portofilo::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    protected static ?string $navigationGroup = 'Info';

    protected static ?string $slug = 'info/portofilo';

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
                RichEditor::make('body')->required()->columnSpan(3),
                SpatieTagsInput::make('tags')->type('protofilo_categories'),
                SpatieMediaLibraryFileUpload::make('portofilo')
                ->collection('portofilo')
                ->acceptedFileTypes(['image/jpeg', 'image/png'])
                ->label('Photo')
                ->multiple()
                ->maxFiles(10)
                ->required()
                ->columnSpan(3),
                TextInput::make('url')->required()->url(),
                // data_created
                DatePicker::make('data_created')
                    ->minDate(now()->subYears(50))
                    ->maxDate(now())
                    ->required()
                    ->columnSpan(2),
                Toggle::make('status')
                    ->label('Visible to guests.')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                // Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('title'),
                // Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('body')->limit(50),
                Tables\Columns\TextColumn::make('views'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('url'),
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
            'index' => Pages\ListPortofilos::route('/'),
            'create' => Pages\CreatePortofilo::route('/create'),
            'edit' => Pages\EditPortofilo::route('/{record}/edit'),
        ];
    }
}
