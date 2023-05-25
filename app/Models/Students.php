<?php

namespace App\Models;

use App\Models\Codes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;
    protected $fillable = ['name','number','password','NationalID','gender','status'];
    public function codes()
    {
        return $this->hasMany(Codes::class, 'student_id');
    }
}
