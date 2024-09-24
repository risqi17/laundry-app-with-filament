<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Order Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('laundry_service_id')
                ->relationship('laundryService', 'name')
                ->required(),
            Forms\Components\Select::make('city_id')
                ->relationship('city', 'name')
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->required()
                ->numeric(),
            Forms\Components\TextInput::make('total_price')
                ->required()
                ->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('laundryService.name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('city.name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('quantity')->sortable(),
            Tables\Columns\TextColumn::make('total_price')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ])->filters([
            //
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTransactions::route('/')
        ];
    }
}
