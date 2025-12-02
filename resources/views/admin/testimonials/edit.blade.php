<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Testimonial</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Quote (English)</label>
                            <textarea name="quote_en" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>{{ $testimonial->quote_en }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Quote (German)</label>
                            <textarea name="quote_de" rows="4" class="shadow border rounded w-full py-2 px-3 text-gray-700">{{ $testimonial->quote_de }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Author Name</label>
                            <input type="text" name="author" value="{{ $testimonial->author }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Role (English)</label>
                            <input type="text" name="role_en" value="{{ $testimonial->role_en }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Role (German)</label>
                            <input type="text" name="role_de" value="{{ $testimonial->role_de }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">School (English)</label>
                            <input type="text" name="school_en" value="{{ $testimonial->school_en }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">School (German)</label>
                            <input type="text" name="school_de" value="{{ $testimonial->school_de }}" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Order</label>
                            <input type="number" name="order" value="{{ $testimonial->order }}" class="shadow border rounded w-full py-2 px-3 text-gray-700" required>
                        </div>
                        <div class="mb-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} class="mr-2">
                                <span class="text-gray-700 text-sm font-bold">Active</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            <a href="{{ route('admin.testimonials.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
