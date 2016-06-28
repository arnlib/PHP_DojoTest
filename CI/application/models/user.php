<?php

    class User extends CI_Model {
        function findUser($emailAddress, $password) {
            $query = "SELECT * FROM users WHERE email=? AND password=?";

            return $this->db->query($query, [$emailAddress, md5($password)])->row_array();
        }

        function registerUser($name, $alias, $email, $password, $dob) {
            $md5 = md5($password);
            $query = "INSERT INTO users (name, alias, email, password, dob, created_at, updated_at) VALUES (?,?,?,?,?,NOW(),NOW())";
            $value = [$name, $alias, $email, $md5, $dob];

            $this->db->query($query, $value);
            return $this->db->insert_id();
        } 

        public function getUser($id) {
            $query = "SELECT * FROM users WHERE id=$id";
             return $this->db->query($query)->row_array();
        }


    }


    //(name, alias, email, password)