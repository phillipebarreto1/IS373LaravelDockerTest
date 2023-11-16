<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Add Movie to List</h1>

        <!-- Movie Add Form -->
        <form action="/api/movie" method="POST">
            @csrf

            
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Movie Title" required>
            </div>

            <div class="form-group">
                <label for="yearReleased">Year Released:</label>
                <input type="number" class="form-control" id="yearReleased" name="yearReleased" placeholder="Enter Year Released" required>
            </div>

            <div class="form-group">
                <label for="avgRating">Average Rating:</label>
                <input type="number" class="form-control" id="avgRating" name="avgRating" placeholder="Enter Average Rating" step="0.1" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <!-- End Movie Add Form -->

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>