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

$insert = mysqli_query($conn, "SELECT * FROM achievements WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $project_total = $_POST['project_total'];
    $award_total = $_POST['award_total'];
    $customer_total = $_POST['customer_total'];
    $coffee_total = $_POST['coffee_total'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];

    if ($id) {

        $update = mysqli_query($conn, "UPDATE achievements SET
            title = '$title',
            subtitle = '$subtitle',
            project_total = '$project_total',
            award_total = '$award_total',
            customer_total = '$customer_total',
            coffee_total = '$coffee_total',
            button_text = '$button_text',
            button_link = '$button_link' WHERE id = '$id'");
        header("location:achievements.php?tambah=berhasil");

    } else {
        $query_input = mysqli_query($conn, "INSERT INTO
            achievements
            (title, subtitle, project_total, award_total, customer_total, coffee_total, button_text, button_link)
            VALUE
            ('$title', '$subtitle', '$project_total', '$award_total', '$customer_total', '$coffee_total', '$button_text', '$button_link')");
        header("location:achievements.php?tambah=berhasil");
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
                                <?php echo isset($_GET['edit']) ? "Edit Achievement" : "Create New Achievement" ?>
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
                                            <label for="" class="form-label fw-bold">Subtitle</label>
                                            <input type="text" class="form-control" name="subtitle"
                                                placeholder="Enter Subtitle" required
                                                value="<?php echo ($id) ? $row['subtitle'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Project Total</label>
                                            <input type="number" class="form-control" name="project_total"
                                                placeholder="Enter Project Total" required
                                                value="<?php echo ($id) ? $row['project_total'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Award Total</label>
                                            <input type="number" class="form-control" name="award_total"
                                                placeholder="Enter Award Total" required
                                                value="<?php echo ($id) ? $row['award_total'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Customer Total</label>
                                            <input type="number" class="form-control" name="customer_total"
                                                placeholder="Enter Customer Total" required
                                                value="<?php echo ($id) ? $row['customer_total'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Coffee Total</label>
                                            <input type="number" class="form-control" name="coffee_total"
                                                placeholder="Enter Coffee Total" required
                                                value="<?php echo ($id) ? $row['coffee_total'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button Text</label>
                                            <input type="text" class="form-control" name="button_text"
                                                placeholder="Enter Button Text" required
                                                value="<?php echo ($id) ? $row['button_text'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button Link</label>
                                            <input type="text" class="form-control" name="button_link"
                                                placeholder="Enter Button Link" required
                                                value="<?php echo ($id) ? $row['button_link'] : '' ?>">
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