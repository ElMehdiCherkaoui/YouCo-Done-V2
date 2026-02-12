@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->


            <!-- Form -->
            <form method="POST" action="{{ route('restaurateur.menu.store', $restaurant->id) }}"
                class="space-y-10 animate-slide-in" style="animation-delay: 0.1s;">
                @csrf
                <!-- Menu Info -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Menu Information</h2>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Menu Title
                        </label>
                        <input type="text" placeholder="e.g. Main Menu" name="title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Menu Description
                        </label>
                        <textarea rows="3" placeholder="Describe this menu (hours, style, dishes...)" name="description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"></textarea>
                    </div>
                </div>

                <!-- Menu Items Selection -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <div class="max-w-3xl mx-auto px-2 py-4">
                        <h2 class="text-2xl font-bold mb-6">Select Menu Items</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($menuItems as $item)
                                <label
                                    class="border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-orange-500 transition flex flex-col">
                                    <input type="checkbox" name="menu_items[]" value="{{ $item->id }}"
                                        class="peer mb-2">

                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $item->title }}</h3>
                                            <p class="text-sm text-gray-600">{{ $item->description }}</p>
                                        </div>

                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- Actions -->
                <div class="flex justify-end space-x-4">
                    <a href='{{ route('restaurateur.restaurants') }}'
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg transition">
                        Save Menu
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
