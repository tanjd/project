@extends('layout')

@section('content')
<h1 class="title">{{ $project->title }}</h1>
<div class="content">
    {{ $project->description }}
    <p>
        <a href="/projects/{{$project->id}}/edit">Edit</a>
    </p>
</div>


@if ($project->tasks->count())
<div class="box">
    @foreach($project->tasks as $task)
    <div>
        <form method="POST" action="/tasks/{{ $task->id }}">
            @method('PATCH')
            @csrf
            <label class="checkbox" for="completed">
                <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                {{$task->description}}
            </label>
        </form>
    </div>
    @endforeach
</div>
@endif

{{-- add a new task form --}}
<form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">
    @csrf
    <label class="label" for="description">
        <div class="control">
            <input type="text" class="input" name="description" placeholder="New Task">
        </div>
    </label>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Task</button>
        </div>
    </div>
    @include('errors')
</form>
@endsection