@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <div class="mb-10 animate-slide-in">
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <a href="{{ route('dashboard') }}" class="hover:text-orange-600">Dashboard</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="{{ route('restaurateur.restaurants') }}" class="hover:text-orange-600">Restaurants</a>
                    <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-900 font-medium">{{ $restaurant->name }}</span>
                </div>
            </div>


            <div class="mb-10">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="relative h-64 bg-gray-200">
                                <img src="{{ $restaurant->image }}" alt="{{ $restaurant->name }}"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>


                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <div class="flex items-start justify-between mb-6">
                                <div>
                                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $restaurant->name }}</h1>
                                    <p class="text-gray-600">{{ $restaurant->description }}</p>
                                </div>
                                @if ($restaurant->isActive)
                                    <span class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                        Active
                                    </span>
                                @else
                                    <span class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold">
                                        Inactive
                                    </span>
                                @endif
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="border-l-4 border-orange-500 pl-4">
                                    <p class="text-sm text-gray-600">Cuisine Type</p>
                                    <p class="font-semibold text-gray-900">{{ $restaurant->cuisine_type }}</p>
                                </div>
                                <div class="border-l-4 border-blue-500 pl-4">
                                    <p class="text-sm text-gray-600">Capacity</p>
                                    <p class="font-semibold text-gray-900">{{ $restaurant->capacity }} People</p>
                                </div>
                                <div class="border-l-4 border-purple-500 pl-4">
                                    <p class="text-sm text-gray-600">Opening Hours</p>
                                    <p class="font-semibold text-gray-900">{{ $restaurant->opening_hours }}</p>
                                </div>
                                <div class="border-l-4 border-pink-500 pl-4">
                                    <p class="text-sm text-gray-600">Location</p>
                                    <p class="font-semibold text-gray-900">{{ $restaurant->city }},
                                        {{ $restaurant->address }}
                                    </p>
                                </div>
                            </div>

                            <!-- Updated Button Section with Availability Management -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 pt-6 border-t border-gray-100">
                                <a href="{{ route('restaurateur.edit', $restaurant) }}"
                                    class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-medium text-center hover:shadow-lg transition inline-flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit Restaurant
                                </a>
                                <a href="{{ route('restaurateur.restaurants.availabilities', $restaurant->id) }}"
                                    class="px-4 py-2 bg-gradient-to-r from-purple-500 to-indigo-500 text-white rounded-lg font-medium text-center hover:shadow-lg transition inline-flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Manage Availability
                                </a>
                                <a href="{{ route('restaurateur.restaurants') }}"
                                    class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium text-center transition inline-flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Menus</h2>
                        <p class="text-gray-600 mt-1">Organize your restaurant's menus and items</p>
                    </div>
                    <a href="{{ route('restaurateur.menu.create', $restaurant) }}"
                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg hover:from-orange-600 hover:to-red-600 transform hover:-translate-y-0.5 transition duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Menu
                    </a>
                </div>

                @if ($restaurant->menus->count() > 0)
                    <div class="space-y-4">
                        @foreach ($restaurant->menus as $index => $menu)
                            <div class="border border-gray-200 rounded-xl p-6 hover:border-orange-200 hover:shadow-md transition duration-300"
                                style="animation-delay: {{ $index * 0.05 }}s;">

                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <h3 class="text-xl font-bold text-gray-900">{{ $menu->title }}</h3>
                                            <span
                                                class="inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-orange-600 bg-orange-100 rounded-full">
                                                {{ $menu->menuItems->count() }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 text-sm">{{ $menu->description }}</p>
                                    </div>
                                    <div class="flex gap-2 ml-4">
                                        
                                        <form action="{{ route('restaurateur.menu.destroy', $menu->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Delete menu &quot;{{ $menu->title }}&quot;? This cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2.5 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition duration-200"
                                                title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                @if ($menu->menuItems->count() > 0)
                                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                        <h4 class="font-semibold text-gray-900 mb-3 text-sm">Menu Items</h4>
                                        <div class="space-y-2">
                                            @foreach ($menu->menuItems as $item)
                                                <div
                                                    class="bg-white rounded-lg p-3 flex items-start justify-between border border-gray-200 hover:border-orange-200 group transition duration-200">
                                                    <div class="flex-1 min-w-0">
                                                        <p class="font-medium text-gray-900 text-sm">{{ $item->title }}
                                                        </p>
                                                        <p class="text-xs text-gray-600 mt-0.5">{{ $item->description }}
                                                        </p>
                                                    </div>
                                                    <form action="" method="POST" class="ml-3"
                                                        onsubmit="return confirm('Remove item &quot;{{ $item->title }}&quot;?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded transition duration-200 opacity-0 group-hover:opacity-100"
                                                            title="Remove">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="bg-gray-50 rounded-lg p-4 text-center mb-4 border border-dashed border-gray-300">
                                        <p class="text-gray-600 text-sm font-medium">No items in this menu yet</p>
                                    </div>
                                @endif

                            
                                <form action=""
                                    method="POST" class="flex gap-2">
                                    @csrf
                                    <select name="menu_item_id" required
                                        class="flex-1 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                                        <option value="" disabled selected>Select an item</option>
                                        @foreach ($allItems as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }} -
                                                {{ Str::limit($item->description, 50) }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white text-sm rounded-lg font-medium transition duration-200">
                                        Add
                                    </button>
                                </form>

                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-12 text-center bg-gray-50">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">No Menus Yet</h3>
                        <p class="text-gray-600 mb-6">Start by creating your first menu</p>
                        <a href="{{ route('restaurateur.menu.create', $restaurant) }}"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg font-semibold hover:shadow-lg hover:from-orange-600 hover:to-red-600 transform hover:-translate-y-0.5 transition duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Create First Menu
                        </a>
                    </div>
                @endif

            </div>

        </div>
    </div>
@endsection