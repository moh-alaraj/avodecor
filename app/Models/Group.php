<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    use HasFactory;

    protected $fillable = ['title','text','photo'];





    public function getImageLinkAttribute()
    {
        return $this->photo ? url('/') . '/images/' . $this->photo : url('/') . '';
    }
}
