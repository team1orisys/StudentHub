<!-----trainer view form
	   @asha
	   @5/03/2021
	   @module admin
	   ---->
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style> 
	table,th,tr,td{
			
            border:2px solid black;
            border-collapse:collapse;
            padding: 10px;
            margin:50px;
          
            }
	</style>
	</head>
<body>	
<table>
			<thead>
			  <tr>	
			  <th>Trainer Name</th>
			  <th>Address</th>
			  <th>Phoneno</th>
			  <th>Email</th>
			  <th>Gender</th>
			  <th>Dob</th>
			  <th>Qualification</th>
			  <th>Certifications</th>
			  <th>Skills</th>
			   
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
			  					<td><?php echo $row->name;?></td>
			  					<td><?php echo $row->address;?></td>
			  					<td><?php echo $row->phoneno;?></td>
			  					<td><?php echo $row->email;?></td>
			  					<td><?php echo $row->gender;?></td>
			  					<td><?php echo $row->dob;?></td>
			  					<td><?php echo $row->qualification;?></td>
			  					<td><?php echo $row->certifications;?></td>
			  					<td><?php echo $row->skills;?></td>
			  				<?php
			  			}
                        		   
			  		}
			  		?>
		
		    </tbody>


				
		   </table>
	</body>	
</html>
			  					
			  	
		