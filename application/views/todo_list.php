<?php 
/**
 * @author [Hasan Hüseyin CİHANGİR]
 * @email [hashusfb@gmail.com]
 * @create date 2018-09-21 14:11:12
 * @modify date 2018-09-21 14:11:12
 * @desc [todo_list.php]
*/
?>
<!DOCTYPE html>
<html lang="tr">
	<head>
		<title>Todo List</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Todo List Application">
		<meta name="keywords" content="todo list,todo,php,bootstrap,jquery,codeigniter">
		<meta name="author" content="Hasan Hüseyin CİHANGİR">
		<?php $this->load->view("dependencies/styles");?>
	</head>
	<body>
		<div class="container">
		<h3 class="text-center">Todo List</h3>
		<div class="row">
			<div class="col-md-12">
					<div class="row">
						<form action="<?php echo base_url("todo/insert");?>" method="post">
							<div class="col-md-7">
								<label for="todo_title">Explanation</label>
								<div class="form-group">
									<input type="text" class="form-control" id="todo_title" name="todo_title" autofocus>
								</div>
							</div>
							<div class="col-md-2">
								<label for="startDate">Start Date</label>
								<div class="form-group">
									<input class="form-control" type="text" id="startDate" name="startDate" />
								</div>
							</div>
							<div class="col-md-2">
								<label for="finishDate">Finish Date</label>
								<div class="form-group">
									<input class="form-control" type="text" id="finishDate" name="finishDate" />
								</div>
							</div>
							<div class="col-md-1">
								<label for="finishDate">Actions</label>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">ADD</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped">
					<thead>
						<th class="text-center">Explanation</th>
						<th class="text-center">Start</th>
						<th class="text-center">Status</th>
						<th class="text-center">Finish</th>
						<th class="text-center">Remaining Time</th>   						              
						<th class="text-center">Actions</th>   
					</thead>
					<tbody>
					<?php
						foreach ($todos as $todo)
						{?>
						<tr>
							<td class="text-left">
								<?php echo $todo->explanation;?>
							</td>
							<td class="text-center" style="width:100px">
								<?php echo $todo->startDate?>
							</td>
							<td class="text-center" style="width:100px">
								<input type="checkbox" class="js-switch"
									data-url="<?php echo base_url("todo/iscompletedsetter/".$todo->id);?>"
									<?php echo ($todo->isCompleted) ? "checked": "";?>/>
							</td>
							<td class="text-center" style="width:100px">
								<?php echo $todo->finishDate?>
							</td>
							<td class="text-center" style="width:100px">
							<?php echo $todo->remainingTime?>
							</td>
							<td class="text-center" style="width:100px">
								<a href="<?php echo base_url("todo/delete/$todo->id")?>" class="btn btn-danger">DELETE</a>
							</td>
						</tr>
					<?php 
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php 
		$this->load->view("dependencies/scripts.php");
	?>
	<script>
	$(function() {
		$('input[name="startDate"]').daterangepicker({
			timePicker: true,
			showDropdowns: true,
			singleDatePicker: true,
			timePicker24Hour: true,
			timePickerSeconds: true,
			startDate: moment().startOf('min'),
			locale: {
				format: 'YYYY-MM-DD hh:mm:ss'
			}
		});
	});
	$(function() {
		$('input[name="finishDate"]').daterangepicker({
			timePicker: true,
			showDropdowns: true,
			singleDatePicker: true,
			timePickerSeconds: true,
			timePicker24Hour: true,
			startDate: moment().startOf('min').add(1, 'day'),
			locale: {
				format: 'YYYY-MM-DD hh:mm:ss'
			}
		});
	});
	</script>
	</body>
</html>
