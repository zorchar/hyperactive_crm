    <x-layout>
        @include('searchBarScript')

        <form action={{ '/' . $userType }}>
            <input id="search" name="search" oninput="searchBarOnInputHandler(this)">
            <button>Search</button>
        </form>
        <div id='auto-complete'></div>
        <div class="test">
            This is the report
            @unless(count($users) == 0)

                <div class="table">

                    <div class="table-row first">
                        <div>
                            Full Name
                        </div>
                        <div>
                            Curriculum
                        </div>
                        <div>
                            Latest Status
                        </div>
                        <div>
                            Status Creation Date
                        </div>
                    </div>

                    @foreach ($users as $row)
                        @if ($row->id === auth()->id() || auth()->user()?->role > 1)
                            @if (str_contains(strtolower($row->first_name . ' ' . $row->last_name), strtolower(request()->input('search'))) ||
                                str_contains(strtolower($row->last_name . ' ' . $row->first_name), strtolower(request()->input('search'))))
                                <x-reportRow :row='$row' :userType='$userType' />
                            @endif
                        @endif
                    @endforeach
                </div>
            @else
                <p>No {{ $userType == 'students' ? 'students' : 'teachers' }} found</p>
            @endunless

            @if ($userType == 'students')
                <a class="login-button" href="/students/create">Create Student</a>
            @elseif($userType == 'teachers')
                <a class="login-button" href="/teachers/create">Create Teacher</a>
            @endif
        </div>
    </x-layout>
