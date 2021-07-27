<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinJob extends Model
{
    use HasFactory;

    protected $fillable = [

        'name','email','phone_number','birth_date','address','sex','education','job','job_title','work','salary','yexp','dexp','cv'
    ];

}
