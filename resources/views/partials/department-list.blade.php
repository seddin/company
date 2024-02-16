@foreach ($departments as $department)
    <li> >> {{ $department->name }}</li>

    @if ($department->children->count())
        @include('partials.department-list', ['departments' => $department->children])
    @endif
@endforeach