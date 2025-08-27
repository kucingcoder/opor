<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Filament\Resources\ExperienceResource\RelationManagers;
use App\Models\Experience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('logo')
                ->directory('logos/experiences')
                ->image()
                ->required(),
            Forms\Components\TextInput::make('name')->required()->maxLength(32),
            Forms\Components\TextInput::make('job_desk')->required()->maxLength(64),
            Forms\Components\DatePicker::make('year_start')->required(),
            Forms\Components\DatePicker::make('year_end')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('logo')->square(),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('job_desk'),
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
