<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;
    public $table = 'countries';
    protected $fillable = [
        'id',
        'name',
    ];
}
