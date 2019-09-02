<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projects</title>

    <!-- Fonts -->

    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <h1>Projects</h1>
    @foreach ($projects as $project)
    <ul>
        <li>{{$project->title}}</li>
        <li>{{$project->description}}</li>
    </ul>

    @endforeach
</body>

</html>