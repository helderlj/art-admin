<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Category;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $label = 'Categoria';
    protected static ?string $navigationGroup = 'Gerenciar conteúdo';
    protected static ?int $navigationSort = 0;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()
                        ->schema([
                            TextInput::make('name')
                                ->label(__('Nome'))
                                ->required(),
                            TextInput::make('description')
                                ->label(__('Descrição')),
                            FileUpload::make('cover_path')
                                ->label(__('Capa'))
                                ->image()
                                ->imageEditor()
                                ->columnSpanFull(),
                            Toggle::make('is_visible')
                                ->label(__('Ativo'))
                                ->default(true),

                        ]),
                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make()
                        ->schema([
                            Placeholder::make('created_at')
                                ->label('Created Date')
                                ->content(fn(?Category $record
                                ): string => $record?->created_at?->diffForHumans() ?? '-'),

                            Placeholder::make('updated_at')
                                ->label('Last Modified Date')
                                ->content(fn(?Category $record
                                ): string => $record?->updated_at?->diffForHumans() ?? '-'),
                        ]),

                    Section::make()->schema([
                        ColorPicker::make('text_primary_color')
                            ->label(__('Cor Primaria TEXTO')),
                        ColorPicker::make('text_secondary_color')
                            ->label(__('Cor Secundaria TEXTO')),
                        ColorPicker::make('bg_primary_color')
                            ->label(__('Cor Primaria FUNDO')),
                        ColorPicker::make('bg_secondary_color')
                            ->label(__('Cor Secundaria FUNDO')),

                    ])
                ])->columnSpan(1),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_path')
                    ->label(__('Capa')),
                TextColumn::make('name')
                    ->label(__('Nome'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label(__('Descrição'))
                    ->limit(50),
                ToggleColumn::make('is_visible'),
                ColorColumn::make('primary_color')
                    ->label(__('Cor Primaria'))
                    ->toggleable(isToggledHiddenByDefault: true),
                ColorColumn::make('secondary_color')
                    ->label(__('Cor Secundaria'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ArticlesRelationManager::class,
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }
}
