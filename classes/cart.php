<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helper/format.php");

?>
<?php
    class cart
    {   
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            
            $id = mysqli_real_escape_string($this->db->link, $id);
            $s_id = session_id();

            $query = "SELECT * FROM tbl_product WHERE product_id='$id'";
            $result = $this->db->select($query)->fetch_assoc();
            // echo '<pre>';
            // echo print_r($result);
            // echo '<pre>';
            $image_c = $result['product_img'];
            $product_name_c = $result['product_name'];
            $product_price_c=$result['price'];
            
            $query_cart = "SELECT * FROM tbl_cart WHERE product_id='$id' AND s_id='$s_id'";
            $check_cart =  $this->db->select($query_cart);
            if($check_cart){
                $msg = "product already added";
                return $msg;
            }else{
                $query_insert = "INSERT INTO tbl_cart(product_id,s_id,product_name,price,quantity,c_image) VALUES('$id','$s_id','$product_name_c','$product_price_c','$quantity','$image_c') ";
                $insert_cart= $this->db->insert($query_insert);
                if($insert_cart){
                     header('Location:cart.php');
                }
                else{
                    header('Location:404.php');
                }
            }    
        }

        public function get_product_cart(){
            $s_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE s_id='$s_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($quantity,$cartid){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);

            $query = "UPDATE tbl_cart SET quantity ='$quantity' WHERE cart_id='$cartid'";
            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
            }
            else{
                $msg = '<span style="color:green;font-size:18px;"> Product Quantity Updated NOT Successfully  </span>';
                return $msg;
            }
            
        }

        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cart_id='$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }
            else{
                $msg = '<span style="color:green;font-size:18px;"> Product Quantity Delete NOT Successfully  </span>';
                return $msg;
            }
        }

        public function check_cart(){
            $s_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE s_id='$s_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_order($customer_id){
            $s_id = session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_all_data_cart(){
            $s_id = session_id();
            $query = "DELETE FROM tbl_cart WHERE s_id='$s_id'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function insertOrder($customer_id){
            $s_id = session_id();
            $query = "SELECT * FROM tbl_cart WHERE s_id='$s_id'";
            $get_product= $this->db->select($query);
            if($get_product){
                while($result=$get_product->fetch_assoc()){
                    $product_id = $result['product_id'];
                    $product_name = $result['product_name'];
                    $quantity= $result['quantity'];
                    $price = $result['price']*$quantity;
                    $image = $result['c_image'];
                    $cumtomer_id = $customer_id;
                    $query_order = "INSERT INTO tbl_order(product_id,product_name,customer_id,price,quantity,image) VALUES('$product_id','$product_name','$customer_id','$price','$quantity','$image') ";
                    $insert_order= $this->db->insert($query_order);
                }
            }
        }

        public function get_amount_price($customer_id){
            
            $query = "SELECT price FROM tbl_order WHERE customer_id='$customer_id' ";
            $get_price= $this->db->select($query);
            return $get_price;

        }

        public function get_cart_ordered($customer_id){
            $query = "SELECT * FROM tbl_order WHERE customer_id='$customer_id' ";
            $get_cart_ordered= $this->db->select($query);
            return $get_cart_ordered;
        }

        public function get_inbox_cart(){
            $query = "SELECT * FROM tbl_order ORDER BY date_order";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function shifted( $id, $time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = '1' WHERE id = '$id' AND date_order='$time' AND price='$price' ";
            $result = $this->db->update($query);
            if($result){
                $msg = '<span style="color:green;font-size:18px;"> Update Order Successfully  </span>';
                return $msg;
            }
            else{
                $msg = '<span style="color:red;font-size:18px;"> Update Order NOT Successfully  </span>';
                return $msg;
            }
        }
        
        public function del_shifted( $id, $time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order  WHERE id = '$id' AND date_order='$time' AND price='$price' ";
            $result = $this->db->delete($query);
            if($result){
                $msg = '<span style="color:green;font-size:18px;"> Delete Order Successfully  </span>';
                return $msg;
            }
            else{
                $msg = '<span style="color:red;font-size:18px;"> Delete Order NOT Successfully  </span>';
                return $msg;
            }

        }

        public function shifted_confirm( $id, $time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = '2' WHERE customer_id = '$id' AND date_order='$time' AND price='$price' ";
            $result = $this->db->update($query);
            return $result;
        }

    }              
?>