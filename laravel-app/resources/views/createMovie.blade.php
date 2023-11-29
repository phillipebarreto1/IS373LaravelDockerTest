<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Movie</title>
</head>

<body>
    <x-layout>
        <h1>Add Movie to List</h1>

        <!-- Movie Add Form -->
        <form action="/api/movie" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Movie Title"
                    required>
            </div>

            <div class="form-group">
                <label for="yearReleased">Year Released:</label>
                <input type="number" class="form-control" id="yearReleased" name="yearReleased"
                    placeholder="Enter Year Released" required>
            </div>

            <div class="form-group">
                <label for="avgRating">Average Rating:</label>
                <input type="number" class="form-control" id="avgRating" name="avgRating"
                    placeholder="Enter Average Rating" step="0.1" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <!-- End Movie Add Form -->
    </x-layout>
</body>

</html>