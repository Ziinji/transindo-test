@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Merchant Dashboard</h1>
    <p>Welcome, {{ Auth::user()->company_name }}!</p>
    <!-- Add merchant-specific content here -->
</div>
@endsection
