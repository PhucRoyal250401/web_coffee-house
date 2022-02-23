<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helper/format.php");

?>
<?php
    class product
    {   
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data, $files){
           
            
            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['product_img']['name'];
            $file_size = $_FILES['product_img']['size'];
            $file_temp = $_FILES['product_img']['tmp_name'];

            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image ="uploads/".$unique_image;

            if($product_name =="" ||$category ==""||$product_desc ==""||$price ==""||$product_type ==""||$product_name =="" || $file_name==""){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(product_name,catid,product_desc,product_type,price,product_img) VALUES('$product_name','$category','$product_desc','$product_type','$price','$unique_image') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class = 'successcat'> insert product successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span class = 'errorcat'> insert product not successfully </span>";
                    return $alert;
                 }
                
            }
        }

        public function show_product(){
            $query = "SELECT tbl_product.* , tbl_category.catname FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.catid ORDER BY tbl_product.product_id  desc";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function getproductbyid($id){
            $query = "SELECT * FROM tbl_product WHERE product_id='$id'";
            $result = $this->db->select($query);
            return $result;
        }
    

        public function getproductall(){
            $query = "SELECT * FROM tbl_product";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id){
            $product_name = mysqli_real_escape_string($this->db->link, $data['product_name']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $product_type = mysqli_real_escape_string($this->db->link, $data['product_type']);
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['product_img']['name'];
            $file_size = $_FILES['product_img']['size'];
            $file_temp = $_FILES['product_img']['tmp_name'];

            $div = explode('.',$file_name);//phan tach "123.jpg" bang dau .
            $file_ext = strtolower(end($div));
            //$file_current = strtolower(current($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image ="uploads/".$unique_image;

            if($product_name =="" ||$category ==""||$product_desc ==""||$price ==""||$product_type ==""){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                if(!empty($file_name)){
                    //chọn ảnh
                    if($file_size > 204800){
                        $alert = "<span class = 'errorcat'> Image size should be less then 1MB! </span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext, $permited)===false){
                        $alert = "<span class = 'errorcat'> you can upload only:-".implode('.',$permited)."</span>";
                        return $alert;
                    }
                    $query = "UPDATE tbl_product SET

                    product_name ='$product_name',
                    catid ='$category',
                    product_desc ='$product_desc',
                    product_type ='$product_type',
                    price ='$price',
                    product_img ='$unique_image'  

                    WHERE product_id='$id'";
                }else{
                    // không chọn ảnh
                    $query = "UPDATE tbl_product SET

                    product_name ='$product_name',
                    catid ='$category',
                    product_desc ='$product_desc',
                    product_type ='$product_type',
                    price ='$price'
                    
                    WHERE product_id='$id'";
                }
            
                $result = $this->db->update($query);
                if($result){
                    $alert ="<span class = 'successcat'> update product successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span class = 'errorcat'> update product not successfully </span>";
                    return $alert;
                 }
        }
    }

        public function delete_product($id){
            $query = "DELETE  FROM tbl_product WHERE product_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span class = 'successcat'> Delete category successfully </span>";
                return $alert;
             }
             else{
                $alert ="<span class = 'errorcat'> Delete category not successfully </span>";
                return $alert;
             }  
        }

        ///end backend

        public function get_product($cat_id){
            $query = "SELECT * FROM tbl_product WHERE catid = '$cat_id'";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;

        }



        public function get_product_new(){
            $query = "SELECT * FROM tbl_product ORDER BY product_id desc LIMIT 5"; //asc
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = "SELECT tbl_product.* , tbl_category.catname FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.catid WHERE tbl_product.product_id='$id'";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_wishlist($productid,$customer_id){
            $productid = mysqli_real_escape_string($this->db->link, $productid);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

            $check_wishlist ="SELECT * FROM tbl_wishlist WHERE product_id='$productid' AND customer_id ='$customer_id'";
            $result_check_wishlist = $this->db->select($check_wishlist);

            if($result_check_wishlist){
                $msg = '<span style="color:red;font-size:18px;"> Product Already Added to Wishlist  </span>';
                return $msg;
            }else{
                $query ="SELECT * FROM tbl_product WHERE product_id ='$productid'";
                $result = $this->db->select($query)->fetch_assoc();
                
                $product_name = $result['product_name'];
                $price = $result['price'];
                $image = $result['product_img'];

                $query_insert = "INSERT INTO tbl_wishlist(customer_id,product_id,product_name,price,image) VALUES('$customer_id','$productid','$product_name','$price','$image')";
                $insert_wishlist = $this->db->insert($query_insert);
                if($insert_wishlist){
                    $msg = '<span style="color:green;font-size:18px;"> Added wishlist successfully  </span>';
                    return $msg;
                }
                else{
                    $msg = '<span style="color:red;font-size:18px;"> Added wishlist NOT successfully   </span>';
                    return $msg;
                }
            }
        }

        public function get_wishlist($customer_id){
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id ='$customer_id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        
        public function del_wishlist($proid,$customer_id){
            $query = "DELETE  FROM tbl_wishlist WHERE product_id='$proid' AND customer_id='$customer_id'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function insert_slider($data,$files){
            $slidername = mysqli_real_escape_string($this->db->link, $data['slidername']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $slider_desc = mysqli_real_escape_string($this->db->link, $data['slider_desc']);
            
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.',$file_name);//phan tach "123.jpg" bang dau .
            $file_ext = strtolower(end($div));
            //$file_current = strtolower(current($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image ="uploads/".$unique_image;

            if($slidername =="" ||$type ==""|| $file_name=="" || $slider_desc==""){
                $alert = "<span class = 'errorcat'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                if(!empty($file_name)){
                    //chọn ảnh
                    if($file_size > 2048000){
                        $alert = "<span class = 'errorcat'> Image size should be less then 1MB! </span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext, $permited)===false){
                        $alert = "<span class = 'errorcat'> you can upload only:-".implode('.',$permited)."</span>";
                        return $alert;
                    }
                   
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_slider(slider_name,type,slider_img,slider_desc) VALUES('$slidername','$type','$unique_image','$slider_desc') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ="<span class = 'successcat'> slider added successfully </span>";
                        return $alert;
                    }
                    else{
                        $alert ="<span class = 'errorcat'> slider added not successfully </span>";
                        return $alert;
                 }
                }
            
                
        }
        }

        public function show_slider(){
            $query = "SELECT *  FROM tbl_slider WHERE type='1' ORDER BY slider_id desc";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function show_slider_list(){
            $query = "SELECT *  FROM tbl_slider  ORDER BY slider_id desc";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function update_type($id,$type){
            $type = mysqli_real_escape_string($this->db->link, $type);
            
            $query = "UPDATE tbl_slider SET type = '$type'   WHERE slider_id='$id'";
            $result = $this->db->update($query);
            return $result;
        }

        public function del_slider($id){
            $query = "DELETE  FROM tbl_slider WHERE slider_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span class = 'successcat'> Delete slider successfully </span>";
                return $alert;
             }
             else{
                $alert ="<span class = 'errorcat'> Delete slider not successfully </span>";
                return $alert;
             } 
        }
    }             
?>