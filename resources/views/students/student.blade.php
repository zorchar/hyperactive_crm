<x-layout>
    <div class="test">

        <div class="name">
            {{ $user->first_name . ' ' . $user->last_name }}
        </div>

        @if ((auth()->user()?->role > 1 && $user->role == 1) || (auth()->user()?->role > 2 && $user->role == 2))

            @if ($status)
                <div class="table-name">Latest Status</div>
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

                    <a class="table-row" href={{ '/' . $userType . '/' . $user['id'] . '/statuses' }}>
                        <x-status.status :status='$status' />
                    </a>

                </div>
            @else
                <div class="table-name frame">No Statuses</div>
            @endif

            <div>
                <a class="login-button" href={{ '/' . $userType . '/' . $user->id . '/statuses/create' }}>New Status</a>
            </div>
        @endif

        @if ($user->role == 1)

            @if ($question)
                <div class="table-name">Latest Question</div>
                <div class="table">

                    <div class="table-row first">
                        <div>
                            Question
                        </div>
                        <div>
                            Answer
                        </div>
                        <div>
                            Answered By
                        </div>
                    </div>

                    <a class="table-row" href={{ '/' . $userType . '/' . $user['id'] . '/questions' }}>
                        <x-question.question :question='$question' />
                    </a>

                </div>
            @else
                <div class="table-name frame">No quesitons found</div>
            @endif

        @endif

        @if (auth()->user()?->role > 1 && $user->role == 1)

            @if ($attendance)
                <div class="table-name">Latest Attendance</div>
                <div class="table attendances">

                    <div class="table-row first">
                        <div>
                            Time Of Entry
                        </div>
                        <div>
                            Approved By
                        </div>
                    </div>

                    <a class="table-row" href={{ '/' . $userType . '/' . $user['id'] . '/attendances' }}>
                        <div>
                            {{ $attendance['approved_time_of_entry'] ? $attendance['approved_time_of_entry'] : $attendance['created_at'] }}
                        </div>
                        <div>
                            {{ $attendance['approved_by'] ? App\Models\User::find($attendance['approved_by'])?->first_name : 'Not Approved' }}
                        </div>
                    </a>

                </div>
            @else
                <div class="table-name frame">No attendances found</div>
            @endif

        @endif

        @if ((auth()->user()?->role > 1 && $user->role == 1) ||
            (auth()->id() === $user->id && auth()->user()?->role !== 3))

            @if ($studyDays->count() > 0)
                <div class="table-name">Study Days</div>
                <div class="table">
                    <div class="table-row first">
                        <div>
                            Day
                        </div>
                        <div>
                            Start Time
                        </div>
                        <div>
                            End Time
                        </div>
                        <div>
                            Frontal/Remote
                        </div>
                    </div>

                    @foreach ($studyDays as $studyDay)
                        <{{ auth()->user()->role > 2 ? 'a' : 'div' }} class="table-row"
                            href={{ '/' . $userType . '/' . $user['id'] . '/study_days/create' }}>
                            <div>
                                {{ $daysOfWeek[$studyDay['day_of_week'] - 1] }}
                            </div>
                            <div>
                                {{ $studyDay['start_time'] }}
                            </div>
                            <div>
                                {{ $studyDay['end_time'] }}
                            </div>
                            <div>
                                {{ $studyDay['is_remote'] == 1 ? 'Remote' : 'Frontal' }}
                            </div>
                            <{{ auth()->user()->role > 2 ? '/a' : '/div' }}>
                    @endforeach
                </div>
            @else
                <div class="table-name frame">No study days defined</div>
            @endif

            @if (auth()->user()->role === 3)
                <a class="login-button" href="/students/{{ $user->id }}/study_days/create">
                    Edit Study Days
                </a>
            @endif

        @endif

        @if (auth()->user()?->role > 2)
            <div class="delete-button_parent">
                <a class="login-button delete-button"
                    href={{ '/' . $userType . '/' . $user->id . '/confirm_delete' }}>Delete User</a>
            </div>
        @endif


    </div>
</x-layout>
