<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approvals';
    protected $primaryKey = 'approval_id';
    public $timestamps = false;

    protected $fillable = [
        'assessment_id',
        'assessment_type',
        'status',
        'date_approved',
    ];
}
