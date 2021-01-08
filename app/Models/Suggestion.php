<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use HasFactory;

    
    protected $table = 'suggestions';
    protected $primarykey = 'id';

    protected $fillable = [
        'user_id',
        'subject',
        'detail',
    ];
    
        
    public function appuser()
    {
        return $this->belongsTo('App\Models\AppUser','user_id','id');
    }
}
