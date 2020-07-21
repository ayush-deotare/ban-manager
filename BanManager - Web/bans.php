<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div id="navbarTogglerDemo01">
                    <h1>Spigot Bans</h1>

                    <button class="btn " style="background-color: #4BA16E;">Login</button>
                    <!-- <h3 style="color: wheat;">Hello World!</h3> -->

                    <nav class="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="index.php" class="nav-link">Dashboard</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" style="color: #8697EE;">Bans</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mutes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-md-10 content">
                <div class="container">
                    <table class="table table-bordered"  style="background-color: #3F444A; margin-top: 10%;">
                        <tr style="color: white; font-size: 1.1rem;">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Banner</th>
                            <th>Date</th>
                            <th>Reason</th>
                        </tr>

                        <?php
                            include("./api/db.php");
                            $bans = get_all_bans();

                            while ($ban = $bans->fetch_assoc()) {
                        ?>
                            <tr style="color: white;">
                                <td><a href="#"><?php echo $ban["id"]?></a></td>
                                <td><?php echo $ban["uuid"]?></td>
                                <td><?php echo $ban["by_uuid"]?></td>
                                <td><?php echo $ban["date"]?></td>
                                <td><?php echo $ban["reason"]?></td>
                            </tr>

                        <?php }?>

                    </table>

                </div>
            </div>
        </div>
    </div>

</body>

</html>