<?php

namespace App\Repository;

use App\Models\Student;

class StudentRepository
{
    public function create(array $data)
    {
        return Student::create($data);
    }
    public function update(Student $student, array $data)
    {
        $student->update($data);

        return $student;
    }

    public function delete(Student $student)
    {
        $student->delete();
    }
}
