<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Employee</title>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $('#employee-table').DataTable( {
		"pageLength" : 5,
        "columnDefs": [ {
          "targets": 'no-sort',
          "orderable": false,
    } ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
				
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );

				if (column[0][0] == 3) {
                        console.log(column);
                        $(column.footer()).html('');
                    }
					if (column[0][0] == 1) {
                        console.log(column);
                        $(column.footer()).html('');
                    }
					if (column[0][0] == 0) {
                        console.log(column);
                        $(column.footer()).html('');
                    }
            } );
        }
    } );
} );
</script>

</head>
<body>

<div id="container">
	<h1 style="text-align:center; color:green;">CodeIgniter Employee List!    </h1>
	<?php if($msg = $this->session->flashdata('msg')): ?>
	<?php echo $msg; ?>
	<?php endif; ?>
	<?php echo anchor('employee','Add Employee',['class'=>'btn btn-primary']); ?>
	<?php echo anchor('department','Add Department',['class'=>'btn btn-primary']); ?>
	<br>
	<table class="table table-striped table-hover" id="employee-table">
	<thead>
		<tr>
		<th>Id</th>
		<th>Employee Name</th>
		<th>Employee Department Name</th>
		<th>Employee Salary</th>
		<th class="no-sort">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php if (is_array ($post)): ?>
	<?php foreach ($post as $dataView): ?>
		<tr>
			<td><?= $dataView-> employee_id ; ?></td>
			<td><?= $dataView-> employee_name ; ?></td>
			<th><?php echo $dataView-> department_name ; ?></th>
			<td><?php echo $dataView-> employee_salary ; ?></td>
			<td>
			<?php echo anchor("deleteEmployeeFromList/{$dataView-> employee_id}",'Delete',['class'=>'btn btn-danger']); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
	<tfoot>
		<tr>
		<th>Id</th>
		<th>Employee Name</th>
		<th>Employee Department Name</th>
		<th>Employee Salary</th>
		</tr>
	</tfoot>
</table>

</div>

</body>
</html>



<style>
.dataTables_wrapper {
    position: relative;
    clear: both;
    zoom: 1;
    margin-top: 54px;
	margin-bottom: 73px;
}
</style>
