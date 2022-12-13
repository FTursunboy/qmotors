<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserBalanceExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection(): \Illuminate\Support\Collection
    {
        return User::select('id', 'name', 'surname', 'patronymic', 'phone_number')->get();
    }

    public function headings(): array
    {
        return [
            'id', 'full_name', 'balance',
        ];
    }

    public function map($row): array
    {
        return [
            $row->id,
            $row->full_name,
            $row->balance
        ];
    }
}
