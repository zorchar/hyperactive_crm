<x-layout>
    <div class="test">
        This is the user screen

        <div class="name">
            Name: {{ $user->first_name . ' ' . $user->last_name }}
        </div>

        @if ((auth()->user()?->role > 1 && $user->role == 1) || (auth()->user()?->role > 2 && $user->role == 2))

            @if ($status)
                Latest status:
                <a href={{ '/' . $userType . '/' . $user['id'] . '/statuses' }}>
                    <x-status.status :status='$status' />
                </a>
            @else
                <div>No statuses found</div>
            @endif

            <a href={{ '/' . $userType . '/' . $user->id . '/statuses/create' }}>New Status</a>
            <br />
        @endif

        @if ($user->role == 1)

            @if ($question)
                Latest question:
                <a href={{ '/' . $userType . '/' . $user['id'] . '/questions' }}>
                    <x-question.question :question='$question' />
                </a>
            @else
                <div>No questions found</div>
            @endif

        @endif

        @if (auth()->user()?->role > 1 && $user->role == 1)
            <div>
                <a href={{ '/' . $userType . '/' . $user->id . '/attendances' }}>View Attendances</a>
            </div>
        @endif

        @if (auth()->user()?->role > 1 && $user->role == 1)
            <div>
                <a href={{ '/' . $userType . '/' . $user->id . '/study_days' }}>View Study Days</a>
            </div>
        @endif

        @if (auth()->user()?->role > 2)
            <div>
                <a href={{ '/' . $userType . '/' . $user->id . '/confirm_delete' }}>Delete User</a>
            </div>
        @endif


    </div>
</x-layout>
