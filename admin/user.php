<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php' ?>
<?php
	 $cus = new customer();
	if(isset($_GET["delcus_id"])){
		 $id = $_GET['delcus_id'];
		 $delcus = $cus->delete_customer($id);
	 }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">     
				<?php 
                    if(isset($delcus)){
                        echo $delcus;
                    }
                ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th> No.</th>
							<th> Name</th>
                            <th> Address</th>
                            <th> City</th>
                            <th> Phone</th>
                            <th>Email</th>
                            <th>Date_create</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            $fm = new Format();
                            
							$show_cus= $cus->show_cus_all();
							if($show_cus){
								$i=0;
								while($result = $show_cus->fetch_assoc()){
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php  echo $i?> </td>
							<td><?php echo $result['name']?></td>
                            <td><?php echo $result['address']?></td>
                            <td><?php echo $result['city']?></td>
                            <td><?php echo $result['phone']?></td>
                            <td><?php echo $result['email']?></td>
                            <td><?php echo $fm->formatDate($result['date_create']) ?></td>
							<td><a onclick="return confirm('Are you want to delete?')" href="?delcus_id=<?php echo $result['id']?>">Delete</a></td>
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

