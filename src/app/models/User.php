<?php
    class User {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Test (database and table needs to exist before this works)
        public function getUsers() {
            $this->db->query("SELECT * FROM users");

            $result = $this->db->resultSet();

            return $result;
        }
        public function getUser($id)
        {
            $this->db->query("SELECT * FROM users WHERE user_id = $id");
            $result = $this->db->single();

            return $result;

        }
        public function addNewUser($userName, $email, $password)
        {
            $this->db->query("INSERT INTO `users`(`user_name`, `email`, `password`, `status`, `role`) VALUES
             ('$userName' , '$email' , '$password' , 'pending' , 'user')");
            $this->db->execute();
            return "Waiting to be approved";
        }
        public function getUsersInfo() {
            $this->db->query("SELECT * FROM users where role = 'user'");

            $result = $this->db->resultSet();

            return $result;
        }
        public function deleteUser($id)
        {
            $this->db->query("DELETE FROM `users` WHERE user_id = $id");
            // $this->db->execute();
        }
        public function updateStatus($status, $id)
        {
            // echo $status."    ".$id ;
            if($status == "pending")
            {
            $this->db->query("UPDATE users SET status='approved' WHERE user_id = $id");
            $this->db->execute();
            }
            else
            {
            $this->db->query("UPDATE users SET status='pending' WHERE user_id = $id");
            $this->db->execute();
            }
        }
        public function verifyUser($id, $pass)
        {
            $this->db->query("SELECT * FROM users WHERE email = '$id' AND password = '$pass'");

            $result = $this->db->resultSet();

            return $result;
        }
        
    }