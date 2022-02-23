<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>

<?php
    $pd = new product();
    if(!isset($_GET["product_id"]) || $_GET["product_id"] == NULL){
       echo "<script> window.location = 'productlist.php' </script>";
    }
    else{
        $id = $_GET['product_id'];
    }

	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		$updateproduct = $pd->update_product($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">       
            <?php 
                if(isset($updateproduct)){
                    echo $updateproduct;
                }
            ?>       
         <?php
            $get_product_by_id= $pd->getproductbyid($id);
            if($get_product_by_id){
                while($r_product = $get_product_by_id->fetch_assoc()){
         ?>   
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_name" value ="<?php echo $r_product['product_name'] ?>"class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-------Select Category-------</option>
                            <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while($result=$catlist->fetch_assoc()){
                            ?>
                            <option 
                            <?php 
                                if($result['catid'] == $r_product['catid']){
                                    echo 'selected';
                                }
                            ?>
                            value="<?php echo $result['catid'] ?>"><?php echo $result['catname'] ?></option>
                             <?php
                                    }
                                }
                            ?>       
                        </select>
                    </td>
                </tr>
							
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"><?php echo $r_product['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value ="<?php echo $r_product['price'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $r_product['product_img'] ?>" width="90"> 
                        <input type="file" name="product_img" ?>" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="product_type">
                            <option>Select Type</option>
                            <?php 
                                if($r_product['product_type'] ==0){
                            ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php 
                                }else{
                            ?>
                            <option value="0">Featured</option>
                            <option selected value="1">Non-Featured</option>
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


