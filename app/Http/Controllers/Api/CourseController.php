<?php

namespace App\Http\Controllers\Api;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
    }

    public function show(Course $course)
    {
        $course->loadMissing('chapters');
        return $course;
    }
}
