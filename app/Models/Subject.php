<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    public $guarded = [
        // 'subject',
        // 'teacher_id'
    ];
    public $timestamps = false;

    public function teacher()
    {
        return $this->hasMany(Teacher::class)->Withdefault();
    }
}
