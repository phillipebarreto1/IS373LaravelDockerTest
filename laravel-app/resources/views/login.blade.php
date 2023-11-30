<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <x-layout>
        <h1>Login</h1>

        <!-- Movie Update Form -->
        <form action="/api/login" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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