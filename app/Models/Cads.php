<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cads extends Model
{
    use HasFactory;

    protected $table = 'cads';
    protected $primaryKey = 'cads_id';
    public $timestamps = false;

    protected $fillable = [
        'note_id',
        'status',
        'date_approved',
    ];
}
