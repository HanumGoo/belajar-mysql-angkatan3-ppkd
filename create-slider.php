<?php

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
    $image = $_FILES['image'];
    $is_active = $_POST['is_active'];

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
            header("location:app.php?page=slider&tambah=berhasil");

        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            sliders
            (title, subtitle, description, button1_text, button1_link, button2_text, button2_link, image, is_active)
            VALUE
            ('$title', '$subtitle', '$description', '$button1_text', '$button1_link', '$button2_text', '$button2_link', '$image', '$is_active')");
            header("location:app.php?page=slider&tambah=berhasil");
        }
    } else {
        if ($id) {
            $update = mysqli_query($conn, "UPDATE sliders SET
            title = '$title',
            subtitle = '$subtitle',
            description = '$description',
            button1_text = '$button1_text',
            button1_link = '$button1_link',
            button2_text = '$button2_text',
            button2_link = '$button2_link',
            is_active = '$is_active' WHERE id = '$id'");
            header("location:app.php?page=slider&tambah=berhasil");
        } else {
            $query_input = mysqli_query($conn, "INSERT INTO
            sliders
            (title, subtitle, description, button1_text, button1_link, button2_text, button2_link, image, is_active)
            VALUE
            ('$title', '$subtitle', '$description', '$button1_text', '$button1_link', '$button2_text', '$button2_link', null, '$is_active')");
            header("location:app.php?page=slider&tambah=berhasil");
        }
    }
}
?>
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
                                            <label for="" class="form-label fw-bold">Button 1 Text</label>
                                            <input type="text" class="form-control" name="button1_text"
                                                placeholder="Enter Button 1 Text" required
                                                value="<?php echo ($id) ? $row['button1_text'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 1 Link</label>
                                            <input type="text" class="form-control" name="button1_link"
                                                placeholder="Enter Button 1 Link" required
                                                value="<?php echo ($id) ? $row['button1_link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 2 Text</label>
                                            <input type="text" class="form-control" name="button2_text"
                                                placeholder="Enter Button 2 Text" required
                                                value="<?php echo ($id) ? $row['button2_text'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Button 2 Link</label>
                                            <input type="text" class="form-control" name="button2_link"
                                                placeholder="Enter Button 2 Link" required
                                                value="<?php echo ($id) ? $row['button2_link'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Image
                                                <?php echo isset($id) ? '(leave it blank if you want keep the old image)' : '' ?></label>
                                            <input type="file" class="form-control" name="image"
                                                placeholder="Enter Image" id="images"
                                                src="<?php echo ($id) ? $row['image'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Description</label>
                                            <textarea name="description"
                                                class="form-control"><?php echo ($id) ? $row['description'] : '' ?></textarea>
                                        </div>
                                        <div class="mb-3">

                                            <label for="" class="form-label fw-bold">Active</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_active"
                                                    id="radioDefault1" checked value="1">
                                                <label class="form-check-label" for="is_active">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="is_active"
                                                    id="radioDefault2" <?php echo ($id && $row['is_active'] == 1) ? '' : 'checked' ?> value="0">
                                                <label class="form-check-label" for="is_active">
                                                    Disable
                                                </label>
                                            </div>
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