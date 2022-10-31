<div>
    {{ $status['description'] }}
    {{ $status['created_at'] }}
    {{ App\Models\User::find($status['creator'])->first_name }}
</div>
