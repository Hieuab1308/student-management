<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách sinh viên với chức năng tìm kiếm
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::when($search, function ($query, $search) {
            return $query->search($search);
        })->get();

        return view('students.index', compact('students', 'search'));
    }

    // Hiển thị form thêm sinh viên
    public function create()
    {
        return view('students.create');
    }

    // Lưu sinh viên mới vào database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm thành công!');
    }

    // Hiển thị thông tin chi tiết sinh viên
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Hiển thị form chỉnh sửa sinh viên
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Thông tin sinh viên đã được cập nhật!');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công!');
    }
}
