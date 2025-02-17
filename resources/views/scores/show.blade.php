<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Thông tin điểm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4">Thông tin điểm</h1>
                    <p><strong>ID:</strong> {{ $score->id }}</p>
                    <p><strong>Sinh viên:</strong> {{ $score->student->name }}</p>
                    <p><strong>Môn học:</strong> {{ $score->subject }}</p>
                    <p><strong>Điểm:</strong> {{ $score->score }}</p>
                    <a href="{{ route('scores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>