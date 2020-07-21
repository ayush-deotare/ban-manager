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

                    <nav class="navbar">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#" class="nav-link" style="color: #8697EE;">Dashboard</a></li>
                            <li class="nav-item"><a href="bans.php" class="nav-link">Bans</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Mutes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-md-10 content">
                <div class="container">

                    <h2>Overall Statistics</h2>

                    <div class="row stats-row">

                        <div class="col-lg-3 offset-md-1 stats">
                            <span class="number"><?php include("./api/db.php"); echo get_all_bans()->num_rows?></span>
                            <p class="type">Bans</p>
                        </div>

                        <div class="col-lg-3 offset-md-1 stats">
                            <span class="number">0</span>
                            <p class="type">Mutes</p>
                        </div>

                        <div class="col-lg-3 offset-md-1 stats">
                            <span class="number">0</span>
                            <p class="type">Reports</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
