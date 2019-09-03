@extends('layout')

@section('content')
<h1 class="title">Create a new Project</h1>
<form method="POST" action="/projects">
    <!--V important, need it-->
    @csrf

    <div class="control">
        <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Title" value="{{ old('title') }}" required>
    </div>
    <div class=" control">
        <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : ''}}">{{ old('description') }}</textarea>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
        </div>
    </div>

    <!--error notification-->
    @if ($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>
@endsection
