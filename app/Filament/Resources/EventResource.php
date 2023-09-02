<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $label = 'Evento';
    protected static ?string $navigationGroup = 'Gerenciar conteúdo';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->description(__('Informações básicas'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('Nome do evento'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->label(__('Descrição do evento'))
                            ->disableToolbarButtons([
                                'attachFiles',
                                'link',
                                'codeBlock'
                            ])
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('cover_path')
                            ->label(__('Capa do evento'))
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),

                    ])->columnSpan(2),
                Forms\Components\Section::make()
                    ->description(__('Informações adicionais'))
                    ->schema([
                        Forms\Components\Select::make('categories')
                            ->label(__('Categorias'))
                            ->hint(__('Artigos disponiveis no evento'))
                            ->relationship('categories', 'name')
                            ->preload()
                            ->multiple(),
                        Forms\Components\Select::make('articles')
                            ->label(__('Artigos'))
                            ->hint(__('Artigos disponiveis no evento'))
                            ->relationship('articles', 'title')
                            ->preload()
                            ->multiple(),
                        Forms\Components\Toggle::make('is_active')
                            ->label(__('Ativo'))
                            ->required(),
                        Forms\Components\ColorPicker::make('primary_color')
                            ->label(__('Cor Primaria'))
                            ->default('#23004C'),
                        Forms\Components\ColorPicker::make('secondary_color')
                            ->label(__('Cor Secundaria')),
                    ])
                    ->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_path')
                    ->label(__('Capa')),
                Tables\Columns\ColorColumn::make('primary_color')
                    ->label(__('Cor Primaria'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ColorColumn::make('secondary_color')
                    ->label(__('Cor Secundaria'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Nome'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label(__('Categorias'))
                    ->badge(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label(__('Ativo')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Criado em'))
                    ->sortable()
                    ->date('d/m/y h:i')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Atualizado em'))
                    ->date('d/m/y h:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ArticlesRelationManager::class,
            RelationManagers\EmailRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
