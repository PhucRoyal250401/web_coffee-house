<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/page.php'?>

<?php
    $pg = new page();
    if(!isset($_GET["blog_id"]) || $_GET["blog_id"] == NULL){
       echo "<script> window.location = 'bloglist.php' </script>";
    }
    else{
        $id = $_GET['blog_id'];
    }

	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		// $updateproduct = $pd->update_product($_POST,$_FILES,$id);
        $updateblog = $pg->update_blog($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa blog</h2>
        <div class="block">       
            <?php 
                if(isset($updateblog)){
                    echo $updateblog;
                }
            ?>       
         <?php
            // $get_blog_by_id= $pg->getproductbyid($id);
            $get_blog_by_id= $pg->getblogbyid($id);
            if($get_blog_by_id){
                while($r_blog = $get_blog_by_id->fetch_assoc()){
         ?>   
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="blog_name" value ="<?php echo $r_blog['title'] ?>"class="medium" />
                    </td>
                </tr>
		
							
				
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $r_blog['blog_img'] ?>" width="90"> 
                        <input type="file" name="blog_img" ?>" />
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="blog_desc" class="tinymce"><?php echo $r_blog['blog_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="link" value ="<?php echo $r_blog['link'] ?>" class="medium" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="blog_type">
                            <option>Select Type</option>
                            <?php 
                                if($r_blog['type'] ==0){
                            ?>
                            <option selected value="0">OFF</option>
                            <option value="1">ON</option>
                            <?php 
                                }else{
                            ?>
                            <option value="0">OFF</option>
                            <option selected value="1">ON</option>
                            <?php
                             }
                            ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php 
                }
        } 
        ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


