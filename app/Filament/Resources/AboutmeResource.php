<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutmeResource\Pages;
use App\Filament\Resources\AboutmeResource\RelationManagers;
use App\Models\Aboutme;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;


class AboutmeResource extends Resource
{
    protected static ?string $model = Aboutme::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required(),
                TextInput::make('profile')->label('Experience')->required()->columnSpan(2),
                TextInput::make('email')->label('Email')->required()->email(),
                TextInput::make('phone')->mask(fn (TextInput\Mask $mask) => $mask->pattern('+{383} ({4}0) 000-000'))->required()->placeholder('+383(4_) ___-____'),
                RichEditor::make('body')->required()->columnSpan(3),
                Repeater::make('skills')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('percentage')->required()->integer()->maxValue(100)->minValue(1),
                        TextInput::make('icon')->nullable(),
                    ])->columns(3),
                Repeater::make('socials')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('url')->required()->url(),
                        TextInput::make('icon')->nullable(),
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListAboutmes::route('/'),
            'create' => Pages\CreateAboutme::route('/create'),
            'edit' => Pages\EditAboutme::route('/{record}/edit'),
        ];
    }
}
