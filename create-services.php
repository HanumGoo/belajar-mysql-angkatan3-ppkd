<?php

// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$insert = mysqli_query($conn, "SELECT * FROM services WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {



    $title = $_POST['title'];
    $icon_class = $_POST['icon_class'];

    if ($id) {


        $update = mysqli_query($conn, "UPDATE services SET title = '$title', icon_class = '$icon_class' WHERE id = '$id'");
        header("location:app.php?page=services&tambah=berhasil");
    } else {
        $query_input = mysqli_query($conn, "INSERT INTO services (title, icon_class) VALUE ('$title', '$icon_class')");
        header("location:app.php?page=services&tambah=berhasil");
    }

}







?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">
            <?php echo isset($_GET['edit']) ? "Edit Service" : "Create New Service" ?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-warning" role="alert"
                    style="display: <?php echo isset($_GET['tambah']) ? 'block' : 'none' ?>">
                    <?php echo isset($_GET['tambah']) ? 'Email Duplikat Terdeteksi!' : 'none' ?>
                </div>

                <form action="" method="post">

                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required
                            value="<?php echo ($id) ? $row['title'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Icon Class</label>
                        <input type="text" class="form-control" name="icon_class" placeholder="Enter Icon Class"
                            required value="<?php echo ($id) ? $row['icon_class'] : '' ?>">


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