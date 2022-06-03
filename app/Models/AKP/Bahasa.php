<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    use HasFactory;
    protected $table = 'bahasa';
    protected $guarded = ['id'];
}