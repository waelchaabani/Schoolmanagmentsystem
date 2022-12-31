<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table ='students';
    public $fillable = [
        'firstname',
        'secondname',
        'age',
        'gender',
        'class_id',
        'phonenumber',
        'Address'
    ];
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // define a many-to-many relationship with the Classes model
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
