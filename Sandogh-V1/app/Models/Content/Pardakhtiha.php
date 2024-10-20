<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pardakhtiha extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = ['image' => 'array'];
    protected $fillable = [ 'code_peygiri', 'mablagh_ghest', 'shahriye','image','tarikh','ghabele_taiid','user_id','vam_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function vam()
    {
        return $this->belongsTo(User::class, 'vam_id');
    }

}
