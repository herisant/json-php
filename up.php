
<h3>Upload</h3>
<form name="myForm" action="upload.php" onSubmit="return validateForm()" method="post" enctype="multipart/form-data" >
    <!-- <label>Select file to upload:</label><br> -->
    <input type="file" name="fileexcelall" id="fileexcelall"><br>
    <input type="submit" value="Upload Excel" name="submit" class="btn btn-primary"><br>
    <!-- <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label> -->
</form>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status']=='1') {
            echo '<div class="alert alert-success" role="alert">Sukses upload.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Gagal upload.</div>';
        }
        
    }
    
    ?>