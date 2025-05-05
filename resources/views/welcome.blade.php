@extends('layouts.app')

@section('content')
 

    <!-- Hero Section -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">Welcome to School Management System</h1>
                <p class="lead">A comprehensive solution for managing your educational institution efficiently.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Get Started</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Learn More</button>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="School Management">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Key Features</h2>
        <div class="row g-4">
            @php
                $features = [
                    ['icon' => 'fa-user-graduate', 'title' => 'Student Management', 'desc' => 'Efficiently manage student records, attendance, and performance.'],
                    ['icon' => 'fa-chalkboard-teacher', 'title' => 'Teacher Management', 'desc' => 'Handle teacher profiles, schedules, and assignments.'],
                    ['icon' => 'fa-book', 'title' => 'Course Management', 'desc' => 'Organize courses, curriculum, and class schedules.'],
                    ['icon' => 'fa-chart-bar', 'title' => 'Reports & Analytics', 'desc' => 'Generate detailed reports and analyze performance metrics.'],
                ];
            @endphp

            @foreach ($features as $feature)
                <div class="col-md-3">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas {{ $feature['icon'] }} fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">{{ $feature['title'] }}</h5>
                            <p class="card-text">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

  
@endsection
