<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectGalleryResource\Pages;
use App\Filament\Resources\ProjectGalleryResource\RelationManagers;
use App\Models\ProjectGallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectGalleryResource extends Resource
{
    protected static ?string $model = ProjectGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('image')->directory('projects/gallery')->image()->required(),
            Forms\Components\Textarea::make('description')->required()->maxLength(128),
            Forms\Components\Select::make('id_project')->relationship('project', 'name')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')->square(),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('project.name')->label('Project'),
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
            'index' => Pages\ListProjectGalleries::route('/'),
            'create' => Pages\CreateProjectGallery::route('/create'),
            'edit' => Pages\EditProjectGallery::route('/{record}/edit'),
        ];
    }
}
