<x-layout>
    <div id='auto-complete'></div>
    <div class="test">
        This is the welcome main
        @if (auth()->user()?->role === 1)
            @include('attendedToday')
            @if (attendedToday(auth()->user()))
                <div>You validated attendance</div>
            @else
                <div>
                    <a href="students/{{ auth()->id() }}/attendances/validate">
                        Validate attendance!
                    </a>
                </div>
            @endif
        @endif
    </div>
</x-layout>
