<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('thumbnail')->directory('thumbnails/projects')->image()->required(),
            Forms\Components\TextInput::make('name')->required()->maxLength(64),
            Forms\Components\Textarea::make('description')->required()->maxLength(128),
            Forms\Components\TextInput::make('visit_link')->url(),
            Forms\Components\TextInput::make('client_name')->maxLength(64),
            Forms\Components\FileUpload::make('client_logo')->directory('logos/clients')->image(),
            Forms\Components\TextInput::make('client_link')->url(),
            Forms\Components\Select::make('category')->options([
                'paid' => 'Paid',
                'unpaid' => 'Unpaid',
                'opensource' => 'Open Source',
                'collaboration' => 'Collaboration',
                'donation' => 'Donation',
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('thumbnail')->square(),
            Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('category')->badge(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
