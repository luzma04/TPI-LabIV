<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'category',
        'description',
        'ISBN_code',
        'quantity',
        'publication_year',
        'language',
        'genre'
    ];
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function isAvailable()
    {
        return $this->quantity > 0;
    }
}
