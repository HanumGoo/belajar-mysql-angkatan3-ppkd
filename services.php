<?php
// show all data from users table
// from biggest to smallest
$query = mysqli_query($conn, "SELECT * FROM services ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $delete = mysqli_query($conn, "DELETE FROM services WHERE id = '$delete'");
    header("location:app.php?page=services&hapus=berhasil");
}


?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Services</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
        <a href="app.php?page=create-services" class="btn btn-primary btn-round">Create New Services</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Icon Class</th>
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
                                    <?php echo $row['title'] ?>
                                </td>
                                <td>
                                    <?php echo $row['icon_class'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="app.php?page=create-services&edit=<?php echo $row['id'] ?>">Edit</a>
                                    <a onclick="return confirm('Are you sure wanna delete this data?')"
                                        class="btn btn-danger btn-sm"
                                        href="app.php?page=services&delete=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>