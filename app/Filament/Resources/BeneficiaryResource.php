<?php

namespace App\Filament\Resources;

use App\Filament\Imports\BeneficiaryImporter;
use App\Filament\Resources\BeneficiaryResource\Pages;
use App\Models\Beneficiary;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;

class BeneficiaryResource extends Resource
{
    protected static ?string $model = Beneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('national_id')
                    ->required()
                    ->maxLength(11),
                TextInput::make('fullname')
                    ->required(),
                TextInput::make('phonenumber')
                    ->required()
                    ->maxLength(10),
                TextInput::make('recipient_name')
                    ->required(),
                TextInput::make('recipient_phone')
                    ->required(),
                TextInput::make('recipient_nid')
                    ->required()
                    ->maxLength(11),
                TextInput::make('project_name')
                    ->required(),
                TextInput::make('partner')
                    ->required(),
                TextInput::make('transfer_value')
                    ->required(),
                TextInput::make('transfer_count')
                    ->required(),
                Forms\Components\DatePicker::make('transfer_date')
                    ->required(),
                Forms\Components\DatePicker::make('recipient_date')
                    ->required(),
                Select::make('sector')
                    ->options([
                        'protection' => 'Protection',
                        'shelter' => 'Shelter',
                        'nutrition' => 'Nutrition',
                        'health' => 'Health',
                        'wash' => 'Wash',
                        'food' => 'Food',
                        'livlihood' => 'Livlihood',
                        'education' => 'Education',

                    ])
                    ->required(),
                select::make('modality')
                    ->options([
                        'cash' => 'Cash',
                        'voucher' => 'Voucher',
                        'evoucher' => 'e-Voucher',
                    ])
                    ->required(),

            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ImportAction::make()
                    ->importer(BeneficiaryImporter::class),

            ])
            ->columns([
                //
                Tables\Columns\TextColumn::make('national_id'),
                Tables\Columns\TextColumn::make('fullname'),
                Tables\Columns\TextColumn::make('recipient_name'),
                Tables\Columns\TextColumn::make('project_name'),
                Tables\Columns\TextColumn::make('partner'),
                Tables\Columns\TextColumn::make('sector'),
                Tables\Columns\TextColumn::make('modality'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBeneficiaries::route('/'),
            'create' => Pages\CreateBeneficiary::route('/create'),
            'edit' => Pages\EditBeneficiary::route('/{record}/edit'),
        ];
    }
}
