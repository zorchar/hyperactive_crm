<x-layout>
    <div class="test">

        <div class="name">
            {{ $user->first_name . ' ' . $user->last_name }}
        </div>

        @if ((auth()->user()?->role > 1 && $user->role == 1) || (auth()->user()?->role > 2 && $user->role == 2))

            @if ($status)
                <div class="table-name">Latest Status</div>
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

                    <a class="student-row" href={{ '/' . $userType . '/' . $user['id'] . '/statuses' }}>
                        <x-status.status :status='$status' />
                    </a>

                </div>
            @else
                <div class="table-name">No Statuses</div>
            @endif

            <div>
                <a class="login-button" href={{ '/' . $userType . '/' . $user->id . '/statuses/create' }}>New Status</a>
            </div>
        @endif

        @if ($user->role == 1)

            @if ($question)
                <div class="table-name">Latest Question</div>
                <div class="student-container">

                    <div class="student-row first">
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

                    <a class="student-row" href={{ '/' . $userType . '/' . $user['id'] . '/questions' }}>
                        <x-question.question :question='$question' />
                    </a>

                </div>
            @else
                <div class="table-name">No quesitons found</div>
            @endif

        @endif

        @if (auth()->user()?->role > 1 && $user->role == 1)

            @if ($attendance)
                <div class="table-name">Latest Attendance</div>
                <div class="student-container attendances">

                    <div class="student-row first">
                        <div>
                            Time Of Entry
                        </div>
                        <div>
                            Approved By
                        </div>
                    </div>

                    <a class="student-row" href={{ '/' . $userType . '/' . $user['id'] . '/attendances' }}>
                        <div>
                            {{ $attendance['approved_time_of_entry'] ? $attendance['approved_time_of_entry'] : $attendance['created_at'] }}
                        </div>
                        <div>
                            {{ $attendance['approved_by'] ? App\Models\User::find($attendance['approved_by'])?->first_name : 'Not Approved' }}
                        </div>
                    </a>

                </div>
            @else
                <div class="table-name">No quesitons found</div>
            @endif

        @endif

        @if (auth()->user()?->role > 1 && $user->role == 1)
            {{-- <div>
                <a href={{ '/' . $userType . '/' . $user->id . '/study_days' }}>View Study Days</a>
            </div> --}}




            <div class="table-name">Study Days</div>
            <div class="student-container">
                <div class="student-row first">
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
                    <a class="student-row" href={{ '/' . $userType . '/' . $user['id'] . '/study_days' }}>
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
                    </a>
                @endforeach
            </div>

        @endif

        @if (auth()->user()?->role > 2)
            <div class="delete-button_parent">
                <a class="login-button delete-button"
                    href={{ '/' . $userType . '/' . $user->id . '/confirm_delete' }}>Delete User</a>
            </div>
        @endif


    </div>
</x-layout>
