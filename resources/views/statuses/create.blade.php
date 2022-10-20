<x-layout>
    <form method="POST" action={{ '/students/' . $id . '/statuses' }}>
        @csrf

        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <button>Submit</button>
    </form>
</x-layout>
