<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

class BookingHistory implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    { 
        $authuser = Auth::user();
        $whereClause = '';
        if ($authuser->role != 1) {     
            $whereClause = "where bkt.franchise_id = " . intval($authuser->id);
        }
        
        $results = DB::select("
            SELECT 
                bkt.booking_id AS id,
                bkt.name AS Customer,
                GROUP_CONCAT(pk.Package SEPARATOR ', ') AS PakageDetails,
                GROUP_CONCAT(ts.name SEPARATOR ', ') AS Test,
                fr.tradename AS FrachiseName,
                bkt.date AS DateAndTime,
                bkt.created_at AS BookedDate,
                bkt.status AS StatusDetails
            FROM bokked_tests AS bkt 
            LEFT JOIN booked_test_details AS bkd ON bkt.id = bkd.ref_id
            LEFT JOIN tests AS ts ON bkd.test_id = ts.id AND bkd.is_package = 0
            LEFT JOIN packages AS pk ON bkd.test_id = pk.id AND bkd.is_package = 1
            LEFT JOIN franchise_owner_details AS fr ON bkt.franchise_id = fr.franchise_id
            $whereClause
            GROUP BY 
                bkt.booking_id, bkt.name, fr.tradename, bkt.date, bkt.created_at, bkt.status
            ORDER BY bkt.id DESC 
        ");
       

        return collect($results)->map(function ($row) {
            return (array) $row;
        });
    }

    public function headings(): array
    {
        return ['ID', 'Customer', 'PakageDetails', 'Test', 'FrachiseName', 'DateAndTime', 'BookedDate', 'StatusDetails'];
    }
}
