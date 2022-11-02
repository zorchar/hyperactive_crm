<nav>
    <div class=>

        <a href="/">Home</a>

        @if (auth()->user()?->role > 1)
            <div>
                <a href="/students">Students</a>
            </div>
            @if (auth()->user()?->role > 2)
                <div>
                    <a href="/teachers">Teachers</a>
                </div>
            @endif
        @elseif(auth()->user()?->role == 1)
            <div>
                <a href="/students/{{ auth()->id() }}/questions">Questions</a>
            </div>
        @endif

    </div>

    <div>

        @auth
            <div>
                <a href="/me">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</a>
            </div>
            <div>
                <form method="POST" action="/logout">
                    @csrf

                    <button class="logout-button">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
            @endauth
        </div>

    </div>
</nav>
