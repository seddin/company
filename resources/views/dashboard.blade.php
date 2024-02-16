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
                    <div class="flex justify-between">
                        <div class="w-1/2 mr-2">
                            <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">View Users (Unfinished)</button>
                        </div>
                        <div class="w-1/2 ml-2">
                            <a href="/departments" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">View Departments</a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
