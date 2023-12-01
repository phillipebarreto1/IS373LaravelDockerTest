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

        </form>

        <button type="submit" class="btn btn-primary" onclick="create_movie()">Save</button>
        <!-- End Movie Add Form -->
    </x-layout>
    <script>
        async function create_movie() {
            const token = Cookies.get('token')

            const response = await axios.get('/api/get-user-id/' + token);

            const user_id = response.data;
            console.log(user_id)

            const title = document.getElementById("title").value;
            const yearReleased = document.getElementById("yearReleased").value;
            const avgRating = document.getElementById("avgRating").value;

            axios.post('/api/movie', {
                title: title,
                yearReleased: yearReleased,
                avgRating: avgRating,
                user_id: user_id,
            })
                .then(function (response) {
                    console.log(response.data)
                    if (response.data === "Create movie") {
                        location.href = "/movie"
                    }
                    else {
                        console.error("Something went wrong")
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    </script>
</body>

</html>