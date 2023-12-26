<div>
    Hello I'm a Blade template!
</div>

{{-- DIRECTIVE, the block inside the directive is displayed only if the variable is set --}}
@isset($name)
    <p>The name is: {{ $name }}</p> {{-- $name preso dal routin --}}
@endisset

<div>
    @if (count($tasks))
        {{-- use count since $tasks is an Array so: if the array is not empty --}}
        @foreach ($tasks as $task)
            <div>{{ $task->title }}</div>
        @endforeach
    @else
        <div>there are no tasks</div>
    @endif
</div>

{{-- shorter way --}}
<div>
    @forelse ($tasks as $task)
        {{-- check if is not emptyand perform the foreach --}}
        <div>{{ $task->title }}</div>

    @empty {{-- if is empty --}}
        <div>there are no tasks</div>
    @endforelse
</div>
