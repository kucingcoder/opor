<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JournalProceedingResource\Pages;
use App\Filament\Resources\JournalProceedingResource\RelationManagers;
use App\Models\JournalProceeding;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JournalProceedingResource extends Resource
{
    protected static ?string $model = JournalProceeding::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('thumbnail')->directory('thumbnails/journals')->image()->required(),
            Forms\Components\TextInput::make('title')->required()->maxLength(150),
            Forms\Components\Textarea::make('description')->required()->maxLength(128),
            Forms\Components\TextInput::make('category')->required()->maxLength(16),
            Forms\Components\TextInput::make('visit_link')->url(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('thumbnail')->square(),
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('category'),
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
            'index' => Pages\ListJournalProceedings::route('/'),
            'create' => Pages\CreateJournalProceeding::route('/create'),
            'edit' => Pages\EditJournalProceeding::route('/{record}/edit'),
        ];
    }
}
