<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    public $timestamps = false;

    function dance_type(){
        return $this->belongsTo(Dance_type::class);
    }
}
