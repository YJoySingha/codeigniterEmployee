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
<form method="post" action="insertEmployee" class="form-horizontal">
  <fieldset>
		<legend style="text-align:center;">Create Employee Info</legend>
		<div class="form-group">
			<label class="col-md-2 control-label" for="example-select">Department For</label>
			<div class="col-md-4">
					<select id="example-select" name="employee_department_id" class="form-control" size="1">
							<option value="0">Please select</option>
							<?php if( count($departmentId) ){ 
									foreach($departmentId as $result){
							?>
							<option value="<?= $result->department_id; ?>"><?= $result->department_name; ?></option>
							<?php }} ?>
					</select>
			</div>
	</div>
	<div class="form-group">
		<label for="inputEmail" class="col-md-2 control-label">Employee Name:</label>
		<div class="col-md-4">
			<input type="text" name="employee_name" class="form-control" placeholder="Employee Name">
		</div>
	</div>

	<div class="form-group">
		<label for="inputEmail" class="col-md-2 control-label">Employee Salary:</label>
		<div class="col-md-4">
			<input type="text" name="employee_salary" class="form-control" placeholder="Employee Salary">
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

