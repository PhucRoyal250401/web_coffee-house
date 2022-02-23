<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/page.php" ?>
<?php include_once '../helper/format.php'?>
<?php
// $product = new product();
    // $pg = new page();
	
		
	// 	// $del_blog= $product->del_slider($id);
    //     $del_blog= $pg->del_blog($id);
		 
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Blog List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
                    <th>Opening Hours</th>
					<th>Facebook</th>
                    <th>Instagram</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pg = new page();
					
					// $get_slider=$product->show_slider_list();
                    $get_location = $pg->show_page();
					if($get_location){
						$i=0;
						while($result=$get_location->fetch_assoc()){
							$i++;
						
				?>

				<tr class="odd gradeX">
					
					<td><?php echo $result['address']?></td>
					<td><?php echo $result['phone']?></td>
                    <td><?php echo $result['email']?></td>
                    <td><?php echo $result['opening']?></td>
                    <td><?php echo $result['facebook']?></td>
                    <td><?php echo $result['instagram']?></td>

					
							
				<td>
                    <a href="pageedit.php?location_id=<?php echo $result['location_id'] ?>">Edit</a> </td>
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
