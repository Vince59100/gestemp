<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login</title>
</head>

<body class="p-3 mb-2 bg-secondary text-white">

    <h1>Login</h1>

    <form action="login_code.php" method="POST">

        <input type="text" class="form-control" name="username" value="" placeholder="username"><br>
        <input type="email" class="form-control" name="email" value="" placeholder="email"><br>
        <input type="password" class="form-control" name="mdp" value="" placeholder="mdp"><br>
        <input type="number" class="form-control" name="rang" value="" placeholder="rang"><br>

        <input type="submit" class="btn btn-success" value="Login">

    </form>


</body>

</html>