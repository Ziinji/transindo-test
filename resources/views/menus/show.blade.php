<!DOCTYPE html>
<html>
<head>
    <title>{{ $menu->name }}</title>
</head>
<body>
    <h1>{{ $menu->name }}</h1>
    <p>{{ $menu->description }}</p>
    <p>Price: ${{ $menu->price }}</p>
    <img src="{{ $menu->photo }}" alt="{{ $menu->name }}">
</body>
</html>