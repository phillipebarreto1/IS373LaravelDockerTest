<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
</head>

<body>
    <x-layout>
        <h1>Register</h1>

        <!-- Movie Update Form -->
        <form action="/api/register" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email" name="email">
            </div>
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group mb-3">
                <label for="confirm_pwd">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_pwd" placeholder="Enter password again"
                    name="confirm_pwd">
            </div>
        </form>
        <button type="submit" class="btn btn-primary" onclick="register()">Submit</button>
        <!-- End Movie Update Form -->
    </x-layout>

    <script>
        function register() {
            const email = document.getElementById("email").value;
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
            const confirm_pwd = document.getElementById("confirm_pwd").value;

            if (password !== confirm_pwd) {
                alert("Passwords do not match");
            }
            else {
                axios.post('/api/register', {
                    email: email,
                    username: username,
                    password: password
                })
                    .then(function (response) {
                        console.log(response.data)

                        if (response.data === "Register Success") {
                            alert("Register Success");
                            location.href = "/login"
                        }
                        else {
                            alert(response.data);
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }

        }
    </script>
</body>

</html>