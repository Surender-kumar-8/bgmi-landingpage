<?php
include("list.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BGMI</title>
    <link rel="stylesheet" href="tour.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="detail_img img_size">
    <div class="navbar navbar-light navclr">
        <div class="row">
            <span class="nav-item col">
                <a class="navbar-brand text-white navleft" href="dashboard.php">BGMI</a>
            </span>
        </div>
    </div>
    <div>
        <div class="bg-dark">
            <h2 style="text-align:center; color:aliceblue;">List of Participants</h2>
        </div>
        <table class="table table-dark">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Date Of Birth</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['first_name'] ?></td>
                        <td><?php echo $row['last_name'] ?></td>
                        <td><?php echo $row['phone_no'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                    </tr>
                <?php }; ?>
            <?php }; ?>
        </table>

    </div>
    </div>
    <div>
</body>

</html>