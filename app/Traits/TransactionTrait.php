<?php

namespace App\Traits;
use App\Models\transactiondetails;
trait TransactionTrait {
    public function savetransactionTrait($text,$id,$amount,$ispositive, $uniqueid = '', $type = '')
    {
        
        $data = new transactiondetails;
        $data->user_id = $id;
        $data->text = $text;
        $data->amount = $amount;
        $data->is_positive = $ispositive;
        $data->info = $type;
        $data->payment_ref = $uniqueid;
        $data->save();
        return $data;
       
    }
}

?>
