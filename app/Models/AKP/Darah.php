<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darah extends Model
{
    use HasFactory;
    protected $table = 'golongan_darah';
    protected $guarded = ['id'];
}