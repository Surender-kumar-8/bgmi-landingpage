<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="tour.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="log_img">
    <div class="mx-auto" style="height: 600px; width:30%; margin-top:100px">
        <h2 class="text-center text-white">PLAYER LOGIN</h2>
        <form action="login_check.php" method="post">
            <div>

                Email <input type="email" class="form-control mt-3" name="eml" autocomplete="off">
                <?php if(isset($_SESSION["error"]["email_error"])) :?>
                    <div class="text-danger"><?php echo $_SESSION["error"]["email_error"];?></div>
                    <?php unset($_SESSION["error"]["email_error"]);?>
                <?php endif ;?>
                password <input type="password" class="form-control mt-3" name="pwd" autocomplete="new-password">
                
                <?php if(isset($_SESSION["error"]["password_error"])) :?>
                    <div class="text-danger"><?php echo $_SESSION["error"]["password_error"];?></div>
                    <?php unset($_SESSION["error"]["password_error"]);?>
                <?php endif ;?>
                <button type="submit" class="form-control btn btn-warning mt-3" name="submit">Login</button>
            </div>
        </form> 
    </div>
</body>

</html>