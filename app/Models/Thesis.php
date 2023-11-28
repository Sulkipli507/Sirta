<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nim',
        'count',
        'concentration_id',
        'year',
        'title',
        'abstract',
        'file',
        'user_id'
    ];

    public function concentration(){
        return $this->belongsTo(Concentration::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
