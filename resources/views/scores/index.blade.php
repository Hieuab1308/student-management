<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sách điểm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('scores.create') }}" class="btn btn-primary mb-3">Thêm điểm</a>
                    
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sinh viên</th>
                                <th>Môn học</th>
                                <th>Điểm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                                <tr>
                                    <td>{{ $score->id }}</td>
                                    <td>{{ $score->student->name }}</td>
                                    <td>{{ $score->subject }}</td>
                                    <td>{{ $score->score }}</td>
                                    <td>
                                        <a href="{{ route('scores.show', $score->id) }}" class="btn btn-info">Xem</a>
                                        <a href="{{ route('scores.edit', $score->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('scores.destroy', $score->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
