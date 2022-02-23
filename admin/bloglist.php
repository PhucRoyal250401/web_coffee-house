<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/page.php" ?>
<?php include_once '../helper/format.php'?>
<?php
// $product = new product();
    $pg = new page();
	if(isset($_GET["type_blog"]) && isset($_GET["type"])){
		 $id = $_GET['type_blog'];
		 $type =  $_GET['type'];
		 $update_type= $pg->update_type($id,$type);
	 }
	 if(isset($_GET["blog_del"])){
		$id = $_GET['blog_del'];
		
		// $del_blog= $product->del_slider($id);
        $del_blog= $pg->del_blog($id);
	}	 
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Blog List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Blog Title</th>
					<th>Blog Image</th>
					<th>Description</th>
                    <th>Link</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pg = new page();
					$fm = new Format();	
					// $get_slider=$product->show_slider_list();
                    $get_blog = $pg->show_blog_list();
					if($get_blog){
						$i=0;
						while($result=$get_blog->fetch_assoc()){
							$i++;
						
				?>

				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['title']?></td>
					<td><img src="uploads/<?php echo $result['blog_img'] ?>" height="160px" width="240px"/></td>	
					<td><?php echo $fm->textShorten($result['blog_desc'],30); ?></td>	
                    <td><?php echo $fm->textShorten($result['link'],30)?></td>	
					<td>
						<?php if($result['type']==1){?>
							<a href="?type_blog=<?php echo $result['blog_id']?>&type=0" >OFF</a> 
						<?php
						}else{
						?>
							<a href="?type_blog=<?php echo $result['blog_id'] ?>&type=1" >ON</a> 
						
						<?php
							}
						?>
						
					</td>		
				<td>
                    <a href="blogedit.php?blog_id=<?php echo $result['blog_id'] ?>">Edit</a> || 
					<a href="?blog_del=<?php echo $result['blog_id']  ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
