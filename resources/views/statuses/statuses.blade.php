<x-layout>

    <div class="statuses-page">
        <div class="name">
            {{ $student['first_name'] . ' ' . $student['last_name'] }}
        </div>

        <div class="table-name">Statuses</div>
        <div class="table">

            <div class="table-row first">
                <div>
                    Status Description
                </div>
                <div>
                    Creation Date And Time
                </div>
                <div>
                    Created By
                </div>
            </div>

            @foreach ($statuses as $status)
                <div class="table-row">
                    <x-status.status :status='$status' />
                </div>
            @endforeach

        </div>

        <div>
            <a class="login-button" href={{ '/students/' . $student['id'] . '/statuses/create' }}>New Status</a>
        </div>

    </div>
</x-layout>
