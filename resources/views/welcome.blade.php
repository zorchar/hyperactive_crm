<x-layout>
    <div id='auto-complete'></div>
    <div class="test">
        This is the welcome main
        @if (auth()->user()?->role === 1)
            @if (App\Models\Attendance::latest()->filter(auth()->id())->where('created_at', 'like', '%' . date('y-m-d', strtotime(now())) . '%')->get()->first())
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
