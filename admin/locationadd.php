<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/page.php" ?>
<?php
    $pg = new page();
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		
	
    $insertlocation = $pg->insert_location($_POST,$_FILES);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
    <div class="block">    
        
        <?php
            if(isset($insertlocation)){
                echo $insertlocation;
            }
        ?>
         <form action="locationadd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address" placeholder="Enter Address..." class="medium" />
                    </td>
                </tr>   
                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>
                        <input type="text" name="phone" placeholder="Enter Phone..." class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                    </td>
                </tr>         
    
                <tr>
                    <td>
                        <label>Opening Hours</label>
                    </td>
                    <td>
                        <input type="text" name="opening" placeholder="Enter Opening Hours..." class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="Enter Facebook..." class="medium" />
                    </td>
                </tr> 
                <tr>
                    <td>
                        <label>Instagram</label>
                    </td>
                    <td>
                        <input type="text" name="instagram" placeholder="Enter Instagram..." class="medium" />
                    </td>
                </tr>  
                <tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                        <select name="type" >
                            <option value="1">Headquarters</option>
                            <option value="0">Branch</option>
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