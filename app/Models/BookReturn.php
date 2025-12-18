<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Borrowing;

class BookReturn extends Model
{
    protected $table = 'returns';

    protected $fillable = ['borrowing_id', 'return_date', 'fine_amount', 'notes'];

    protected $casts = [
        'return_date' => 'date',
        'fine_amount' => 'decimal:2',
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}
