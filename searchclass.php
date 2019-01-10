<?php
class search {
	private $mysqli;
	public function __construct() {
		$this->connect();
	}
	private function connect() {
		$this->mysqli = new mysqli("localhost","root","","db_cent");
	}
	public function search($search_term) {
		$sanitized = $this->mysqli->real_escape_string($search_term);

		$query = $this->mysqli->query("
			(SELECT * from lender_individual where city LIKE '%{$sanitized}%')
			UNION 
			(SELECT * from borrower_individual where city LIKE '%{$sanitized}%')
			UNION 
			(SELECT * from borrower_business where city LIKE '%{$sanitized}%')
			UNION
			(SELECT * from borrower_business where city LIKE '%{$sanitized}%')

			");

		if(! $query->num_rows) {
			return false;
		}

		while( $row= $query->fetch_object() ) {
			$rows[] = $row;
		}

		$search_results = array(
			'count' => $query->num_rows,
			'results' => $rows,
			);

		return $search_results;
	}
}


?>