<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold text-secondary">
        <img src="../assets/images/logo.png" width="30" height="30" class="d-inline-block align-top"
            alt="">
        UNIVERSITY RESEARCH CENTER
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../event.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../research.php">Researches</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../journal.php">Journals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../statistic.php">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contact.php">Contact Us</a>
            </li>
        </ul>
        <ul class="nav navbar-nav">
        <?php    
        if(!isset($_SESSION['loggedin'])) {
          ?>
            <li class="nav-item">
                <a class="nav-link" href="../register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../login.php">Login</a>
            </li>
        <?php
        } elseif($_SESSION['user_type'] == 'admin'){
        ?>

            <li class="nav-item">
            <a class="nav-link disabled">Welcome! <?php echo $_SESSION['user_type']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin-home.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <?php

        } else{
        ?>
 <li class="nav-item">
            <a class="nav-link disabled">Welcome! <?php echo $_SESSION['user_type']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user-home.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>