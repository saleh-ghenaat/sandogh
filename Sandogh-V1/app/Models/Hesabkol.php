<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hesabkol extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['id', '', 'hesab_kol'];

}
