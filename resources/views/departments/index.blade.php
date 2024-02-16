<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('departments.store') }}">
                        @csrf
                        <input
                            name="name"
                            placeholder="{{ __('Department Name') }}"
                            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        >
                        <select 
                            name="parent_id"
                            class="mt-4 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"    
                        >
                            <option value="">None</option>
                            @foreach ($allDepartments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</li>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul
                    class="list-disc list-inside text-slate-700 bg-white rounded-xl shadow-lg ring-1 ring-slate-900/5 p-4 pl-8 dark:bg-slate-800 dark:ring-0 dark:highlight-white/5 dark:text-slate-400"
                >
                    @foreach ($departments as $department)
                        <li>{{ $department->name }}</li>

                        @if ($department->children->count())
                            @include('partials.department-list', ['departments' => $department->children])
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
