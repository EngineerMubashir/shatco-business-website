@extends('admin.layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="mb-4">Welcome to the Admin Dashboard 🎉</h1>
    <p class="lead">You are logged in as <strong>{{ session('admin')->name }}</strong></p>
    <p class="text-muted">Use the sidebar to manage website content and settings.</p>

    <div class="mt-4">
        <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Manage Services</a>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-success">Manage Testimonials</a>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">Settings</a>
    </div>
@endsection
