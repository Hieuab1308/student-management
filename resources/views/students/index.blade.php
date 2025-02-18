<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sách sinh viên') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3 inline-block">Thêm sinh viên</a>

                    <!-- Form tìm kiếm -->
                    <form method="GET" action="{{ route('students.index') }}" class="mb-4 flex space-x-2">
                        <input type="text" name="search" placeholder="Tìm theo ID hoặc tên" value="{{ request('search') }}"
                               class="border p-2 rounded w-1/3">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tìm kiếm</button>
                    </form>

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-2 border">ID</th>
                                <th class="py-2 border">Tên</th>
                                <th class="py-2 border">Email</th>
                                <th class="py-2 border">Số điện thoại</th>
                                <th class="py-2 border">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse ($students as $student)
                                <tr>
                                    <td class="border px-4 py-2">{{ $student->id }}</td>
                                    <td class="border px-4 py-2">{{ $student->name }}</td>
                                    <td class="border px-4 py-2">{{ $student->email }}</td>
                                    <td class="border px-4 py-2">{{ $student->phone }}</td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">Xem</a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Sửa</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center text-gray-500">Không tìm thấy sinh viên nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
