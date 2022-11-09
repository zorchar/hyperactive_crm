    <a href="/{{ $userType }}/{{ $row->id }}" class="table-row">
        <div>
            {{ $row->last_name . ' ' . $row->first_name }}
        </div>
        <div>
            {{ $row->curriculum ? $row->curriculum : 'No curriculum' }}
        </div>
        <div>
            {{ $row->description ? $row->description : 'No status' }}
        </div>
        <div>
            {{ $row->created_at ? date('d-m-Y H:i:s', strtotime($row->created_at)) : 'No Status' }}
        </div>
    </a>
