<!DOCTYPE html>
<html>
<head>
	<title>View leave request</title>
	<style>
		table,th,td{
			border:1px solid;
			border-collapse: collapse;
		}
	</style>
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>Leave type</th>
				<th>From</th>
				<th>To</th>
				<th>Reason</th>
				<th>File</th>
			</tr>
		</thead>

		<tbody>
			<?php
		if($n->num_rows()>0)
		{
			foreach($n->result() as $row)
					{
		?>
						<tr>
							<td><?php echo $row->leave_type;?></td>
							<td><?php echo $row->from_date;?></td>
							<td><?php echo $row->to_date?></td>
							<td><?php echo $row->reason?></td>
							<td><?php echo $row->file_upload?></td>
							
							</tr>
			<?php
				}
			}
			?>

			
		</tbody>
	</table>

</body>
</html>