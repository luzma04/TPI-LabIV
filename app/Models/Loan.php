<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'start_date', 'end_date', 'state'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definición de la relación con Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
