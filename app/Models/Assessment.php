<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessments';
    protected $primaryKey = 'assessment_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'assessment_path',
        'receipt_path',
        'assessment_type', 
        'uploaded_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
