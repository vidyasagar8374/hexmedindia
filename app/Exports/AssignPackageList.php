<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class AssignPackageList implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $results = DB::select("
           SELECT pk.id,pk.package,pk.price,pk.cut_price, GROUP_CONCAT(ts.name SEPARATOR ', ') AS Testdetails,pk.is_active,us.name from packages as pk
            left join package_details as pkd  on pkd.package_id = pk.id
            left join users us on pkd.created_user = us.id
            left join tests as ts on pkd.test_id = ts.id
            GROUP BY 
            pk.id, pk.package, pk.price, pk.cut_price, pk.is_active,us.name
            ORDER BY pk.id DESC;
        ");
       

        return collect($results)->map(function ($row) {
            return (array) $row;
        });
    }

    public function headings(): array
    {
        return ['ID', 'Package', 'Tests','Price', 'Franchise Price', 'Status','created&updated_By'];
    }
}
