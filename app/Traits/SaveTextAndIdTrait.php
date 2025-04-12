<?php

namespace App\Traits;
use App\Models\Notification;
trait SaveTextAndIdTrait {
    public function savenotificationTrait($text,$id)
    {
        
        $data = new Notification;
        $data->notification = $text;
        $data->userid = $id;
        $data->save();
        return $data;
       
    }
}

?>
