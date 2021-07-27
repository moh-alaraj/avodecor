<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    protected $fillable = ['name','photo','position','job'];


    public function getImageLinkAttribute()
    {
        return $this->photo ? url('/') . '/images/' . $this->photo : url('/') . '';
    }

}
