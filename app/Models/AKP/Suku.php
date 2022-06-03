<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suku extends Model
{
    use HasFactory;
    protected $table = 'suku';
    protected $guarded = ['id'];
}