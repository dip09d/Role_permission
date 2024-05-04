<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 90px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #frm_login {
            padding: 20px;
        }

        .has-error {
            border: 1px solid red;
        }
    </style>
</head>
<body>
<div id="login">
    <h3 class="text-center text-white pt-5">Login Here</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form name="frm_login" class="form" id="frm_login">
                        @csrf
                        <h3 class="text-center text-info">Login</h3>
                        <div class="mb-3">
                            <label for="email" class="text-info">Username:</label>
                            <input type="text" class="form-control" id="username" name="Username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="text-info">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" onclick="login()">Log In</button>
                        </div>
                        <div id="err" style="color: red"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script>
    function login() {
        var username = $('#username').val().trim();
        var password = $('#password').val().trim();

        if (username === '') {
            $('#username').addClass('has-error');
            showError('Please enter your username.');
            return false;
        }

        if (password === '') {
            $('#password').addClass('has-error');
            showError('Please enter your password.');
            return false;
        }

        var data = $("#frm_login").serialize();

        $.ajax({
            type: 'POST',
            url: '/check',
            data: data,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    window.location.replace(response.redirect);
                } else if (response.status === 'error') {
                    showError(response.message);
                }
            }
        });
    }

    function showError(message) {
        $('#err').text(message).fadeIn('slow');
    }
</script>
</body>
</html>
