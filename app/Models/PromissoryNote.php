<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PromissoryNote extends Model
{
    use HasFactory;

    protected $table = 'promissorynotes';
    protected $primaryKey = 'note_id';

    protected $fillable = [
        'user_id',
        'name',
        'year_section',
        'contact_no',
        'amount_due_for',
        'partial_payment',
        'balance_due',
        'reason',
        'payment_schedule',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
