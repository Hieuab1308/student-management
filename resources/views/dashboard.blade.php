<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sách sinh viên và điểm') }}
        </h2>
    </x-slot>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
            transition: 0.3s;
        }

        .table-container {
            padding: 20px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .search-box {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            width: 250px;
        }

        .search-btn {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: 0.3s;
        }

        .search-btn:hover {
            background-color: #45a049;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table-container">

                <!-- Thanh tìm kiếm -->
                <div class="search-box">
                    <form method="GET" action="{{ route('dashboard') }}" class="flex">
                        <input type="text" name="search" placeholder="Tìm kiếm sinh viên..." 
                            value="{{ request('search') }}" class="search-input">
                        <button type="submit" class="search-btn">Tìm</button>
                    </form>
                </div>

                <!-- Bảng danh sách sinh viên -->
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Điểm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>
                                    @if($student->scores->isNotEmpty())
                                        @foreach ($student->scores as $score)
                                            <p>{{ $score->subject }}: {{ $score->score }}</p>
                                        @endforeach
                                    @else
                                        <p>Chưa có điểm</p>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center; font-weight: bold; color: red;">
                                    Không tìm thấy sinh viên nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Phân trang -->
                <div class="mt-4">
                    {{ $students->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
