<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/page.php'?>

<?php
    $pg = new page();
    if(!isset($_GET["location_id"]) || $_GET["location_id"] == NULL){
       echo "<script> window.location = 'updatepage.php' </script>";
    }
    else{
        $id = $_GET['location_id'];
    }

	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		// $updateproduct = $pd->update_product($_POST,$_FILES,$id);
        $updatepage = $pg->update_page($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa blog</h2>
        <div class="block">       
            <?php 
                if(isset($updatepage)){
                    echo $updatepage;
                }
            ?>       
         <?php
            // $get_blog_by_id= $pg->getproductbyid($id);
            $get_page_by_id= $pg->getpagebyid($id);
            if($get_page_by_id){
                while($r_page = $get_page_by_id->fetch_assoc()){
         ?>   
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" value ="<?php echo $r_page['address'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value ="<?php echo $r_page['phone'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value ="<?php echo $r_page['email'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Opening Hours</label>
                    </td>
                    <td>
                        <input type="text" name="opening" value ="<?php echo $r_page['opening'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" value ="<?php echo $r_page['facebook'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Instagram</label>
                    </td>
                    <td>
                        <input type="text" name="instagram" value ="<?php echo $r_page['instagram'] ?>"class="medium" />
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


