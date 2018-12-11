<?php

namespace App\Nova\Metrics;

use App\Question;
use App\Type;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class AllQuestions extends Partition
{
    public $width = '1/2';
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $types = Type::all(['id', 'name'])->mapWithKeys(function ($value, $key) {
            return [$value['id'] => $value['name']];
        });
        return $this->count($request, Question::class, 'type_id')->label(function ($value) use ($types) {
            return $types->get($value);
        });
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
        return 'all-questions';
    }

    public function name()
    {
        return __('All Questions');
    }
}
