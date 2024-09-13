<!DOCTYPE html>
<html>
<head>
    <title>Caterings</title>
</head>
<body>
    <h1>Caterings</h1>
    <ul>
        @foreach($caterings as $catering)
            <li><a href="{{ route('caterings.show', $catering->id) }}">{{ $catering->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>