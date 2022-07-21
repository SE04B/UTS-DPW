<?php
    if (isset($_POST['fasilitas1simpan'])){
        $fasilitas1 = mysqli_real_escape_string($con, $_POST['fasilitas1']);
        $image = $_FILES['fasilitasImage1']['name'];
        $imageDirectory = "../img/fasilitas/".basename($_FILES['fasilitasImage1']['name']);
        $queryInput1 = "UPDATE cms_fasilitas SET name='$fasilitas1',image='$fasilitasImage1' WHERE id=1";
        $exec1 = Query($queryInput1);
        if ($exec1){
            move_uploaded_file($_FILES['fasilitasImage1']['tmp_name'], $imageDirectory);
        } else {
            $_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";
        }
    }
?>