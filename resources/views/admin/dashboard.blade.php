<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6">SwanSpace Admin Panel</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-purple-100 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold mb-2">Page Contents</h4>
                            <p class="text-3xl font-bold text-purple-600">{{ $stats['page_contents'] }}</p>
                            <a href="{{ route('admin.page-contents.index') }}" class="text-purple-600 hover:text-purple-800 text-sm mt-2 inline-block">Manage →</a>
                        </div>
                        
                        <div class="bg-blue-100 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold mb-2">Services</h4>
                            <p class="text-3xl font-bold text-blue-600">{{ $stats['services'] }}</p>
                            <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">Manage →</a>
                        </div>
                        
                        <div class="bg-pink-100 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold mb-2">Testimonials</h4>
                            <p class="text-3xl font-bold text-pink-600">{{ $stats['testimonials'] }}</p>
                            <a href="{{ route('admin.testimonials.index') }}" class="text-pink-600 hover:text-pink-800 text-sm mt-2 inline-block">Manage →</a>
                        </div>
                        
                        <div class="bg-green-100 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold mb-2">Case Studies</h4>
                            <p class="text-3xl font-bold text-green-600">{{ $stats['case_studies'] }}</p>
                            <a href="#" class="text-green-600 hover:text-green-800 text-sm mt-2 inline-block">Manage →</a>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <h4 class="text-xl font-semibold">Quick Actions</h4>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('admin.page-contents.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg">Add Page Content</a>
                            <a href="{{ route('admin.services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">Add Service</a>
                            <a href="{{ route('admin.testimonials.create') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg">Add Testimonial</a>
                            <a href="{{ route('home') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">View Website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
