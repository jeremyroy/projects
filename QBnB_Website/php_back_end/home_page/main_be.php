<?php
if(isset($_SESSION['id']) && isset($_GET['orderBy'])){
	switch ($_GET['orderBy']) {
    case 1:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 2:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 3:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 4:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 5:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 6:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 7:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 8:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 9:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 10:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 11:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    case 12:
		$_SESSION['orderBy'] = $_GET['orderBy'];
        break;
    default:
		$order = "ORDER BY property_name";
	}
} else {
	$order = null;
}
?>

<?php
if(isset($_SESSION['id'])){
	switch ($_SESSION['orderBy']) {
    case 1:
        $order = "ORDER BY property_name";
        break;
    case 2:
        $order = "ORDER BY property_name DESC";
        break;
    case 3:
        $order = "ORDER BY city";
        break;
    case 4:
        $order = "ORDER BY city DESC";
        break;
    case 5:
        $order = "ORDER BY district_name";
        break;
    case 6:
        $order = "ORDER BY district_name DESC";
        break;
    case 7:
        $order = "ORDER BY num_bedroom";
        break;
    case 8:
        $order = "ORDER BY num_bedroom DESC";
        break;
    case 9:
        $order = "ORDER BY num_bathroom";
        break;
    case 10:
        $order = "ORDER BY num_bathroom DESC";
        break;
    case 11:
        $order = "ORDER BY price";
        break;
    case 12:
        $order = "ORDER BY price DESC";
        break;
    default:
		$order = "ORDER BY property_name";
	}
} else {
	$order = null;
}
?>

<?php
	if(isset($_GET['searchBtn'])){
		$_SESSION['constraints'] = null; //reset search constraints
		
		if(!empty($_GET['search_city'])){
			$_SESSION['constraints'] = $_SESSION['constraints'] . "AND city='" . $_GET['search_city'] . "'";
		}
		
		if(!empty($_GET['search_district'])){
			$_SESSION['constraints'] = $_SESSION['constraints'] . "AND district_ID='" . $_GET['search_district'] . "'";
		}	
		
		switch ($_GET['search_bed']){
			case 1:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='1'";
				break;
			case 2:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='2'";
				break;
			case 3:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='3'";
				break;
			case 4:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='4'";
				break;
			case 5:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='5'";
				break;
			case 6:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='6'";
				break;
			case 7:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bedroom='7'";
				break;
		}
		
		switch ($_GET['search_bath']){
			case 1:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='1'";
				break;
			case 2:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='2'";
				break;
			case 3:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='3'";
				break;
			case 4:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='4'";
				break;
			case 5:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='5'";
				break;
			case 6:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='6'";
				break;
			case 7:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND num_bathroom='7'";
				break;
		}
		
		switch ($_GET['search_price']){
			case 1:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price<'75'";
				break;
			case 2:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='75' AND price<'100'";
				break;
			case 3:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='100' AND price<'125'";
				break;
			case 4:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='125' AND price<'150'";
				break;
			case 5:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='150' AND price<'175'";
				break;
			case 6:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='175' AND price<'200'";
				break;
			case 7:
				$_SESSION['constraints'] = $_SESSION['constraints'] . "AND price>='200'";
				break;
		}
	}
?>