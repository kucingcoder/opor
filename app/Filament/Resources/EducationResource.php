<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Filament\Resources\EducationResource\RelationManagers;
use App\Models\Education;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('logo')
                ->directory('logos/educations')
                ->image()
                ->required(),
            Forms\Components\TextInput::make('name')->required()->maxLength(32),
            Forms\Components\TextInput::make('info')->required()->maxLength(64),
            Forms\Components\DatePicker::make('year_start')->required(),
            Forms\Components\DatePicker::make('year_end')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('logo')->square(),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('info'),
            Tables\Columns\TextColumn::make('year_start')->date(),
            Tables\Columns\TextColumn::make('year_end')->date(),
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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
