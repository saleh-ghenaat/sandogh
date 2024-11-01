<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['body' , 'author_id' , 'seen' , 'parent_id'];

    public function user(){
        return $this->belongsTo(User::class , 'author_id');
    }


}
