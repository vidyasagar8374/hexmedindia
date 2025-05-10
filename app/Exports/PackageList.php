<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class PackageList implements FromCollection, WithHeadings

{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $authuser = Auth::user();
        if ($authuser->role = 1) {
            $authuser = Auth::user();
            $whereClause = '';
            if ($authuser->role = 1) {   
                $results = DB::select("
                SELECT 
                        pk.id,
                        pk.package,
                        pk.price,
                        pk.cut_price,
                        pk.is_active,
                        u1.name AS created_user,
                        u2.name AS updated_user
                    FROM 
                        packages AS pk
                    LEFT JOIN 
                        users u1 ON pk.created_user = u1.id
                    LEFT JOIN 
                        users u2 ON pk.updated_user = u2.id
                    GROUP BY 
                        pk.id,
                        pk.package,
                        pk.price,
                        pk.cut_price,
                        pk.is_active,
                        u1.name,
                        u2.name
                    ORDER BY 
                        pk.id DESC;
            ");  
               
            }
            
            
           
    
            return collect($results)->map(function ($row) {
                return (array) $row;
            });
        }

        
    }

    public function headings(): array
    {
        return ['ID', 'package', 'price','cut_price', 'is_active','created_by','edited_by'];
    }
}
