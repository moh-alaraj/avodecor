<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subservices extends Model
{
    protected $fillable = ['title','text','photo','service_id','slug'];
    use HasFactory;
    public function service(){

        return $this->belongsTo(Service::class);

    }
    public function getImageLinkAttribute()
    {
        return $this->photo ? url('/') . '/images/' . $this->photo : url('/') . '';
    }
}
