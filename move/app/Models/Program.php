<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';
    function tariff(){
        return $this->belongsTo(Tariff::class);
    }
    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }
}
