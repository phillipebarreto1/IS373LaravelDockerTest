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
        <a href="/movie/create"><button type="button" class="btn btn-primary spacing my-4">Add</button></a>
        <!-- End Box Links -->
        <br>
        <!-- Scrollable Box for Movie Entries -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="overflow-auto" style="max-height: 300px;">
                    <!-- Your movie entries will be added here dynamically -->
                    <!-- Example entry: -->
                    <p class="card-text">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Year Released</th>
                            <th>Average Rating</th>
                            <th></th>
                        </tr>

                        @foreach ($data as $movie)
                        <tr>
                            <td> {{$movie->title}}</td>
                            <td>{{$movie->yearReleased}}</td>
                            <td>{{$movie->avgRating}}</td>
                            <td>
                                <a class="px-2" href="/movie/info?id={{$movie->id }}"><button type="button" class="btn btn-info">Info</button></a>
                                <a class="px-2" href="/movie/update?id={{$movie->id }}"><button type="button" class="btn btn-primary">Update</button></a>
                                <button type="button" class="btn btn-danger" class="px-2" onclick="delete_movie({{$movie->id }})">Delete</button>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                    </p>
                    <!-- Add more entries as needed -->
                </div>
            </div>
        </div>
        <!-- End Scrollable Box -->
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>
<script>
    function delete_movie(id) {
        if (confirm("Want to delete?") === true) {
            // call api to delete api/movie/{id}
            axios.delete('/api/movie/' + id)
                .then(function (response) {
                    console.log("Delete movie");
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>


</html>