<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $table = 'complains';
    protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'subject',
        'detail',
        'location',
        'image'
    ];
    
    
    public function appuser()
    {
        return $this->belongsTo('App\Models\AppUser','user_id','id');
    }

}
