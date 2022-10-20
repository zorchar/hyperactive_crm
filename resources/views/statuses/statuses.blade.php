<x-layout>
    {{ $student['first_name'] . ' ' . $student['last_name'] }}
    @foreach ($statuses as $status)
        {{-- @if (count($statuses) > 0) --}}
        <x-status.status :status='$status' />
        {{-- @endif --}}
    @endforeach
    <a href={{ '/students/' . $student['id'] . '/statuses/create' }}>New Status</a>
</x-layout>
