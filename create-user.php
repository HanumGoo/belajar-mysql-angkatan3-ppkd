<?php
// show all data from users table
// from biggest to smallest


// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$insert = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {



    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $row['password'];
    //pseudo code to users table, tell the table users based from user input
    $email_check = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'"));

    if ($id) {
        $update = mysqli_query($conn, "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'");
        header("location:app.php?page=user&tambah=berhasil");
        exit();
    } else {
        if ($email_check) {
            //echo "email terdeteksi sama";
            header("location:app.php?page=create-user&tambah=gagal");
            exit();
        }
        $query_input = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUE ('$name', '$email', '$password')");
        header("location:app.php?page=user&tambah=berhasil");
        exit();
    }

}


?>
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3 class="fw-bold mb-3">
                                <?php echo isset($_GET['edit']) ? "Edit User" : "Create New User" ?>
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
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name"
                                                required value="<?php echo ($id) ? $row['name'] : '' ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Email</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Enter Email" required
                                                value="<?php echo ($id) ? $row['email'] : '' ?>">


                                        </div>
                                        <div class="mb-3">
                                            <label for=""
                                                class="form-label fw-bold"><?php echo ($id) ? "Password <small>(leave blank if you do not wish to change it)</small>" : 'Password' ?></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Enter Password" <?php echo ($id) ? '' : 'required' ?>
                                                value="<?php echo ($id) ? '' : '' ?>">
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