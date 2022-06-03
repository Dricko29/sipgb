<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table = 'pendidikan';
    protected $guarded = ['id'];
}