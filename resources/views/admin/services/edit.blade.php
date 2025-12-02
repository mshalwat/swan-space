<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Service</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.services.update', $service) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Icon</label>
                            <select name="icon" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="globe" {{ $service->icon == 'globe' ? 'selected' : '' }}>Globe</option>
                                <option value="smartphone" {{ $service->icon == 'smartphone' ? 'selected' : '' }}>Smartphone</option>
                                <option value="database" {{ $service->icon == 'database' ? 'selected' : '' }}>Database</option>
                                <option value="line-chart" {{ $service->icon == 'line-chart' ? 'selected' : '' }}>Line Chart</option>
                                <option value="settings" {{ $service->icon == 'settings' ? 'selected' : '' }}>Settings</option>
                                <option value="users" {{ $service->icon == 'users' ? 'selected' : '' }}>Users</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title (English)</label>
                            <input type="text" name="title_en" value="{{ $service->title_en }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title (German)</label>
                            <input type="text" name="title_de" value="{{ $service->title_de }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description (English)</label>
                            <textarea name="description_en" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>{{ $service->description_en }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description (German)</label>
                            <textarea name="description_de" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700">{{ $service->description_de }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Order</label>
                            <input type="number" name="order" value="{{ $service->order }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="mr-2">
                                <span class="text-gray-700 text-sm font-bold">Active</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
