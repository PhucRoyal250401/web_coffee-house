<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/page.php'?>

<?php
    $pg = new page();
    if(!isset($_GET["location_id"]) || $_GET["location_id"] == NULL){
       echo "<script> window.location = 'locationlist.php' </script>";
    }
    else{
        $id = $_GET['location_id'];
    }

	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		$updatelocation = $pg->update_location($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa location</h2>
        <div class="block">       
            <?php 
                if(isset($updatelocation)){
                    echo $updatelocation;
                }
            ?>       
         <?php
            $get_location_by_id= $pg->getlocationbyid($id);
            if($get_location_by_id){
                while($r_location = $get_location_by_id->fetch_assoc()){
         ?>   
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" value ="<?php echo $r_location['address'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" value ="<?php echo $r_location['phone'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" value ="<?php echo $r_location['email'] ?>"class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Opening Hours</label>
                    </td>
                    <td>
                        <input type="text" name="opening" value ="<?php echo $r_location['opening'] ?>"class="medium" />
                    </td>
                </tr>
                

				
							
				 
				
				<tr>
                    <td>
                        <label> Type</label>
                    </td>
                    <td>
                        <select id="select" name="location_type">
                            <option>Select Type</option>
                            <?php 
                                if($r_location['type'] ==0){
                            ?>
                            <option selected value="0">Branch</option>
                            <option value="1">Headquarters</option>
                            <?php 
                                }else{
                            ?>
                            <option value="0">Branch</option>
                            <option selected value="1">Headquarters</option>
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


