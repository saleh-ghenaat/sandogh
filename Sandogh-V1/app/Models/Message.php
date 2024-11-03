<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['body' , 'author_id' , 'seen' , 'receiver_id' , 'reference_id'];

    public function user(){
        return $this->belongsTo(User::class , 'author_id');
    }
}
