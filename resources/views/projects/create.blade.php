@extends('layout')

@section('content')
<h1 class="title">Create a new Project</h1>
<form method="POST" action="/projects">
    <!--V important, need it-->
    @csrf

    <div class="control">
        <input type="text" class="input" name="title" placeholder="Title"">
        </div>
        <div class=" control">
        <textarea name="description" class="textarea"></textarea>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Create Project</button>
        </div>
    </div>

</form>
@endsection