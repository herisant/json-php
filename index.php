<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
</head>
<body>

<?php
if (!isset($_GET['id'])) {
    $style = 'up.php';
}else{
    $style = 'down.php';
}
?>
<hr>
<div class="container">
    <div class="row">
    	<div class="col-md-12">
            <ul class="nav nav-pills">
                <li <?php 
                    if(!isset($_GET['id'])){
                        echo 'class="active"';
                    }else{
                            echo '';
                    }?>
                ><a href="<?= basename('/index.php')?>">Upload</a></li>
                <li <?php 
                    if(isset($_GET['id'])){
                        echo 'class="active"';
                    }else{
                            echo '';
                    }?>
                ><a href="<?= basename('/index.php?id=1')?>">Download</a></li>
            </ul>
            <div id="div">
                <?php 
                    include($style);
                    ?>
            </div>
    	</div>
    </div>
</div>

<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        var message = "Hanya file XLS (Excel 2003) yang diijinkan.";
        var x = document.getElementById('fileexcelall').value;
        var allowedExtensions = /(\.xls)$/i;
        if (x=='') {
            alert('File tidak boleh kosong.');
            return false;
        }
        if (!allowedExtensions.exec(x)) {
            alert(message);
            x = '';
            return false;
        }
        /*function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }*/
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
        var date_input2=$('input[name="date2"]'); //our date input has the name "date"
        var container2=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input2.datepicker({
            format: 'yyyy-mm-dd',
            container: container2,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>
</html>