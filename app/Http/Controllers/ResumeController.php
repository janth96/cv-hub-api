<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resume;

class ResumeController extends Controller
{
    public function index () {
      return Resume::get();
    }
}
