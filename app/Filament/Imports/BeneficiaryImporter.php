<?php

namespace App\Filament\Imports;

use App\Models\Beneficiary;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class BeneficiaryImporter extends Importer
{
    protected static ?string $model = Beneficiary::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('national_id')
                ->requiredMapping()
                ->rules(['required', 'max:11']),
            ImportColumn::make('fullname')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('phonenumber')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('recipient_name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('recipient_phone')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('recipient_nid')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('project_name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('partner')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('transfer_value')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('transfer_count')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('transfer_date')
                ->requiredMapping()
                ->rules(['required'])
                ->helperText('date format YYYY-MM-DD'),
            ImportColumn::make('recipient_date')
                ->requiredMapping()
                ->rules(['required'])
                ->helperText('date format YYYY-MM-DD'),
            ImportColumn::make('sector')
                ->requiredMapping()
                ->rules(['required'])
                ->helperText('should be written as: protection, shelter, nutrition, health, wash, food or livelihood'),
            ImportColumn::make('modality')
                ->requiredMapping()
                ->rules(['required'])
                ->helperText('make sure it is: voucher or cach or evoucher'),
        ];
    }

    public function resolveRecord(): ?Beneficiary
    {
        // return Beneficiary::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Beneficiary;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your beneficiary import has completed and '.number_format($import->successful_rows).' '.str('row')->plural($import->successful_rows).' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to import.';
        }

        return $body;
    }
}
