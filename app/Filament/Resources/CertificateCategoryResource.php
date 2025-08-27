<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateCategoryResource\Pages;
use App\Filament\Resources\CertificateCategoryResource\RelationManagers;
use App\Models\CertificateCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateCategoryResource extends Resource
{
    protected static ?string $model = CertificateCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(32),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListCertificateCategories::route('/'),
            'create' => Pages\CreateCertificateCategory::route('/create'),
            'edit' => Pages\EditCertificateCategory::route('/{record}/edit'),
        ];
    }
}
