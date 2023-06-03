<?php
    session_start();
    if (isset($_POST['login'])) {
        $user1 = $_POST['user'];
        $pass1 = $_POST['pass'];

        // cek login
        if ($user1 == "rahadian" && $pass1 == "123") {
            // membuat session
            $_SESSION['login'] = $user1;
            // menuju ke halaman pemeriksaan session

            echo "
                <h1>Anda berhasil LOGIN</h1>
                <h2>Klik <a href='session2.php'> di sini (session2.php) </a></h2>
            ";
        }
    }  else {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login here...</title>
        </head>
        <body>
            <form action="" method="post">
                Username: <input type="text" name="user"><br/>
                Password: <input type="password" name="pass" id=""><br/>

                <input type="submit" name="login" value="Log In">
            </form>
        </body>
        </html>
        <?php
    }
?>