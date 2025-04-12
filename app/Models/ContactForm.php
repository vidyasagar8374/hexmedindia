<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;
    protected $table = 'contactform'; // Set your desired table name

    protected $fillable = ['name', 'email', 'mob_num', 'Describe_issue'];
}
