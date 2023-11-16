<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look Up Movie</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1>Look Up Movie</h1>

        <!-- Movie Look Up Form -->
        <form action="" method="GET">
            @csrf

            <div class="form-group">
                <label for="id">Movie ID:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Enter Movie ID">
            </div>

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Movie Title">
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <!-- End Movie Look Up Form -->

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
