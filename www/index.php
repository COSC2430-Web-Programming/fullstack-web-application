<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullstack Web Application</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off"> 
        <h2>Index.php File</h2>
        <h2>Register form</h2>
        <h4>Username and password are <span>required</span></h4>

        <label>Username</label>
        <input type="text" name="username">

        <label>Passwords</label>
        <input type="text" name="password">

        <button type="submit" name="submit">Register</button>

        <p class="error"><?php echo @$user->error ?></p>
        <p class="success"><?php echo @$user->success ?></p>

    </form>
    
</body>
</html>