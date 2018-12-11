<?php

namespace App\Nova\Metrics;

use App\Course;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class AllCourses extends Partition
{
    public $width = '1/2';
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Course::class, 'id');
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
         return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'all-courses';
    }

    public function name()
    {
        return __('All Courses');
    }
}
