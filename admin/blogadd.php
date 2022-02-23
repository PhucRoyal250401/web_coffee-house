<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/page.php" ?>
<?php
    // $product = new product();
    $pg = new page();
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		
	// 	$insertslider = $product->insert_slider($_POST,$_FILES);
    $insertblog = $pg->insert_blog($_POST,$_FILES);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block">    
        
        <?php
            if(isset($insertblog)){
                echo $insertblog;
            }
        ?>
         <form action="blogadd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="blogname" placeholder="Enter Blog Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="blog_desc" class="tinymce"></textarea>
                    </td>
                </tr>
                <td>
                        <label>Link</label>
                    </td>
                    <td>
                        <input type="text" name="bloglink" placeholder="Enter link..." class="medium" />
                    </td>
                <tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                        <select name="type" >
                            <option value="1">ON</option>
                            <option value="0">OFF</option>
                        </select>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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