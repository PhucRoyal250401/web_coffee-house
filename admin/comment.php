<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php' ?>
<?php include '../classes/product.php' ?>
<?php
	 $cus = new customer();
     $product = new product();
	if(isset($_GET["delcomment_id"])){
		 $id = $_GET['delcomment_id'];
		 $delcomment = $cus->delete_comment($id);
	 }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Comment List</h2>
                <div class="block">     
				<?php 
                    if(isset($delcomment)){
                        echo $delcomment;
                    }
                ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th> No.</th>
							<th> Name</th>
                            <th> Comment</th>
                            <th>Product_id</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            $fm = new Format();
                            
							$show_comment= $cus->show_comment();
							if($show_comment){
								$i=0;
								while($result = $show_comment->fetch_assoc()){
									$i++;
						?>
						<tr class="odd gradeX">
							<td><?php  echo $i?> </td>
							<td><?php echo $result['name']?></td>
                            <td><?php echo $result['comment']?></td>
                            <td><?php echo $result['product_id']?></td>
							<td><a onclick="return confirm('Are you want to delete?')" href="?delcomment_id=<?php echo $result['comment_id']?>">Delete</a></td>
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

