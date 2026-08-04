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

$insert = mysqli_query($conn, "SELECT * FROM blog_content WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    $date = $_POST['date'];
    $link = $_POST['link'];
    $comment_count = $_POST['comment_count'];

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
            $update = mysqli_query($conn, "UPDATE blog_content SET
            title = '$title',
            description = '$description',
            date = '$date',
            image = '$image',
            link = '$link',
            comment_count = '$comment_count' WHERE id = '$id'");
            header("location:blog-content.php?tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            blog_content
            (title, description, date, image, link, comment_count)
            VALUE
            ('$title', '$description', '$date', '$image', '$link', $comment_count)");
            header("location:blog-content.php?tambah=berhasil");
        }
    } else {
        if ($id) {
            $update = mysqli_query($conn, "UPDATE blog_content SET
            title = '$title',
            description = '$description',
            date = '$date',
            link = '$link',
            comment_count = '$comment_count' WHERE id = '$id'");
            header("location:blog-content.php?tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            blog_content
            (title, description, date, link, comment_count)
            VALUE
            ('$title', '$description', '$date', '$link', $comment_count)");
            header("location:blog-content.php?tambah=berhasil");
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
                                <?php echo isset($_GET['edit']) ? "Edit Content" : "Create New Content" ?>
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
                                            <label for="" class="form-label fw-bold">Description</label>
                                            <input type="text" class="form-control" name="description"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['description'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Date</label>
                                            <input type="date" class="form-control" name="date"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['date'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Image
                                                <?php echo isset($id) ? '(leave it blank if you want keep the old image)' : '' ?>
                                            </label>
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Enter Email" id="images"
                                                src="<?php echo ($id) ? $row['image'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Link</label>
                                            <input type="text" class="form-control" name="link"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Comment Count (Optional)</label>
                                            <input type="number" class="form-control" name="comment_count"
                                                placeholder="Enter Email" max="999"
                                                value="<?php echo ($id) ? $row['comment_count'] : '' ?>">
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