<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách sinh viên
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Hiển thị form thêm sinh viên
    public function create()
    {
        return view('students.create');
    }

    // Lưu sinh viên mới vào database
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
        ]);

        // Tạo mới sinh viên với dữ liệu đã validate
        Student::create($validatedData);

        // Chuyển hướng với thông báo thành công
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
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
        ]);

        // Cập nhật sinh viên với dữ liệu đã validate
        $student->update($validatedData);

        // Chuyển hướng với thông báo thành công
        return redirect()->route('students.index')->with('success', 'Thông tin sinh viên đã được cập nhật!');
    }

    // Xóa sinh viên
    public function destroy(Student $student)
    {
        // Xóa sinh viên
        $student->delete();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công!');
    }
}
