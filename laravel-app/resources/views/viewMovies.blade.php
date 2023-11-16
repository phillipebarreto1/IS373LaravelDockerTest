<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Movie List</h1>

        <!-- Scrollable Box for Movie Entries -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="overflow-auto" style="max-height: 300px;">
                    <!-- Your movie entries will be added here dynamically -->
                    <!-- Example entry: -->
                    <p class="card-text">Movie Title: Example Movie, Year: 2022, Rating: 8.5</p>
                    <!-- Add more entries as needed -->
                </div>
            </div>
        </div>
        <!-- End Scrollable Box -->

        <!-- Box Links -->
        <div class="d-flex justify-content-around">
            <a href="/movie/create" class="btn btn-primary">Add</a>
            <a href="/movie/get" class="btn btn-info">Find</a>
            <a href="/movie/update" class="btn btn-warning">Update</a>
            <a href="/movie/delete" class="btn btn-danger">Delete</a>
        </div>
        <!-- End Box Links -->

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>