    <div>
        {{ $status['description'] }}
    </div>
    <div>
        {{ date('d-m-Y H:i:s', strtotime($status['created_at'])) }}
    </div>
    <div>
        <?php
        $user = App\Models\User::find($status['creator']);
        ?>

        {{ $user ? $user->first_name . ' ' . $user->last_name : 'Not Available' }}
    </div>
