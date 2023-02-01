<!-- 
    Filename: Resident.php
    Description: A Model (template) for Resident objects
 -->

<?php
    class Admin {
        public $username;
        public $password;

        function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }

        function getUserName() {
            return $this->username; 
        }

        function getPassword() {
            return $this->password;
        }
    }

?>