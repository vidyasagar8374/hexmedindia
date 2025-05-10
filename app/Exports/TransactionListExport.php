<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\transactiondetails;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class TransactionListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $authuser = Auth::user();
        $whereClause = '';
        if ($authuser->role != 1) {     
            $whereClause = "where trxt.user_id = " . intval($authuser->id);
        }
    

        // $transactiondetails = transactiondetails::select(
        //     DB::raw('ROW_NUMBER() OVER () as serial_no'), // Using ROW_NUMBER() OVER () for serial number
        //     'transactiondetails.payment_ref', // Alias the column to avoid conflict
        //     'users.name as user_name', // Alias the column to avoid conflict
            
        //     DB::raw('DATE_FORMAT(transactiondetails.created_at, "%m/%d/%Y %H:%i") as formatted_created_at'),
        //     DB::raw('CASE WHEN transactiondetails.is_positive = "Yes" THEN "Credit" ELSE "Debit" END as transaction_type'),
        //     DB::raw('"" as Paymenttype'), // Renamed placeholder for 'Paymenttype'
        //     DB::raw('GROUP_CONCAT(bokked_tests.booking_id SEPARATOR ",") as booking_ids'),
        //     'transactiondetails.amount'
        // )
        // ->join('users', 'users.id', '=', 'transactiondetails.user_id')
        // ->leftJoin('bokked_tests', 'bokked_tests.payment_ref', '=', 'transactiondetails.payment_ref') 
        // ->groupBy(
        //     'transactiondetails.payment_ref',
        // )
        // ->orderByDesc('transactiondetails.id') // Using orderByDesc() for descending order
        // ->get();
        // }else{
        //     $transactiondetails = transactiondetails::select(
        //         DB::raw('ROW_NUMBER() OVER () as serial_no'), // Using ROW_NUMBER() OVER () for serial number
        //         'transactiondetails.payment_ref', // Alias the column to avoid conflict
        //         'users.name as user_name', // Alias the column to avoid conflict
                
        //         DB::raw('DATE_FORMAT(transactiondetails.created_at, "%m/%d/%Y %H:%i") as formatted_created_at'),
        //         DB::raw('CASE WHEN transactiondetails.is_positive = "Yes" THEN "Credit" ELSE "Debit" END as transaction_type'),
        //         DB::raw('"" as Paymenttype'), // Renamed placeholder for 'Paymenttype'
        //         DB::raw('GROUP_CONCAT(bokked_tests.booking_id SEPARATOR ",") as booking_ids'),
        //         'transactiondetails.amount'
        //     )
        //     ->join('users', 'users.id', '=', 'transactiondetails.user_id')
        //     ->leftJoin('bokked_tests', 'bokked_tests.payment_ref', '=', 'transactiondetails.payment_ref') 
        //     ->groupBy(
        //         'transactiondetails.payment_ref',
        //     )
        //     ->orderByDesc('transactiondetails.id') // Using orderByDesc() for descending order
        //     ->where('transactiondetails.user_id', '=', \Auth::user()->id)
        //     ->get();
        
        
        
//         $transactiondetails = transactiondetails::select(
//     DB::raw('ROW_NUMBER() OVER () as serial_no'),
//     'transactiondetails.payment_ref',
//     DB::raw('MIN(users.name) as user_name'),  // Use MIN() instead of ANY_VALUE()
//     DB::raw('DATE_FORMAT(transactiondetails.created_at, "%m/%d/%Y %H:%i") as formatted_created_at'),
//     DB::raw('CASE WHEN transactiondetails.is_positive = "Yes" THEN "Credit" ELSE "Debit" END as transaction_type'),
//     DB::raw('"" as Paymenttype'),
//     DB::raw('GROUP_CONCAT(bokked_tests.booking_id SEPARATOR ",") as booking_ids'),
//     DB::raw('SUM(transactiondetails.amount) as amount') // Use SUM() to aggregate amounts
// )
// ->join('users', 'users.id', '=', 'transactiondetails.user_id')
// ->leftJoin('bokked_tests', 'bokked_tests.payment_ref', '=', 'transactiondetails.payment_ref') 
// ->groupBy('transactiondetails.payment_ref')
// ->orderByDesc('transactiondetails.id')
// ->get();


// $transactiondetails = transactiondetails::select(
//     DB::raw('ROW_NUMBER() OVER () as serial_no'),
//     'transactiondetails.payment_ref',
//     DB::raw('MIN(users.name) as user_name'), // Use MIN() to pick any user name
//     DB::raw('DATE_FORMAT(MIN(transactiondetails.created_at), "%m/%d/%Y %H:%i") as formatted_created_at'), // MIN() fixes GROUP BY issue
//     DB::raw('CASE WHEN transactiondetails.is_positive = "Yes" THEN "Credit" ELSE "Debit" END as transaction_type'),
//     DB::raw('"" as Paymenttype'),
//     DB::raw('GROUP_CONCAT(bokked_tests.booking_id SEPARATOR ",") as booking_ids'),
//     DB::raw('SUM(transactiondetails.amount) as amount') // Aggregate amount properly
// )
// ->join('users', 'users.id', '=', 'transactiondetails.user_id')
// ->leftJoin('bokked_tests', 'bokked_tests.payment_ref', '=', 'transactiondetails.payment_ref') 
// ->groupBy('transactiondetails.payment_ref')
// ->orderByDesc('transactiondetails.id')
// ->get();
// $transactiondetails = DB::table('transactiondetails')
//     ->join('users', 'users.id', '=', 'transactiondetails.user_id')
//     ->select('transactiondetails.user_id', 'transactiondetails.text', 'transactiondetails.amount', 'transactiondetails.is_positive', 'transactiondetails.payment_ref', 'users.email', 'transactiondetails.created_at')
//     ->get();
    
    
    
$transactiondetails = DB::select("
    SELECT
        frowner.tradename,
        trxt.amount,
        trxt.text,
        trxt.is_positive,
        trxt.payment_ref,
        usr.email,
        GROUP_CONCAT(bkt.booking_id SEPARATOR ', ') AS booking_ids,
        DATE_FORMAT(trxt.created_at, '%d-%m-%Y %H:%i') AS formatted_created_at
    FROM transactiondetails AS trxt
    LEFT JOIN users AS usr ON usr.id = trxt.user_id
    LEFT JOIN bokked_tests AS bkt ON bkt.payment_ref = trxt.payment_ref
    LEFT JOIN franchise_owner_details AS frowner ON frowner.franchise_id = trxt.user_id
    $whereClause
    GROUP BY
        frowner.tradename,
        trxt.id,
        trxt.user_id,
        trxt.text,
        trxt.amount,
        trxt.is_positive,
        trxt.payment_ref,
        usr.email,
        trxt.created_at
    ORDER BY trxt.id DESC
");


//  $transactiondetails = transactiondetails::with(['franchisedetails', 'testdetails'])->orderBy('id', 'desc')->get();
//  foreach($shares as $x => $details){
//     dd($details);
//  }
//  dd($shares);

return collect($transactiondetails)->map(function ($row) {
    return (array) $row;
});

    
    }

    public function headings(): array
    {
        return [
            'Franchise Name', // Change to 'User Name' to match the alias
            'Amount',
            'Text',
            'Credit Or Debit',
            'Payment Ref',
            'Email',
            'Booking Ref',
            'Date'
        ];
    }
}
