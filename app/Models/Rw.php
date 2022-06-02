<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    use HasFactory;
    protected $table = 'rw';
    protected $guarded = ['id'];

    public function jk()
    {
        return $this->belongsTo(Sex::class, 'jk_id');
    }

    public function dusun()
    {
        return $this->belongsTo(Dusun::class, 'dusun_id');
    }  
}