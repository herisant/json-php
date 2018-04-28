<h3>Download</h3>

<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
    <!-- Form code begins -->
    <form action="<?= basename('/download.php')?>" method="post">
   	<div class="col-md-6 col-sm-6 col-xs-12">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">First Date</label>
        <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" value="<?= date('Y-m-d')?>" />
      </div>

    </div>
   	<div class="col-md-6 col-sm-6 col-xs-12">
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date2">Last Date</label>
        <input class="form-control" id="date2" name="date2" placeholder="YYYY-MM-DD" type="text" value="<?= date('Y-m-d')?>"/>
      </div>

    </div>
   	<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="form-group"> <!-- Submit button -->
        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
      </div>
      </div>
     </form>
     <!-- Form code ends --> 
  </div>    
 </div>
</div>