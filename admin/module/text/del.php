<?
if($_GET['delete'] AND $_SESSION['status'] == 'superadmin') {
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL TEXT'.$sql);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
} else {
	exit;

}


?>