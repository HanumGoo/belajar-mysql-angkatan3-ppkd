<?php
// show all data from users table
// from biggest to smallest
$query = mysqli_query($conn, "SELECT * FROM contacts ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

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
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $index => $row): ?>
                            <tr>
                                <td>
                                    <?php echo $index += 1 ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['subject'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="app.php?page=reply-contact&edit=<?php echo $row['id'] ?>">Reply</a>
                                    <a class="btn btn-success btn-sm"
                                        href="app.php?page=detail-contact&id=<?php echo $row['id'] ?>">Details</a>
                                    <a onclick="return confirm('Are you sure wanna delete this data?')"
                                        class="btn btn-danger btn-sm"
                                        href="app.php?page=contact&delete=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>