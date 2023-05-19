<?php

namespace App\Models;

use App\Models\Lessons;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Codes extends Model
{
    use HasFactory;
    protected $fillable = ['status','code','admin_id','student_id','lesson_id'];
    public function students()
    {
        return $this->belongsTo(Students::class,'student_id');
    }
    public function lesson()
    {
        return $this->belongsTo(Lessons::class, 'lesson_id');
    }
    public function admins()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
