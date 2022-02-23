<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helper/format.php");

?>
<?php
    class page
    {   
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_blog($data,$files){
            $blogname = mysqli_real_escape_string($this->db->link, $data['blogname']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            $blog_desc = mysqli_real_escape_string($this->db->link, $data['blog_desc']);
            $bloglink = mysqli_real_escape_string($this->db->link, $data['bloglink']);
            
            
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

            if($blogname =="" ||$type ==""|| $file_name=="" || $blog_desc=="" ||$bloglink==""){
                $alert = '<span style="color:red;font-size:18px;"> Fields must be not empty </span>';
                return $alert;
            }
            else{
                if(!empty($file_name)){
                    //chọn ảnh
                    if($file_size > 2048000){
                        $alert = "<span style='color:red;font-size:18px;'> Image size should be less then 1MB! </span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext, $permited)===false){
                        $alert = "<span style='color:red;font-size:18px;'> you can upload only:-".implode('.',$permited)."</span>";
                        return $alert;
                    }
                   
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_blog(title,type,blog_img,blog_desc,link) VALUES('$blogname','$type','$unique_image','$blog_desc','$bloglink') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ="<span style='color:green;font-size:18px;'> blog added successfully </span>";
                        return $alert;
                    }
                    else{
                        $alert ="<span style='color:red;font-size:18px;'> blog added not successfully </span>";
                        return $alert;
                 }
                }
            
                
        }
        }

        public function update_type($id,$type){
            $type = mysqli_real_escape_string($this->db->link, $type);
            
            $query = "UPDATE tbl_blog SET type = '$type'   WHERE blog_id='$id'";
            $result = $this->db->update($query);
            return $result;
        }

        public function show_blog_list(){
            $query = "SELECT *  FROM tbl_blog  ORDER BY blog_id desc";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }
        
        public function show_location_list(){
            $query = "SELECT *  FROM tbl_location  ORDER BY location_id desc";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function show_page(){
            $query = "SELECT *  FROM tbl_location WHERE type=1";
            //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }


        public function del_blog($id){
            $query = "DELETE  FROM tbl_blog WHERE blog_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span style='color:green;font-size:18px;'> Delete blog successfully </span>";
                return $alert;
             }
             else{
                $alert ="<span style='color:red;font-size:18px;'> Delete blog not successfully </span>";
                return $alert;
             } 
        }

        public function getblogbyid($id){
            $query = "SELECT * FROM tbl_blog WHERE blog_id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getpagebyid($id){
            $query = "SELECT * FROM tbl_location WHERE location_id='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        
        public function getfacebook(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['facebook'];
        }

        public function getinstagram(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['instagram'];
        }

        public function getphone(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['phone'];
        }

        public function getopening(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['opening'];
        }

        public function getaddress(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['address'];
        }

        public function getemail(){
            $query = "SELECT * FROM tbl_location WHERE type=1 ";
            $result = $this->db->select($query);
            $get_facebook = $result->fetch_assoc();
            return $get_facebook['email'];
        }

        



        public function update_blog($data,$files,$id){
            $blog_name = mysqli_real_escape_string($this->db->link, $data['blog_name']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $link = mysqli_real_escape_string($this->db->link, $data['link']);
            $blog_desc = mysqli_real_escape_string($this->db->link, $data['blog_desc']);
            $blog_type = mysqli_real_escape_string($this->db->link, $data['blog_type']);
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['blog_img']['name'];
            $file_size = $_FILES['blog_img']['size'];
            $file_temp = $_FILES['blog_img']['tmp_name'];

            $div = explode('.',$file_name);//phan tach "123.jpg" bang dau .
            $file_ext = strtolower(end($div));
            //$file_current = strtolower(current($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image ="uploads/".$unique_image;

            if($blog_name =="" ||$link ==""||$blog_desc ==""||$blog_type ==""){
                $alert = "<span style='color:red;font-size:18px;'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                if(!empty($file_name)){
                    //chọn ảnh
                    if($file_size > 2048000){
                        $alert = "<span style='color:red;font-size:18px;'> Image size should be less then 1MB! </span>";
                        return $alert;
                    }
                    elseif(in_array($file_ext, $permited)===false){
                        $alert = " you can upload only:-".implode('.',$permited)."</span>";
                        return $alert;
                    }
                    $query = "UPDATE tbl_blog SET

                    title ='$blog_name',
                    link ='$link',
                    blog_desc ='$blog_desc',
                    type ='$blog_type',
                    blog_img ='$unique_image'  

                    WHERE blog_id='$id'";
                }else{
                    // không chọn ảnh
                    $query = "UPDATE tbl_blog SET

                    title ='$blog_name',
                    link ='$link',
                    blog_desc ='$blog_desc',
                    type ='$blog_type'
        
                    WHERE blog_id='$id'";
                }
            
                $result = $this->db->update($query);
                if($result){
                    $alert ="<span style='color:green;font-size:18px;'> update blog successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span style='color:red;font-size:18px;'> update blog NOT successfully </span>";
                    return $alert;
                 }
        }
    }

    public function update_page($data,$files,$id){
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $opening = mysqli_real_escape_string($this->db->link, $data['opening']);
        $facebook = mysqli_real_escape_string($this->db->link, $data['facebook']);
        $instagram = mysqli_real_escape_string($this->db->link, $data['instagram']);
        
        //kiem tra hinh anh va lay hinh anh cho vao folder upload
       

        if($address =="" ||$phone ==""||$email ==""||$opening ==""||$facebook ==""||$instagram ==""){
            $alert = "<span style='color:red;font-size:18px;'> Fields must be not empty </span>";
            return $alert;
        }
        else{
            
                // không chọn ảnh
                $query = "UPDATE tbl_location SET

                phone ='$phone',
                email ='$email',
                address ='$address',
                opening ='$opening',
                facebook ='$facebook',
                instagram ='$instagram'
    
                WHERE location_id='$id'";
        
            $result = $this->db->update($query);
            if($result){
                $alert ="<span style='color:green;font-size:18px;'> update page successfully </span>";
                return $alert;
             }
             else{
                $alert ="<span style='color:red;font-size:18px;'> update page NOT successfully </span>";
                return $alert;
             }
    }
}

        public function show_blog(){
            $query = "SELECT *  FROM tbl_blog WHERE type='1' ORDER BY blog_id desc  ";
        //select ...from..as..as..where..and..orderby..
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_location($data,$files){
            $address = mysqli_real_escape_string($this->db->link, $data['address']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $opening = mysqli_real_escape_string($this->db->link, $data['opening']);
            $facebook = mysqli_real_escape_string($this->db->link, $data['facebook']);
            $instagram = mysqli_real_escape_string($this->db->link, $data['instagram']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            

            if($address =="" ||$phone =="" || $opening=="" ||$type==""){
                $alert = '<span style="color:red;font-size:18px;">Some fields must be not empty </span>';
                return $alert;
            }
            else{                     
                    
                    $query = "INSERT INTO tbl_location(address,phone,email,opening,facebook,instagram,type) VALUES('$address','$phone','$email','$opening','$facebook','$instagram','$type') ";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert ="<span style='color:green;font-size:18px;'> Location added successfully </span>";
                        return $alert;
                    }
                    else{
                        $alert ="<span style='color:red;font-size:18px;'> Location added not successfully </span>";
                        return $alert;
                 }
                }
            
                
        }

        public function update_location($data,$files,$id){
            $address = mysqli_real_escape_string($this->db->link, $data['address']);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $opening = mysqli_real_escape_string($this->db->link, $data['opening']);
            $location_type = mysqli_real_escape_string($this->db->link, $data['location_type']);
            
            //kiem tra hinh anh va lay hinh anh cho vao folder upload
            

            if($address =="" ||$phone ==""||$email ==""||$opening ==""||$location_type ==""){
                $alert = "<span style='color:red;font-size:18px;'> Fields must be not empty </span>";
                return $alert;
            }
            else{
                
                    $query = "UPDATE tbl_location SET
                    address ='$address',
                    phone ='$phone',
                    email ='$email',
                    opening ='$opening',
                    type ='$location_type'
                    
                    WHERE location_id='$id'";
        
            
                $result = $this->db->update($query);
                if($result){
                    $alert ="<span style='color:green;font-size:18px;'> update location successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span style='color:red;font-size:18px;'> update location not successfully </span>";
                    return $alert;
                 }
        }
    }
         public function getlocationbyid($id){
            $query = "SELECT * FROM tbl_location WHERE location_id='$id'";
            $result = $this->db->select($query);
            return $result;
         }

         public function delete_location($id){
            $query = "DELETE  FROM tbl_location WHERE location_id='$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert ="<span style='color:green;font-size:18px;'> Delete location successfully </span>";
                return $alert;
             }
             else{
                $alert ="<span style='color:red;font-size:18px;'> Delete location not successfully </span>";
                return $alert;
             }  
        }

        public function getlocation(){
            $query = "SELECT * FROM tbl_location ORDER BY location_id desc ";
            $result = $this->db->select($query);
            return $result;
        }

    }        
?>