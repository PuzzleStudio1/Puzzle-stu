<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Classroom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
class AbsenceController extends Controller
{

    public function classroomAbsence(Classroom $classroom)
    {
        $students = $classroom->course->users;
        $count = 1;
        $hazer = 0;
        $ghayeb = 0;
        foreach ($students as $student) {
            if ($student->hasAbsenceClassroom($classroom->id)) {
                foreach ($student->absences->where('classroom_id',$classroom->id) as $absence) {
                    $start = verta($absence->created_at);
                    $end = verta($absence->updated_at);
                    $duration = $start->diffMinutes($end);
                    $student->absenceDuration += $duration;
                }
                $hazer++;
            } else {
                $student->absenceDuration = 'غایب';
                $ghayeb++;
            }
        }
        
        return view('admin.classroomAbsence',compact('students', 'count', 'hazer', 'ghayeb'));
    }

    public function absencedelete()
    {
        Absence::where('created_at', '<', Carbon::now()->subDays(3))->delete();
        
        return redirect()->route('admin.dashboard')->with('success', true);
    }
}
