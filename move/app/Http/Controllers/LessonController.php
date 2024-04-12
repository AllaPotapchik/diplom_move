<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $programs = Program::with('lessons')->get();

        return view('programs', compact('programs'));
    }
}
