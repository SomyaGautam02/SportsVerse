<?php
	$sport = $_POST['sport'];
    $team1_id = $_POST['team1_id'];
    $team2_id = $_POST['team2_id'];
	$match = $_POST['match_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
	$rst = $_POST['rst'];
	$category = $_POST['category'];

    $conn = new mysqli('localhost','root','','2022');

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into fixture(sport_name, match_id, team1_name, team2_name, category, dates, times, result) 
        values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $sport, $match, $team1_id, $team2_id, $category,$date,$time,$rst);
		$execval = $stmt->execute();
		header("location:college.php");
	}
?>