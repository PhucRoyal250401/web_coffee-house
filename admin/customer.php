<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classes/category.php" ?>
<?php
	
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../classes/customer.php");
	include_once ($filepath."/../helper/format.php");
?>

<?php
    $cus = new customer();
    if(!isset($_GET["customerid"]) || $_GET["customerid"] == NULL){
       echo "<script> window.location = 'inbox.php' </script>";
    }
    else{
        $id = $_GET['customerid'];
    }

    
	
	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View customer information</h2>
                <?php
                    $get_cus= $cus->show_customer($id);
                    if($get_cus){
                        while($result = $get_cus->fetch_assoc()){
                ?>
               <div class="block copyblock"> 
               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>    
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['name'] ?>" name="catname"  class="medium" />
                            </td>
                        </tr>
                        <tr>    
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['phone'] ?>" name="catname"  class="medium" />
                            </td>
                        </tr>
                        <tr>    
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['address'] ?>" name="catname"  class="medium" />
                            </td>
                        </tr>
                        <tr>    
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['city'] ?>" name="catname"  class="medium" />
                            </td>
                        </tr>
                        <tr>    
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['email'] ?>" name="catname"  class="medium" />
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
<?php include 'inc/footer.php';?>