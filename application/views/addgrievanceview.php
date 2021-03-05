
<!-----grievance view form
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
			  <th>To</th>
			  <th>subject</th>
			  <th>Message</th>
			  
			   
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
			  					<td><?php echo $row->griev_to;?></td>
			  					<td><?php echo $row->subject;?></td>
			  					<td><?php echo $row->message;?></td>
			  					
			  				<?php
			  			}
                        		   
			  		}
			  		?>
		
		    </tbody>


				
		   </table>
	</body>	
</html>
			  					
			  	
		