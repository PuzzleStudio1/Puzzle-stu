<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class CourseUsersExport implements FromQuery
{
    use Exportable;

    public function __construct($course)
    {
        $this->course = $course;
    }

    public function query()
    {
        return $this->course->users();
    }
}
