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
                <label for="title"><b>Title:</b></label>
                <span type="text" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="title"><b>Year Released:</b></label>
                <span type="text" id="yearReleased" name="yearReleased">
            </div>
            <div class="form-group">
                <label for="title"><b>Average Rating:</b></label>
                <span type="text" id="avgRating" name="avgRating">
            </div>

            <!-- Add more fields as needed -->

            
        </form>
        <!-- End Movie Look Up Form -->

    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');

        axios.get('/api/movie/' + id)
            .then(function (response) {
                console.log(response);
                document.getElementById('title').innerHTML = response.data.title;
                document.getElementById('yearReleased').innerHTML = response.data.yearReleased;
                document.getElementById('avgRating').innerHTML = response.data.avgRating;
            })
            .catch(function (error) {
                console.log(error);
            });
    </script>

</body>
</html>
