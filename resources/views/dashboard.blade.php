
@extends('layouts.app')

@section('title', 'Dashboard - Personal Task Tracker')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">
        Dashboard
    </h1>

    <div class="row">

        <!-- Total Tasks -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary
                                text-uppercase mb-1">
                        Total Tasks
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalTasks }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Tasks -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success
                                text-uppercase mb-1">
                        Completed Tasks
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $completedTasks }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Tasks -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-warning
                                text-uppercase mb-1">
                        Pending Tasks
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $pendingTasks }}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Welcome
            </h6>
        </div>

        <div class="card-body">
            Welcome to your Personal Task Tracker!

            <p class="mt-2 mb-0">
                You can manage your tasks from this dashboard.
            </p>
        </div>

    </div>

@endsection
