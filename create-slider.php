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

$insert = mysqli_query($conn, "SELECT * FROM sliders WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $button1_text = $_POST['button1_text'];
    $button1_link = $_POST['button1_link'];
    $button2_text = $_POST['button2_text'];
    $button2_link = $_POST['button2_link'];
    $image = $_POST['image'] ? $_POST['image'] : $row['image'];
    $is_active = $_POST['is_active'];

    //pseudo code to users table, tell the table users based from user input

    if ($id) {
        $update = mysqli_query($conn, "UPDATE sliders SET
        title = '$title',
        subtitle = '$subtitle',
        description = '$description',
        button1_text = '$button1_text',
        button1_link = '$button1_link',
        button2_text = '$button2_text',
        button2_link = '$button2_link',
        image = '$image',
        is_active = '$is_active' WHERE id = '$id'");
        header("location:slider.php?tambah=berhasil");
    } else {
        $query_input = mysqli_query($conn, "INSERT INTO
        sliders
        (title, subtitle, description, button1_text, button1_link, button2_text, button2_link, image, is_active)
        VALUE
        ('$title', '$subtitle', '$description', '$button1_text', '$button1_link', '$button2_text', '$button2_link', '$image', '$is_active')");
        header("location:slider.php?tambah=berhasil");
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
                                <?php echo isset($_GET['edit']) ? "Edit Slider" : "Create New Slider" ?>
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
                                                placeholder="Enter Name" required
                                                value="<?php echo ($id) ? $row['title'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Subtitle</label>
                                            <input type="text" class="form-control" name="subtitle"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['subtitle'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 1 Text</label>
                                            <input type="text" class="form-control" name="button1_text"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['button1_text'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 1 Link</label>
                                            <input type="text" class="form-control" name="button1_link"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['button1_link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['button2_text'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 2 Link</label>
                                            <input type="text" class="form-control" name="button2_link"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['button2_link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Image
                                                <?php echo isset($id) ? '(leave it blank if you want keep the old image)' : '' ?></label>
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Enter Email"
                                                src="<?php echo ($id) ? $row['image'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Description</label>
                                            <textarea name="description"
                                                class="form-control"><?php echo ($id) ? $row['description'] : '' ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Active</label>
                                            <input type="number" class="form-control" name="is_active"
                                                placeholder="1 or 0" required
                                                value="<?php echo ($id) ? $row['is_active'] : '' ?>">
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