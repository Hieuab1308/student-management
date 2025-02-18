<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('id', $search) // Tìm theo ID
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('phone', 'like', "%$search%");
        })->with('scores')->paginate(10);

        return view('dashboard', compact('students', 'search'));
    }
}
