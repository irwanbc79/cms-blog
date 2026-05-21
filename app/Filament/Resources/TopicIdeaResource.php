<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicIdeaResource\Pages;
use App\Models\TopicIdea;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TopicIdeaResource extends Resource
{
    protected static ?string $model = TopicIdea::class;
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('topic')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),
            Forms\Components\Select::make('pillar')
                ->options(['regulasi' => 'Regulasi', 'umkm' => 'UMKM Ekspor', 'news' => 'News', 'logistik' => 'Logistik'])
                ->required()
                ->default('regulasi'),
            Forms\Components\Select::make('language')
                ->options(['id' => 'Indonesia', 'en' => 'English'])
                ->required()
                ->default('id'),
            Forms\Components\KeyValue::make('generated_titles')
                ->label('Generated Titles (10 options)')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('selected_title')
                ->maxLength(255)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('topic')
                    ->searchable()
                    ->limit(60),
                Tables\Columns\BadgeColumn::make('pillar')
                    ->colors([
                        'warning' => 'regulasi',
                        'success' => 'umkm',
                        'info'    => 'news',
                        'primary' => 'logistik',
                    ]),
                Tables\Columns\TextColumn::make('language')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\IconColumn::make('is_used')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('pillar')
                    ->options(['regulasi' => 'Regulasi', 'umkm' => 'UMKM Ekspor', 'news' => 'News', 'logistik' => 'Logistik']),
                Tables\Filters\SelectFilter::make('language')
                    ->options(['id' => 'Indonesia', 'en' => 'English']),
                Tables\Filters\TernaryFilter::make('is_used')
                    ->label('Used'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTopicIdeas::route('/'),
            'create' => Pages\CreateTopicIdea::route('/create'),
            'edit'   => Pages\EditTopicIdea::route('/{record}/edit'),
        ];
    }
}
