<?php

namespace App\Imports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class InvoiceImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'InvoiceNo' => $row['InvoiceNo'],
            'StockCode' => $row['StockCode'],
            'Description' => $row['Description'],
            'Quantity' => $row['Quantity'],
            'InvoiceDate' => $row['InvoiceDate'],
            'UnitPrice' => $row['UnitPrice'],
            'CustomerId' => $row['CustomerId'],
            'Country' => $row['Country'],
        ]);
    }

    public function batchSize(): int
    {
        return 5000;
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
