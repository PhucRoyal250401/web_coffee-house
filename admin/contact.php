<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php' ?>
<?php
	 $cus = new customer();
	if(isset($_GET["delcontact_id"])){
		 $id = $_GET['delcontact_id'];
		 $delcontact = $cus->delete_contact($id);
	 }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">     
				<?php 
                    if(isset($delcontact)){
                        echo $delcontact;
                    }
                ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th> No.</th>
							<th> Name</th>
                            <th> Phone</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Desc</th>
                            <th>Date_contact</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            $fm = new Format();
                            
							$show_contact= $cus->show_contact();
							if($show_contact){
								$i=0;
								while($result = $show_contact->fetch_assoc()){
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php  echo $i?> </td>
							<td><?php echo $result['contact_name']?></td>
                            <td><?php echo $result['phone']?></td>
                            <td><?php echo $result['email']?></td>
                            <td><?php echo $result['website']?></td>
                            <td><?php echo $result['contact_desc']?></td>
                            
                            <td><?php echo $fm->formatDate($result['date_contact']) ?></td>
        
							<td><a onclick="return confirm('Are you want to delete?')" href="?delcontact_id=<?php echo $result['contact_id']?>">Delete</a></td>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

