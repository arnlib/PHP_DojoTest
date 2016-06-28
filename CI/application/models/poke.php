<?php

    class Poke extends CI_Model {
    	public function getNumPokers($id) {
    		$query = "SELECT count(distinct user_id) pokes FROM pokes WHERE friend_id=$id";

    		return $this->db->query($query)->row_array();
    	}

    	public function getPokers($id) {
    		$query = "SELECT poker.id, COUNT(pokes.friend_id) pokes, poker.alias FROM users
                        JOIN pokes ON users.id = pokes.friend_id
                        JOIN users AS poker ON poker.id = pokes.user_id
                        where users.id=$id
                        group by user_id
                        order by pokes DESC";

    		return $this->db->query($query)->result_array();
    	}

    	public function getAllPokes($id) {
    		$query = "SELECT users.id, users.name, users.alias, users.email, count(friend_id) pokeHistory
                        FROM users
                        LEFT JOIN pokes ON users.id = pokes.friend_id
                        WHERE users.id <> $id
                        GROUP BY users.id
                        order by pokeHistory DESC";

    		return $this->db->query($query)->result_array();
    	}

    	public function newPoke($id, $pokeThisId) {
    		$query = "INSERT INTO pokes (user_id, friend_id)
    					VALUES ($id, $pokeThisId)";
    		$this->db->query($query);
    	}

    }