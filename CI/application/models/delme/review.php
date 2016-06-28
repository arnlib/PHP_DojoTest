<?php

    class Review extends CI_Model {
    	public function getLastThreeReviews() {
    		$query = "SELECT reviews.*, books.title, users.alias 
						FROM users 
						JOIN reviews ON users.id = reviews.user_id
						JOIN books ON reviews.book_id = books.id
						ORDER BY reviews.created_at DESC
						LIMIT 3";

			 return $this->db->query($query)->result_array();
    	}
   }


?>
