<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Tasks') }}
            </h2>
            <!-- Create Task Button -->
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
                {{ __('Create Task') }}
            </a>
        </div>
    </x-slot>
    @section('content')
    <div class="container mx-auto px-4 pt-4">
        <form method="GET" action="{{ route('viewTasksInRange') }}" class="mb-4">
            <div class="flex items-center space-x-2">
                <label for="start_date" class="mr-2">Start Date:</label>
                <input type="date" name="start_date" required class="border border-gray-300 rounded-md p-2">
                <label for="end_date" class="mx-2">End Date:</label>
                <input type="date" name="end_date" required class="border border-gray-300 rounded-md p-2">
                <button type="submit" class="btn btn-primary ml-2">Filter Tasks</button>
            </div>
        </form>

        <div class="task-cards-container">
            @foreach ($tasks as $task)
                @php
                    $dueDate = \Carbon\Carbon::parse($task->due_date);
                    $diffInDays = \Carbon\Carbon::now()->diffInDays($dueDate, false);
                    $bgColor = '';
                    $textColor = '';

                    if ($diffInDays > 7) {
                        $bgColor = 'bg-success'; // Green (Less urgent)
                        $textColor = 'text-white';
                    } elseif ($diffInDays <= 7 && $diffInDays >= 1) {
                        $bgColor = 'bg-warning'; // Yellow (Medium urgency)
                        $textColor = 'text-dark';
                    } else {
                        $bgColor = 'bg-danger'; // Red (Most urgent)
                        $textColor = 'text-white';
                    }
                @endphp

                <div class="card {{ $bgColor }} {{ $textColor }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text">Due Date: {{ $task->due_date }}</p>
                        <p class="card-text">{{ $task->description }}</p>

                        <!-- Buttons for Update and Delete -->
                        <div class="flex space-x-2 mt-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-light">Update</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .task-cards-container {
            display: flex;
            flex-wrap: wrap; /* Allows cards to wrap to the next line */
            gap: 1rem; /* Space between cards */
        }

        .card {
            flex: 1 1 calc(33.333% - 1rem); /* Set card width to one-third of container width */
            border-radius: 16px; /* Curvature of 16 pixels */
            border: 1px solid #ddd; /* Optional border color */
            padding: 20px;
            background-color: #fff; /* Default background color */
            margin-bottom: 1rem;
            box-sizing: border-box; /* Ensure padding and border are included in card width */
        }

        .bg-success {
            background-color: #28a745 !important; /* Green */
        }

        .bg-warning {
            background-color: #ffc107 !important; /* Yellow */
        }

        .bg-danger {
            background-color: #d85764 !important; /* Red */
        }

        .text-white {
            color: #fff !important;
        }

        .text-dark {
            color: #000 !important;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-light {
            background-color: #f8f9fa;
            color: #000;
            border: 1px solid #ddd;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .btn-light:hover {
            background-color: #e2e6ea;
        }

        .btn-dark {
            background-color: #343a40;
            color: #fff;
            border: 1px solid #343a40;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }
    </style>
    @endsection
</x-app-layout>

