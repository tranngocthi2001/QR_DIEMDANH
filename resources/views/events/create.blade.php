<!-- create.blade.php -->
<form method="POST" action="{{ route('events.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <label for="start_time">Start Time:</label>
    <input type="datetime-local" name="start_time" id="start_time">

    <label for="end_time">End Time:</label>
    <input type="datetime-local" name="end_time" id="end_time">

    <label for="location">Location:</label>
    <input type="text" name="location" id="location">

    <button type="submit">Create Event</button>
</form>
@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

