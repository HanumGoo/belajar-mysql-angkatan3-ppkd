<?php

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
            header("location:app.php?page=projects&tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            projects
            (title, type, image, link)
            VALUE
            ('$title', '$type', '$image', '$link')");
            header("location:app.php?page=projects&tambah=berhasil");
        }
    } else {
        if ($id) {
            $update = mysqli_query($conn, "UPDATE projects SET
            title = '$title',
            type = '$type',
            link = '$link' WHERE id = '$id'");
            header("location:app.php?page=projects&tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            projects
            (title, type, link)
            VALUE
            ('$title', '$type', '$link')");
            header("location:app.php?page=projects&tambah=berhasil");
        }
    }
}







?>
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
                        <input type="text" class="form-control" name="title" placeholder="Enter Title" required
                            value="<?php echo ($id) ? $row['title'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Enter Type" required
                            value="<?php echo ($id) ? $row['type'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Image
                            <?php echo isset($id) ? '(leave it blank if you want keep the old image)' : '' ?>
                        </label>
                        <input type="file" class="form-control" name="image" placeholder="Enter Image" id="images"
                            src="<?php echo ($id) ? $row['image'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" name="link" placeholder="Enter Link" required
                            value="<?php echo ($id) ? $row['link'] : '' ?>">
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