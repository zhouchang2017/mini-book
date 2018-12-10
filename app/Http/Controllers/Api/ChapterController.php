<?php

namespace App\Http\Controllers\Api;

use App\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    public function show(Chapter $chapter)
    {
        $chapter->loadMissing('questions.type');
        return $chapter;
    }
}
