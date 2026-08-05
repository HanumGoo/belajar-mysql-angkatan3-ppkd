<?php
session_start();
session_regenerate_id();

include "config/connection.php";
// show all data from users table
// from biggest to smallest
$name = $_SESSION['name'];

if (!$name) {
    header("location:index.php");
}

// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$insert = mysqli_query($conn, "SELECT * FROM projects WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $image = $_FILES['image'];
    $link = $_POST['link'];

    if (($image['error'] == 0)) {
        $filename = uniqid() . "_" . $image['name'];
        $filepath = "assets/img/" . $filename;
        move_uploaded_file($image['tmp_name'], $filepath);

        //pseudo code to users table, tell the table users based from user input
        $image = $filename;

        if ($id) {
            $old_pict = "assets/img/" . $row['image'];
            if (file_exists($old_pict)) {
                unlink($old_pict);
            }
            $update = mysqli_query($conn, "UPDATE projects SET
            title = '$title',
            type = '$type',
            image = '$image',
            link = '$link' WHERE id = '$id'");
            header("location:projects.php?tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            projects
            (title, type, image, link)
            VALUE
            ('$title', '$type', '$image', '$link')");
            header("location:projects.php?tambah=berhasil");
        }
    } else {
        if ($id) {
            $update = mysqli_query($conn, "UPDATE projects SET
            title = '$title',
            type = '$type',
            link = '$link' WHERE id = '$id'");
            header("location:projects.php?tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            projects
            (title, type, link)
            VALUE
            ('$title', '$type', '$link')");
            header("location:projects.php?tambah=berhasil");
        }
    }
}







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <?php
    include "inc/css.php";
    ?>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php
        include "inc/sidebar.php";
        ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php
                include "inc/navbar.php";
                ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">
                                <?php echo isset($_GET['edit']) ? "Edit Project" : "Create New Project" ?>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Title" required
                                                value="<?php echo ($id) ? $row['title'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Type</label>
                                            <input type="text" class="form-control" name="type" placeholder="Enter Type"
                                                required value="<?php echo ($id) ? $row['type'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Image
                                                <?php echo isset($id) ? '(leave it blank if you want keep the old image)' : '' ?>
                                            </label>
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Enter Image" id="images"
                                                src="<?php echo ($id) ? $row['image'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Link</label>
                                            <input type="text" class="form-control" name="link" placeholder="Enter Link"
                                                required value="<?php echo ($id) ? $row['link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" name="save">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Help </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Licenses </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div>
                        Distributed by
                        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php
    include "inc/js.php";
    ?>
</body>

</html>