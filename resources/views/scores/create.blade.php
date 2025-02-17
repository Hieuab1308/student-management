<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm điểm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4">Thêm điểm</h1>
                    <form action="{{ route('scores.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="student_id" class="block text-sm font-medium text-gray-700">Sinh viên</label>
                            <select name="student_id" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700">Môn học</label>
                            <input type="text" name="subject" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="score" class="block text-sm font-medium text-gray-700">Điểm</label>
                            <input type="number" name="score" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm" step="0.1" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
