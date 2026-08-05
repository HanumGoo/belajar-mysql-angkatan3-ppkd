<?php
// show all data from users table
// from biggest to smallest
$query = mysqli_query($conn, "SELECT * FROM blog_content ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $delete = mysqli_query($conn, "DELETE FROM blog_content WHERE id = '$delete'");
    header("location:app.php?page=blog-content&hapus=berhasil");
}


?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Content</h3>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        <!-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> -->
        <a href="app.php?page=create-blog-content" class="btn btn-primary btn-round">Create New Content</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Link</th>
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
                                <td class="manipulation">
                                    <?php echo $row['description'] ?>
                                </td>
                                <td>
                                    <?php echo $row['date'] ?>
                                </td>
                                <td>
                                    <img src="assets/img/<?php echo $row['image'] ?>" alt="" class="img-fluid border"
                                        width="170">
                                </td>
                                <td>
                                    <?php echo $row['link'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="app.php?page=create-blog-content&edit=<?php echo $row['id'] ?>">Details</a>
                                    <a onclick="return confirm('Are you sure wanna delete this data?')"
                                        class="btn btn-danger btn-sm"
                                        href="app.php?page=blog-content&delete=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>