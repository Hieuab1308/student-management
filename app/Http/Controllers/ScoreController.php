<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    // Hiển thị danh sách điểm
    public function index()
{
    $scores = Score::all(); // Hoặc bất kỳ truy vấn nào khác
    return view('scores.index', compact('scores'));
}

    // Hiển thị form thêm điểm
    public function create()
    {
        $students = Student::all();
        return view('scores.create', compact('students'));
    }

    // Lưu điểm mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:10',
        ]);
    
        Score::create($request->all());
    
        return redirect()->route('scores.index')->with('success', 'Điểm đã được thêm thành công!');
    }
    

    // Hiển thị thông tin chi tiết điểm
    public function show(Score $score)
    {
        return view('scores.show', compact('score'));
    }

    // Hiển thị form chỉnh sửa điểm
    public function edit(Score $score)
    {
        $students = Student::all();
        return view('scores.edit', compact('score', 'students'));
    }

    // Cập nhật thông tin điểm
    public function update(Request $request, Score $score)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:10',
        ]);

        $score->update($request->all());

        return redirect()->route('scores.index')->with('success', 'Điểm đã được cập nhật!');
    }

    // Xóa điểm
    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->route('scores.index')->with('success', 'Điểm đã được xóa thành công!');
    }
}