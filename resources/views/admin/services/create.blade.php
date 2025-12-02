<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Service</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Icon</label>
                            <select name="icon" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                                <option value="globe">Globe</option>
                                <option value="smartphone">Smartphone</option>
                                <option value="database">Database</option>
                                <option value="line-chart">Line Chart</option>
                                <option value="settings">Settings</option>
                                <option value="users">Users</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title (English)</label>
                            <input type="text" name="title_en" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Title (German)</label>
                            <input type="text" name="title_de" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description (English)</label>
                            <textarea name="description_en" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description (German)</label>
                            <textarea name="description_de" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Order</label>
                            <input type="number" name="order" value="0" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" checked class="mr-2">
                                <span class="text-gray-700 text-sm font-bold">Active</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                            <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
