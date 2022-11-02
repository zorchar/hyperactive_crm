<x-layout>

    <div class="statuses-page">
        <div class="name">
            {{ $student['first_name'] . ' ' . $student['last_name'] }}
        </div>

        <div class="student-container">

            <div class="student-row first">
                <div>
                    Status Description
                </div>
                <div>
                    Creation Date
                </div>
                <div>
                    Created By
                </div>
            </div>

            @foreach ($statuses as $status)
                <div class="student-row">
                    <x-status.status :status='$status' />
                </div>
            @endforeach

        </div>

        <div>
            <a class="login-button" href={{ '/students/' . $student['id'] . '/statuses/create' }}>New Status</a>
        </div>

    </div>
</x-layout>
