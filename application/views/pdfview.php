<!DOCTYPE html>
<html>
<head>
<title>Course materials</title>
<style>
table,td,th{border:1px solid red;
padding:15px;border-collapse:collapse;width:50%}
</style>
</head>
<body>
<table>
<?php
if($n->num_rows()>0)
{
foreach ($n->result() as $row)
{
?>
<tr>
<td>
<?php echo $row->subject;?>
</br>
<a href="<?php echo base_url("/files/");
if($row->file)echo $row->file;
else echo"no-report.pdf";?>?>"target="_blank">Study materials</a>
<?php
}
}
?>

</td>
</tr>
</table>
</body>
</html>
