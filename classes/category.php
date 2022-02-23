<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/../lib/database.php");
    include_once ($filepath."/../helper/format.php");
?>
<?php
    class category
    {   
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catname){
            $catname = $this->fm->validation($catname);
            
            $catname = mysqli_real_escape_string($this->db->link, $catname);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            

            if(empty($catname)){
                $alert = "<span class = 'errorcat'> category must be not empty </span>";
                return $alert;
            }
            else{
                $query = "INSERT INTO tbl_category(catname) VALUES('$catname') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert ="<span class = 'successcat'> insert category successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span class = 'errorcat'> insert category not successfully </span>";
                    return $alert;
                 }
                
            }
        }

        public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY catid desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatbyid($id){
            $query = "SELECT * FROM tbl_category WHERE catid='$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catname,$id){
            $catname = $this->fm->validation($catname,);
            $catname = mysqli_real_escape_string($this->db->link, $catname);//i cos  2 bien:1 bien du lieu, 1 bien ket noi
            $id = mysqli_real_escape_string($this->db->link, $id);

            if(empty($catname)){
                $alert = "<span class = 'errorcat'> category must be not empty </span>";
                return $alert;
            }
            else{
                $query = "UPDATE tbl_category SET catname ='$catname' WHERE catid='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert ="<span class = 'successcat'> update category successfully </span>";
                    return $alert;
                 }
                 else{
                    $alert ="<span class = 'errorcat'> update category not successfully </span>";
                    return $alert;
                 }  
            }
        }

        public function delete_category($id){
            $query = "DELETE  FROM tbl_category WHERE catid='$id'";
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
        //end backend
        public function show_category_frontend(){
            $query = "SELECT * FROM tbl_category ORDER BY catid desc";
            $result = $this->db->select($query);
            return $result;
        }
    
    }             
?>