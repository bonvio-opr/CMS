<?
if($_GET['delete']) {
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL ADMIN'.$sql);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


?>