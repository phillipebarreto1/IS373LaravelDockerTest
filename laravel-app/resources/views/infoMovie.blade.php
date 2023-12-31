<!DOCTYPE html>
<html lang="en">

<head>
    <title>Look Up Movie</title>
</head>

<body>
    <x-layout>
        <h1>Look Up Movie</h1>
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
    </x-layout>

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