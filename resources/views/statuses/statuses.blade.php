<x-layout>

    <div>
        {{ $student['first_name'] . ' ' . $student['last_name'] }}
    </div>

    @foreach ($statuses as $status)
        <x-status.status :status='$status' />
    @endforeach

    <a href={{ '/students/' . $student['id'] . '/statuses/create' }}>New Status</a>

</x-layout>
