<?php
// show all data from users table
// from biggest to smallest
$query = mysqli_query($conn, "SELECT * FROM sliders ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];

    // hapus file gambar berdasarkan id
    $querying = mysqli_query($conn, "SELECT * FROM sliders WHERE id = '$delete'");
    $rowDelete = mysqli_fetch_assoc($querying);
    $oldpath = "assets/img/" . $rowDelete['image'];
    if (file_exists($oldpath)) {

        unlink($oldpath);
    }

    // delete data berdasarkan id di database
    $delete = mysqli_query($conn, "DELETE FROM sliders WHERE id = '$delete'");


    header("location:slider.php?hapus=berhasil");
}


?>

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Sliders</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
        <a href="create-slider.php" class="btn btn-primary btn-round">Create New Slider</a>
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
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>Description</th>
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
                                    <?php echo $row['subtitle'] ?>
                                </td>
                                <td>
                                    <img src="assets/img/<?php echo $row['image'] ?>" alt="" class="img-fluid border"
                                        width="170">
                                </td>
                                <td>
                                    <?php echo $row['description'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="create-slider.php?edit=<?php echo $row['id'] ?>">Details</a>
                                    <a onclick="return confirm('Are you sure wanna delete this data?')"
                                        class="btn btn-danger btn-sm"
                                        href="slider.php?delete=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>