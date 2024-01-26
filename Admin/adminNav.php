<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2 px-2 mb-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="adminHome.php">GiveMeWay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="adminHome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminCOR.php">Cattle on Road</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminINJ.php">Injured Animal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminLost.php">Lost Animal</a>
                </li>
                <?php
                if ($adminType == 'state') {
                    echo '<li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add Admin
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="addMun.php">District Municipalty</a></li>
                                    <li><a class="dropdown-item" href="addNGO.php">NGO</a></li>
                                </ul>
                            </div>
                        </li>';
                } 
                else if ($adminType == 'Municipality') {
                    echo '<li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add Admin
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="addNGO.php">NGO</a></li>
                                </ul>
                            </div>
                        </li>';
                }
                ?>
            </ul>
            <form class="d-flex navbar-nav mb-1">
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminLogout.php">Logout</a>
                </li>
            </form>
        </div>
    </div>
</nav>