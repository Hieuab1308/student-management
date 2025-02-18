<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sách điểm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Thêm điểm -->
                    <a href="{{ route('scores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3 inline-block">Thêm điểm</a>

                    <!-- Bảng điểm -->
                    <table class="min-w-full bg-white border border-gray-300 mt-4">
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-2 px-4 border">ID</th>
                                <th class="py-2 px-4 border">Sinh viên</th>
                                <th class="py-2 px-4 border">Môn học</th>
                                <th class="py-2 px-4 border">Điểm</th>
                                <th class="py-2 px-4 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($scores as $score)
                                <tr>
                                    <td class="border px-4 py-2">{{ $score->id }}</td>
                                    <td class="border px-4 py-2">{{ $score->student->name }}</td>
                                    <td class="border px-4 py-2">{{ $score->subject }}</td>
                                    <td class="border px-4 py-2">{{ $score->score }}</td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <!-- Xem điểm -->
                                        <a href="{{ route('scores.show', $score->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Xem</a>
                                        <!-- Sửa điểm -->
                                        <a href="{{ route('scores.edit', $score->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Sửa</a>
                                        <!-- Xóa điểm -->
                                        <form action="{{ route('scores.destroy', $score->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Xóa</button>
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
