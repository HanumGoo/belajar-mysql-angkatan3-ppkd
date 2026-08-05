<?php

// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$insert = mysqli_query($conn, "SELECT * FROM skills WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {



    $name = $_POST['name'];
    $percentage = $_POST['percentage'];

    if ($id) {


        $update = mysqli_query($conn, "UPDATE skills SET name = '$name', percentage = '$percentage' WHERE id = '$id'");
        header("location:app.php?page=skills&tambah=berhasil");
    } else {
        $query_input = mysqli_query($conn, "INSERT INTO skills (name, percentage) VALUE ('$name', '$percentage')");
        header("location:app.php?page=skills&tambah=berhasil");
    }

}







?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">
            <?php echo isset($_GET['edit']) ? "Edit Skill" : "Create New Skill" ?>
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
                        <label for="" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required
                            value="<?php echo ($id) ? $row['name'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Percentage</label>
                        <input type="number" class="form-control" name="percentage" placeholder="Enter Percentage"
                            required value="<?php echo ($id) ? $row['percentage'] : '' ?>" max="100" min="0">


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