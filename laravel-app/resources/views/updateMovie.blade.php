<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
</head>

<body>
    <x-layout>
        <h1>Update Movie</h1>

        <!-- Movie Update Form -->
        <form action="/api/movie" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" type="text" class="form-control" id="id" name="id">

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
        <!-- End Movie Update Form -->
    </x-layout>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');

        document.getElementById("id").value = id;

        axios.get('/api/movie/' + id)
            .then(function (response) {
                console.log(response);
                document.getElementById('title').value = response.data.title;
                document.getElementById('yearReleased').value = response.data.yearReleased;
                document.getElementById('avgRating').value = response.data.avgRating;
            })
            .catch(function (error) {
                console.log(error);
            });
    </script>
</body>

</html>