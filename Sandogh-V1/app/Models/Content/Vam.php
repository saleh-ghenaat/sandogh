<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'id','mablagh_vam', 'tedad_aghsat', 'user_id','status','mablagh_ghest','baghimande_vam','baghimande_aghsat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
