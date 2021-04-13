<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
    ];
    public function wordParent()
    {
        return $this->belongsToMany(Word::class, 'word_choices', 'choice_id', 'word_id');
    }
}
