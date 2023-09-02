<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Actions\Action;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $slug = 'articles';

    protected static ?string $label = 'Artigo';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Gerenciar conteúdo';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Group::make()->schema([
                    Section::make()
                        ->schema([
                            TextInput::make('title')
                                ->label(__('Titulo'))
                                ->required(),
                            Textarea::make('subtitle')
                                ->label(__('Subtitulo'))
                                ->required(),
                            TextInput::make('authors')
                                ->label(__('Autores'))
                                ->required(),
                            TextInput::make('available_at')
                                ->label(__('Disponivel em:'))
                                ->placeholder(__('ex: https://site.com')),
                            FileUpload::make('file_path')
                                ->label(__('PDF do Artigo'))
                                ->acceptedFileTypes(['application/pdf'])
                                ->required(),
                            ViewField::make("PDF")
                                ->view('filament-pdfiframe'),
                        ]),
                ])->columnSpan(2),

                \Filament\Forms\Components\Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                Placeholder::make('created_at')
                                    ->label(__('Data de Criação'))
                                    ->content(fn(?Article $record): string => $record?->created_at?->diffForHumans() ?? '-'),
                                Placeholder::make('updated_at')
                                    ->label(__('Data de Atualização'))
                                    ->content(fn(?Article $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
                            ]),
                        Section::make()
                            ->schema([
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label(__('Nome'))
                                            ->required(),
                                    ])
                                    ->createOptionAction(function (Action $action) {
                                        return $action
                                            ->modalHeading(__('Criar Categoria'))
                                            ->modalSubmitActionLabel(__('Criar'))
                                            ->modalWidth('md');
                                    })
                                    ->label(__('Categoria'))
                                    ->preload(),
                                FileUpload::make('cover_path')
                                    ->label(__('Capa do artigo'))
                                    ->image()
                                    ->imageEditor()
                                    ->columnSpanFull(),
                            ])

                    ])
                    ->columnSpan(1),


            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_path')
                    ->label(__('Capa')),

                TextColumn::make('title')
                    ->label(__('Titulo'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('authors')
                    ->label(__('Autores'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('available_at')
                    ->label(__('Disponivel em'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('subtitle')
                    ->label(__('Subtitulo'))
                    ->limit(50)
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name')
                    ->badge()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);

    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }



    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
