<?php
// show all data from users table
// from biggest to smallest
$id = isset($_GET['id']) ? $_GET['id'] : '';
$query = mysqli_query($conn, "SELECT * FROM contacts WHERE id = '$id'");
$row = mysqli_fetch_assoc($query);

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $delete = mysqli_query($conn, "DELETE FROM contacts WHERE id = '$delete'");
    header("location:app.php?page=contact&hapus=berhasil");
}


?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Contact</h3>
    </div>
</div>
<div class="row">
    <div class="alert alert-<?= isset($_GET['pesan']) && ($_GET['pesan'] == 'berhasil') ? 'success' : 'warning' ?>"
        role="alert" style="display: <?php echo isset($_GET['pesan']) ? 'block' : 'none' ?>">
        <?php echo isset($_GET['pesan']) && ($_GET['pesan'] == 'berhasil') ? 'Pesan berhasil dikirim!' : 'Gagal Dikirim...' ?>
    </div>
    <div class="col-sm-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="" class="mb-2">Name</label>
                        <input type="text" readonly class="form-control" value="<?= $row['name'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="mb-2">Email</label>
                        <input type="text" readonly class="form-control" value="<?= $row['email'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="" class="mb-2">Subject</label>
                        <input type="text" readonly class="form-control" value="<?= $row['subject'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="mb-2">Message</label>
                        <textarea class="form-control" readonly name="" id=""><?= $row['message'] ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>