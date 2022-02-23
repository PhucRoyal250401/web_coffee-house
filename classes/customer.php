<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helper/format.php");

?>
<?php
    class customer
    {   
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);


            if($name =="" ||$city ==""||$email ==""||$address ==""||$phone ==""||$password =="" ){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert = "<span class = 'errorcat'> Email Already Existed </span>";
                    return $alert;
                }
                else{
                    $query = "INSERT INTO tbl_customer(name,city,email,address,phone,password) VALUES('$name','$city','$email','$address','$phone','$password') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ="<span class = 'successcat'> Customer Created successfully </span>";
                        return $alert;
                     }
                     else{
                        $alert ="<span class = 'errorcat'>  Customer Created  not successfully </span>";
                        return $alert;
                     }
                }
            }   
        }

        public function login_customer($data){
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link,$data['password']);


            if($email ==""||$password =="" ){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                $check_login = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' LIMIT 1";
                $result_check = $this->db->select($check_login);
                if($result_check){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('Location:index.php');
                }
                else{
                    $alert = "<span class = 'errorcat'> Email or Password doesn't match </span>";
                    return $alert;
                }
            } 
        }

        public function show_customer($id){
            $query = "SELECT * FROM tbl_customer WHERE id = '$id'";
            $result_check = $this->db->select($query);
            return $result_check;
        }

        public function get_passwordold($id){
            $query = "SELECT * FROM tbl_customer WHERE id = '$id'";
            $result_check = $this->db->select($query);
            $result=$result_check->fetch_assoc();
            return $result['password'];
        }

        public function show_cus_all(){
            $query = "SELECT * FROM tbl_customer";
            $result_check = $this->db->select($query);
            return $result_check;
        }
        public function show_contact(){
            $query = "SELECT * FROM tbl_contact";
            $result_check = $this->db->select($query);
            return $result_check;
        }
        public function show_comment(){
            $query = "SELECT * FROM tbl_comment";
            $result_check = $this->db->select($query);
            return $result_check;
        }

        public function update_customer($data,$id){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            

            if($name =="" ||$city ==""||$email ==""||$address ==""||$phone =="" ){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else
            {
                
                $query = "UPDATE  tbl_customer SET name='$name',city='$city',email='$email',address='$address',phone='$phone' WHERE id ='$id' ";
                $result = $this->db->update($query);
                if($result){
                    $alert ="<span class = 'successcat'> Customer Updated successfully </span>";
                    return $alert;
                }
                else{
                    $alert ="<span class = 'errorcat'>  Customer Updated  not successfully </span>";
                    return $alert;
                }
            }   
        }

        public function insert_comment(){
            $tenbinhluan = $_POST['tennguoibinhluan'];
            $binhluan = $_POST['binhluan'];
            $product_id = $_POST['product_id_binhluan'];
            if($tenbinhluan==''|| $binhluan==''){
                $msg = '<span style="color:red;font-size:18px;"> Fields must be not empty </span>';
                return $msg;
            }
            else{
                $query = "INSERT INTO tbl_comment(name,comment,product_id) VALUES(' $tenbinhluan','$binhluan','$product_id') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ='<span style="color:green;font-size:18px;"> Comment successfully </span>';;
                        return $alert;
                     }
                     else{
                        $alert ='<span style="color:red;font-size:18px;"> Comment NOT successfully </span>';;
                        return $alert;
                     }
            }
        }


        public function delete_customer($id){
            $query = "DELETE  FROM tbl_customer WHERE id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ='<span style="color:green;font-size:18px;"> Delete customer successfully </span>';
                return $alert;
             }
             else{
                $alert ='<span style="color:red;font-size:18px;"> Delete customer not successfully </span>';
                return $alert;
             }  
        }
        public function delete_contact($id){
            $query = "DELETE  FROM tbl_contact WHERE contact_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ='<span style="color:green;font-size:18px;"> Delete contact successfully </span>';
                return $alert;
             }
             else{
                $alert ='<span style="color:red;font-size:18px;"> Delete contact not successfully </span>';
                return $alert;
             }  
        }
        public function delete_comment($id){
            $query = "DELETE  FROM tbl_comment WHERE comment_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ='<span style="color:green;font-size:18px;"> Delete comment successfully </span>';
                return $alert;
             }
             else{
                $alert ='<span style="color:red;font-size:18px;"> Delete comment not successfully </span>';
                return $alert;
             }  
        }

        public function insert_contact(){
            $tennguoicontact = $_POST['tennguoicontact'];
            $phonecontact = $_POST['phonecontact'];
            $emailcontact = $_POST['emailcontact'];
            $websitecontact = $_POST['websitecontact'];
            $contact_desc = $_POST['contact_desc'];
            if($tennguoicontact==''|| $phonecontact==''|| $emailcontact==''|| $contact_desc==''){
                $msg = '<span style="color:red;font-size:18px;"> Fields must be not empty </span>';
                return $msg;
            }
            else{
                $query = "INSERT INTO tbl_contact(contact_name,email,phone,website,contact_desc) VALUES('$tennguoicontact',' $phonecontact',' $emailcontact','$websitecontact','$contact_desc') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ='<span style="color:green;font-size:18px;"> Comment successfully </span>';;
                        return $alert;
                     }
                     else{
                        $alert ='<span style="color:red;font-size:18px;"> Comment NOT successfully </span>';;
                        return $alert;
                     }
            }
        }

        public function update_password($data,$id,$temp){
            $old =mysqli_real_escape_string($this->db->link, $data['oldpassword']);
            $new = mysqli_real_escape_string($this->db->link, $data['newpassword']);
            $newagain = mysqli_real_escape_string($this->db->link, $data['newpasswordagain']);
            
            

            if($old =="" ||$new ==""||$newagain ==""){
                $alert = '<span style="color:red;font-size:18px;"> Fields must be not empty </span>';
                return $alert;
            }
            else if($old != $temp){
                $alert = '<span style="color:red;font-size:18px;"> Old password is NOT match </span>';
                return $alert;
            }
            else if($new != $newagain){
                $alert = '<span style="color:red;font-size:18px;"> New password is NOT match </span>';
                return $alert;
            }
            else
            {
                
                $query = "UPDATE  tbl_customer SET password='$new' WHERE id ='$id' ";
                $result = $this->db->update($query);
                if($result){
                    $alert ='<span style="color:green;font-size:18px;"> Password Updated successfully </span>';
                    return $alert;
                }
                else{
                    $alert ='<span style="color:red;font-size:18px;">  Password Updated  not successfully </span>';
                    return $alert;
                }
            }   
        }



    }              
?>