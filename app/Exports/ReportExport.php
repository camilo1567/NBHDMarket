<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReportExport implements FromArray, WithHeadings, WithTitle
{

    use Exportable;

    public function title(): string
    {
        return $this->title;
    }

    public function __construct(public $heads, public $data, public $title)
    {

    }

    public function headings(): array
    {
        return $this->heads;
    }

    public function array(): array
    {
        return \Arr::flatten($this->data);
    }

}
