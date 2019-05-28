<?php
switch ($_POST["type"]) {
	case 'TryRegisterUser':
		include ('connect.php'); 
		$sql = "SELECT nickname FROM users WHERE nickname = '" . $_POST["data1"] . "'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // the nickname exist
		    echo "1";
		} else {
			//the nickname don't exist
			$sql = "INSERT INTO users (nickname,name,password, date) VALUES ('" . $_POST["data1"] . "', '" . $_POST["data3"] . "', '" . $_POST["data2"] . "', now())";
			if ($conn->query($sql) === TRUE) {
			    echo "0";
			} else {
			    echo "-1";
			}
		}
		include ('disconnect.php');		
		break;
	case 'TryRegisterMovie':
		include ('connect.php'); 
		
		$sql = "INSERT INTO movies (title, synopsis, year, date) VALUES ('" . $_POST["data1"] . "', '" . $_POST["data2"] . "', '" . $_POST["data3"] . "', now())";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'TryUpdateUser':
		include ('connect.php');		
		$sql = "UPDATE users SET name = '" . $_POST["data2"] . "', nickname = '" . $_POST["data1"] . "' WHERE id = '" . $_POST["data3"] . "'";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'tryUpdateUserPassword':
		include ('connect.php');		
		$sql = "UPDATE users SET password = '" . $_POST["data2"] . "' WHERE id = '" . $_POST["data1"] . "'";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'TryUpdateMovie':
		include ('connect.php');		
		$sql = "UPDATE movies SET title = '" . $_POST["data1"] . "', synopsis = '" . $_POST["data2"] . "', year = '" . $_POST["data3"] . "' WHERE id = '" . $_POST["data4"] . "'";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'TryDeleteUser':
		include ('connect.php');		
		$sql = "DELETE FROM users WHERE id = '" . $_POST["data1"] . "'";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'TryDeleteMovie':
		include ('connect.php');		
		$sql = "DELETE FROM movies WHERE id = '" . $_POST["data1"] . "'";
		if ($conn->query($sql) === TRUE) {
		    echo "0";
		} else {
		    echo "-1";
		}
		
		include ('disconnect.php');		
		break;
	case 'TryLogin':
		include ('connect.php'); 
		$sql = "SELECT id, nickname, name FROM users WHERE nickname = '" . $_POST["data1"] . "' AND password = '" . $_POST["data2"] . "'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    $rows= array();
			while($sonuc = $result->fetch_assoc()){
				    $rows[]=$sonuc;
				}

				try{
			     echo json_encode($rows);
			} 
			catch(Error $e) {
			    $trace = $e->getTrace();
			    echo $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
			}
			
		} else {			
		    echo "0";			
		}
		include ('disconnect.php');		
		break;
	
	default:
		# code...
		break;
}