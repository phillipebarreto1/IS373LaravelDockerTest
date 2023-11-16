<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Update Movie</h1>

        <!-- Movie Update Form -->
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="id">Movie ID:</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="rating">Average Rating:</label>
                <input type="number" class="form-control" id="rating" name="rating" step="0.1" required>
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <!-- End Movie Update Form -->

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>