<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/page.php" ?>
<?php include_once '../helper/format.php'?>

<?php 
        
$pg = new page();
if(isset($_GET["location_id"])){
     $id = $_GET['location_id'];
     $del_location = $pg->delete_location($id);
 }
?>
		 
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Blog List</h2>
        <div class="block">  
        <?php 
                if(isset($del_location)){
                    echo $del_location  ;
                }
            ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
                    <th>Opening Hours</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pg = new page();
					
					// $get_slider=$product->show_slider_list();
                    $get_location = $pg->show_location_list();
					if($get_location){
						$i=0;
						while($result=$get_location->fetch_assoc()){
							$i++;
						
				?>

				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['address']?></td>
					<td><?php echo $result['phone']?></td>
                    <td><?php echo $result['email']?></td>
                    <td><?php echo $result['opening']?></td>	
					
					<td>
						<?php if($result['type']==1){
							echo "Headquarters";
						
						}else{
						
							echo "Branch";
						
							}
						?>
						
					</td>		
				<td>
                    <a href="locationedit.php?location_id=<?php echo $result['location_id'] ?>">Edit</a> || 
					<a href="?location_id=<?php echo $result['location_id']?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
				</td>
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
