<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>
<?php include_once '../helper/format.php'?>
<?php 
	$fm = new Format();
	$pduct = new product();
	if(isset($_GET["product_id"])){
		 $id = $_GET['product_id'];
		 $del_product = $pduct->delete_product($id);
	 }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
				<?php 
                    if(isset($del_product)){
                        echo $del_product;
                    }
                ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product name</th>
					<th>Price</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$pd = new product();
					
					$pdlist = $pd->show_product();
					if($pdlist){
						$i=0;
						while($result = $pdlist->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_name'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['product_img'] ?>" width="80"></td>
					<td><?php echo $result['catname'] ?></td>
					<td><?php echo $fm->textShorten($result['product_desc'],20); ?></td>
					<td><?php 
						if($result['product_type']==0){
							echo 'Feathered';
						}
						else{
							echo 'Non-Feathered';
						}
					 ?>
					</td>
					<td><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?product_id=<?php echo $result['product_id']?>">Delete</a></td>
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
