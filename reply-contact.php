<?php

// if save button is getting pressed
$id = isset($_GET['edit']) ? $_GET['edit'] : '';

if (!$id) {
    header("location:contact.php");
    ;
}

$insert = mysqli_query($conn, "SELECT * FROM contacts WHERE id = '$id'");
$row = mysqli_fetch_assoc($insert);



if (isset($_POST['save'])) {

    $to = $row['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: sheehanandya333@gmail.com\r\n";
    $headers .= "Reply-To: sheehanandya333@gmail.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        header("location:app.php?page=contact&pesan=berhasil");
    } else {
        header("location:app.php?page=contact&pesan=gagal");
    }



}







?>
<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">
            <?php echo isset($_GET['edit']) ? 'Send message to: ' . $row['email'] : 'impossible' ?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Subject</label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Message</label>
                        <textarea type="text" class="form-control" name="message" placeholder="Your Message"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="save">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>