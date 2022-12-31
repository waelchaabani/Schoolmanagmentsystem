<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    public $guarded = [
        // 'firstname',
        // 'secondname',
        // 'age',
        // 'gender',
        // 'phonenumber',
        // 'Address'

    ];

    public $timestamps = false;

    public function subject()
    {
        return $this->belongsTo(Subject::class)->Withdefault();
    }
    public function class()
    {
        return $this->belongsTo(Classes::class)->Withdefault();
    }
}
