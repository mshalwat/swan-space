<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentSectionResource\Pages;
use App\Filament\Resources\ContentSectionResource\RelationManagers;
use App\Models\ContentSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContentSectionResource extends Resource
{
    protected static ?string $model = ContentSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Website Content';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Section Information')
                    ->schema([
                        Forms\Components\TextInput::make('section_key')
                            ->label('Section Key')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('Unique identifier (e.g., hero_en, about_de)')
                            ->maxLength(255),

                        Forms\Components\Select::make('language')
                            ->label('Language')
                            ->options([
                                'en' => 'English',
                                'de' => 'Deutsch (German)',
                            ])
                            ->required()
                            ->default('en'),

                        Forms\Components\Select::make('section_type')
                            ->label('Section Type')
                            ->options([
                                'hero' => 'Hero Section',
                                'about' => 'About Section',
                                'services' => 'Services Section',
                                'stats' => 'Statistics',
                                'highlights' => 'Highlights',
                                'testimonials' => 'Testimonials Header',
                                'contact' => 'Contact Section',
                            ])
                            ->required()
                            ->reactive(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),

                        Forms\Components\TextInput::make('order')
                            ->label('Display Order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge Text')
                            ->maxLength(255)
                            ->helperText('Small text badge above title'),

                        Forms\Components\TextInput::make('title')
                            ->label('Title')
                            ->maxLength(255)
                            ->helperText('Main title text'),

                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtitle / Highlighted Text')
                            ->maxLength(255)
                            ->helperText('Highlighted or gradient text'),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->helperText('Main description text'),

                        Forms\Components\KeyValue::make('data')
                            ->label('Additional Data (JSON)')
                            ->helperText('For stats, highlights, or other flexible content')
                            ->reorderable(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_key')
                    ->label('Section Key')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('language')
                    ->label('Language')
                    ->colors([
                        'primary' => 'en',
                        'success' => 'de',
                    ]),

                Tables\Columns\TextColumn::make('section_type')
                    ->label('Type')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('language')
                    ->options([
                        'en' => 'English',
                        'de' => 'Deutsch',
                    ]),

                Tables\Filters\SelectFilter::make('section_type')
                    ->options([
                        'hero' => 'Hero',
                        'about' => 'About',
                        'services' => 'Services',
                        'stats' => 'Statistics',
                        'highlights' => 'Highlights',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order');
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
            'index' => Pages\ListContentSections::route('/'),
            'create' => Pages\CreateContentSection::route('/create'),
            'edit' => Pages\EditContentSection::route('/{record}/edit'),
        ];
    }
}
