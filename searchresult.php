<?php

if(isset($_GET['scity'])) {
	require_once( dirname(__FILE__) . '/searchclass.php');
	
	$search = new search();

	$search_term = $_GET['scity'];

	$search_results = $search->search($search_term);

	if($search_results) :
		echo $search_results['count']." Result found <br>";
	foreach ($search_results['results'] as $search_result) :
		echo $search_result->city.$search_result->email."<br>";
	endforeach;
	// print_r($search_results);
	endif;

	
}


?>