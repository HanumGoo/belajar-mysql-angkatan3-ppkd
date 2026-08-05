<?php

// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

$insert = mysqli_query($conn, "SELECT * FROM resume WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $year_start = $_POST['year_start'];
    $year_end = $_POST['year_end'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];

    //pseudo code to users table, tell the table users based from user input

    if ($id) {
        $update = mysqli_query($conn, "UPDATE resume SET
        title = '$title',
        year_start = '$year_start',
        year_end = '$year_end',
        subtitle = '$subtitle',
        description = '$description' WHERE id = '$id'");
        header("location:app.php?page=resume&tambah=berhasil");
    } else {
        $query_input = mysqli_query($conn, "INSERT INTO
        resume
        (title, year_start, year_end, subtitle, description)
        VALUE
        ('$title', '$year_start', '$year_end', '$subtitle', '$description')");
        header("location:app.php?page=resume&tambah=berhasil");
    }

}

?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">
            <?php echo isset($_GET['edit']) ? "Edit Resume" : "Create New Resume" ?>
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
                        <input type="text" class="form-control" name="title" placeholder="Title..." required
                            value="<?php echo ($id) ? $row['title'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" placeholder="Subtitle..." required
                            value="<?php echo ($id) ? $row['subtitle'] : '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Description</label>
                        <textarea class="form-control" name="description" id=""
                            placeholder="Description..."><?php echo ($id) ? $row['description'] : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Year Start</label>
                        <select name="year_start" id="year_start" class="form-select">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Year End</label>
                        <select name="year_end" id="year_end" class="form-select">
                        </select>
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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const startYear = document.getElementById("year_start");
        const endYear = document.getElementById("year_end");
        const year_old = 1920;
        const currentYear = new Date().getFullYear();

        for (let year = currentYear; year >= year_old; year--) {
            const option = document.createElement("option");
            const option1 = document.createElement("option");
            option.value = year;
            option.textContent = year;
            option1.value = year;
            option1.textContent = year;
            startYear.appendChild(option);

            endYear.appendChild(option1);
        }

        startYear.value = <?php echo ($id) ? $row['year_start'] : 'currentYear' ?>;
        endYear.value = <?php echo ($id) ? $row['year_end'] : 'currentYear' ?>;
    })
</script>