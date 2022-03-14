<?php
    class Blog {
         private $db;

        public function __construct() {
             $this->db = new Database;
        }

        // Test (database and table needs to exist before this works)
        public function getBlogs() {
            $this->db->query("SELECT * FROM blogs");

            $result = $this->db->resultSet();

            return $result;
        }
        public function oneProduct($id)
        {
            $this->db->query("SELECT * FROM blogs WHERE id ='$id'");
            $result = $this->db->single();
            return $result ;
        }
        public function updateProduct($id, $img, $temp_name, $oldimg, $text, $title)
        {   
            if($img != "")
            {
            move_uploaded_file($temp_name, "../public/images/$img")   ;
            unlink("../public/images/$oldimg");
            $this->db->query("UPDATE `blogs` SET `img`='$img',`title`='$title',`text`='$text' WHERE id = '$id'");
            $this->db->execute();
            }
            else 
            {
                $this->db->query("UPDATE `blogs` SET `title`='$title',`text`='$text' WHERE id = '$id'");
                $this->db->execute();   
            }
            
        }
        public function deleteBlog($id)
        {  
            $this->db->query("DELETE FROM blogs WHERE id =$id");
             $this->db->execute();
        
        }
        public function newBlog($id, $img, $c_image_temp, $text, $title)
        {
            move_uploaded_file($c_image_temp, "../public/images/$img");
            //  die($id." ".$title);
            $this->db->query("INSERT INTO `blogs`( `user_id`, `img`, `title`, `text`) 
            VALUES ($id, '$img', '$title', '$text')");
             $this->db->execute(); 
        }
        public function userBlogs($id)
        {
            
            $this->db->query("SELECT * FROM blogs WHERE user_id =$id");
            $result = $this->db->resultSet();
            return $result;
        }
    }