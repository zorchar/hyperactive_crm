    <div>
        {{ $status['description'] }}
    </div>
    <div>
        {{ $status['created_at'] }}
    </div>
    <div>
        {{ App\Models\User::find($status['creator'])?->first_name ? App\Models\User::find($status['creator'])?->first_name : 'Not Available' }}
    </div>
