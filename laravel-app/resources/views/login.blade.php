<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <x-layout>
        <h1>Login</h1>

        <!-- Movie Update Form -->
        <form>
            @csrf
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
        </form>
        <button class="btn btn-primary" onclick="login()">Submit</button>
        <!-- End Movie Update Form -->
    </x-layout>

    <script>
        function login() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            axios.post('/api/login', {
                username: username,
                password: password
            })
                .then(function (response) {
                    console.log(response.data)
                    
                    if (response.data.msg === "Login Failed") {
                        alert("Login Failed");
                        location.reload();
                    }
                    else if (response.data.msg === "Login Success") {
                        Cookies.set('token', response.data.token)
                        location.href = '/movie'
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    </script>
</body>

</html>