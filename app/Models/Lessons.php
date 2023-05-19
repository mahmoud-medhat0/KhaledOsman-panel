<?php

namespace App\Models;

use App\Models\Codes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lessons extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'path','duration'
    ];
    public function codes()
    {
        return $this->hasMany(Codes::class, 'lesson_id');
    }
}
