<x-layout>
    Are you shure you want to delete {{ $user->first_name . ' ' . $user->last_name }}?
    <form method="POST" action={{ '/users/' . $user->id }}>
        @csrf
        @method('DELETE')

        <button>Delete User</button>
    </form>
</x-layout>
