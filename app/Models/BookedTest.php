<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedTest extends Model
{
    use HasFactory;
    protected $table = 'bokked_tests';
    public function testdetails(){
        return $this->hasMany(TestBokkingDetail::class, 'ref_id', 'id')->where('is_package', 0);
    }
    public function packagedetails(){
        return $this->hasMany(TestBokkingDetail::class, 'ref_id', 'id')->where('is_package', 1);
    }
    public function frachisedetails(){
        return $this->hasMany(FranchiseOwnerDetails::class, 'franchise_id', 'franchise_id');
    }
    public function frachisedCollections(){
        return $this->hasOne(FranchiseOwnerDetails::class, 'franchise_id', 'franchise_id');
    }
    
    public function boydetails(){
        return $this->hasOne(User::class, 'id', 'boy_id');
    }
    public function refid()
    {
        return $this->hasOne(RefForm::class, 'ref_id', 'id');
    }

    public function bookinghistory(){
        $bookingdetails = [];
        $bookingdetails[] = 'select * from bokked_tests';
        
        return $bookingdetails;
    }
}
