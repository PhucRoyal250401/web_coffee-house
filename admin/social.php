<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
    $social = new page();
   

    if($_SERVER['REQUEST_METHOD'] =='POST'){
		$facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $printerest = $_POST['printerest'];
        $googleplus = $_POST['googleplus'];
		$update_social = $social->update_social($catname,$twitter,$printerest,$googleplus);
	}
	
	
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Social Media</h2>
        <div class="block">               
         <form>
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                        <label>Instagram</label>
                    </td>
                    <td>
                        <input type="text" name="instagram" placeholder="Instagram link.." class="medium" />
                    </td>
                </tr>
				
				
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>