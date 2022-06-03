<?php

namespace App\Models\AKP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawin extends Model
{
    use HasFactory;
    protected $table = 'kawin';
    protected $guarded = ['id'];
}