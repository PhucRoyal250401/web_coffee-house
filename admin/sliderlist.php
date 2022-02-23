<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/product.php" ?>
<?php include_once '../helper/format.php'?>
<?php
$product = new product();
	if(isset($_GET["type_slider"]) && isset($_GET["type"])){
		 $id = $_GET['type_slider'];
		 $type =  $_GET['type'];
		 $update_type= $product->update_type($id,$type);
	 }
	 if(isset($_GET["slider_del"])){
		$id = $_GET['slider_del'];
		
		$update_type= $product->del_slider($id);
	}	 
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$product = new product();
					$fm = new Format();	
					$get_slider=$product->show_slider_list();
					if($get_slider){
						$i=0;
						while($result=$get_slider->fetch_assoc()){
							$i++;
						
				?>

				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['slider_name']?></td>
					<td><img src="uploads/<?php echo $result['slider_img'] ?>" height="160px" width="240px"/></td>	
					<td><?php echo $fm->textShorten($result['slider_desc'],20); ?></td>		
					<td>
						<?php if($result['type']==1){?>
							<a href="?type_slider=<?php echo $result['slider_id']?>&type=0" >OFF</a> 
						<?php
						}else{
						?>
							<a href="?type_slider=<?php echo $result['slider_id'] ?>&type=1" >ON</a> 
						
						<?php
							}
						?>
						
					</td>		
				<td>
					<!-- <a href="">Edit</a> ||  -->
					<a href="?slider_del=<?php echo $result['slider_id']  ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
