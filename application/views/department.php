<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CodeIgniterCrud</title>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
</head>
<body>
<form method="post" action="insertDepartment" class="form-horizontal">
  <fieldset>
    <legend style="text-align:center;">Create Department</legend>
	<div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Department Name</label>
      <div class="col-md-4">
        <input type="text" name="department_name" class="form-control"  placeholder="Department">
	  </div>
	</div>
    <div class="form-group">
      <div class="col-md-4 col-md-offset-2">
				<button type="submit" class="btn btn-primary">Submit</button>
				<?php echo anchor('employee/index','Back To Employee List',['class'=>'btn btn-primary']); ?>
      </div>
    </div>
  </fieldset>
</form>

