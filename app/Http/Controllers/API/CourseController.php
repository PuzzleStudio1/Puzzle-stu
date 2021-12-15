<?php

namespace App\Http\Controllers\API;

use App\Course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index()
    {
        $courses = Course::with('photo')->get();
        // $data = $courses->toArray();

        $courses = $courses->makeHidden([
                'live_class', 
                'chat',
                'price',
                'discount_price',
                'type',
                'status',
                'photo_id',
                'see_absences',
                'created_at',
                'updated_at'
        ]);

            
        $response = [
            'success' => true,
            'data' => $courses,
            'message' => 'Courses retrieved successfully.'
        ];

        return response()->json($response, 200);
    }
}