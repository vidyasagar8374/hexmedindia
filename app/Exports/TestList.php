<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Test;

class TestList implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $authuser = Auth::user();
        if ($authuser->role = 1) {
            return Test::latest('id')->get();
        }

        return collect([]); // return empty if user is admin (role = 1)
        
    }
    public function headings(): array
    {
        return ['ID', 'name', 'price','total_price', 'is_active', 'created_at'.'Updated_date'];
    }
}
