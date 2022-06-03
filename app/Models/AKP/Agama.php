<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $guarded = ['id'];
}