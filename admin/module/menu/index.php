<?
//Проверка прав доступа
//Если это супер, то пропускаем сразу
if($_SESSION['status'] != 'superadmin') {
    //Проверим права админа
    $t = explode(',',$_SESSION['rights']);
    foreach($t as $el) $RIGHT[$el] =  "1";
    //Посмотрим а наш id модуля
    $t = file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/about');
    if ($RIGHT[trim($t[0])]!=1) die('NOT ACCESS');
}

//SETUP
$sql = "SELECT * FROM `mandarinko_menu` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
	//catalog base setup
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/27_main_menu.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	
//	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');	 
}

?>

<h1>Управление главным меню</h1>

<?

include($_SERVER['DOCUMENT_ROOT']."/".$URL[1]."/inc/_function.php");

if(is_numeric($_GET['deletep'])) {
	$sql = "SELECT `pid` FROM `mandarinko_menu` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$sql = "DELETE FROM `mandarinko_menu` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL PHOTO');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}



if($_POST['cancel']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['saveitem']) {

	if ($_POST['parent_title'] == 'root') {$pid = '0';} else {
	
		$sql = "SELECT * FROM `mandarinko_menu` WHERE `title`='".mysql_real_escape_string($_POST['parent_title'])."'";
		$r = mysql_fetch_assoc(mysql_query($sql));
		$pid = $r['id'];
	}
	
	$sql = "UPDATE `mandarinko_menu` SET

		`pid`	=	'".mysql_real_escape_string($pid)."',
		`title`	=	'".mysql_real_escape_string($_POST['title'])."',
		`parent_title`	=	'".mysql_real_escape_string($_POST['parent_title'])."',
		`link`	=	'".mysql_real_escape_string($_POST['link'])."',
		`text`	=	'".mysql_real_escape_string($_POST['text'])."'
		WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ITEM');

	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['additem']) {
	
	if ($_POST['parent_title'] == 'root') {$pid = '0';} else {
	
		$sql = "SELECT * FROM `mandarinko_menu` WHERE `title`='".mysql_real_escape_string($_POST['parent_title'])."'";
		$r = mysql_fetch_assoc(mysql_query($sql));
		$pid = $r['id'];
	}

	$sql = "INSERT INTO `mandarinko_menu` SET
		`pid`	=	'".mysql_real_escape_string($pid)."',
		`title`    = '".mysql_real_escape_string($_POST['title'])."',
		`parent_title`    = '".mysql_real_escape_string($_POST['parent_title'])."',
		`link`   = '".mysql_real_escape_string($_POST['link'])."',
		`text`   = '".mysql_real_escape_string($_POST['text'])."'";	
		
		mysql_query($sql) OR die('DB ERROR: CAN\'T INSERT ITEM');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}

?>

<?if($_GET['editp']) {
	$sql = "SELECT * FROM `mandarinko_menu` WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	$r = mysql_fetch_assoc(mysql_query($sql));
	$r_link=$r['title'];	
	$r_link=$r['text'];
	$r_link=$r['parent_title'];	
	$r_link=$r['link'];	
	?>
	<p><b>Редактирование пункта меню</b></p>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="addtable">





			<tr>
				<td>Название пункта меню</td>
				<td></td>
				<td>
					<select class="long" name="text" style="width: 150px;">		
						<option title="Заголовок страницы"><?=$r['text'];?></option>
						<?
						$sql = "SELECT * FROM `mandarinko_static`";
						$r = mysql_query($sql);
						for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
							?>
							<?
							foreach($data as $el) {?>
							<option title="Заголовок страницы"><?=$el['title'];?></option>
						<?}?>	
					</select>
				</td>			
			</tr>
			<tr>
				<td>Название страницы</td>
				<td></td>
				<td>
					<select class="long" name="text" style="width: 150px;">		
						<option title="Заголовок страницы"><?=$r['title'];?></option>
						<?
						$sql = "SELECT * FROM `mandarinko_static`";
						$r = mysql_query($sql);
						for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
							?>
							<?
							foreach($data as $el) {?>
							<option title="Заголовок страницы"><?=$el['title'];?></option>
						<?}?>	
					</select>
				</td>
			</tr>
			<tr>
				<td>Родительский пункт меню</td>
				<td></td>
				<td>
						<select class="long" name="parent_title" style="width: 150px;">
							<option title="корень"><?=$r['parent_title'];?></option>
							<option title="корень">root</option>			
							<?
							$sql = "SELECT * FROM `mandarinko_menu`";
							$r = mysql_query($sql);
							for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
								?>
								<?
								foreach($data as $el) {?>
								<option title="кастомная страница"><?=$el['title'];?></option>
							<?}?>	
						</select>
				</td>
			</tr>			
			<tr>
				<td>Ссылка</td>
				<td></td>
				<td>
					<select class="long" name="link" value="<?=$r['link'];?>" style="width: 150px;">
					<option title="корень"><?=$r['link'];?></option>
					<option title="корень">/</option>
					<option>/<?=$r_link;?></option>				
					<?
					$sql = "SELECT * FROM `mandarinko_static`";
					$r = mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
						?>
						<?
						foreach($data as $el) {?>
							<option title="кастомная страница">/<?=$el['url'];?></option>
							<option title="статическая страница">/page/<?=$el['url'];?></option>
					<?}?>	
					</select>			
				</td>
			</tr>

			
			<td colspan="2" align="left">
				<input type="submit" name="cancel" value="Отменить изменения" style="width: 150px; height: 30px; margin: 20px;">
				<input type="submit" name="saveitem" value="Сохранить изменения" style="width: 150px; height: 30px; margin: 20px;"></td>
		  </tr>
		</table>
	</form>
<?} else {?>


<?

/*main_menu*/

					
$query = mysql_query("SELECT * FROM `mandarinko_menu`");
//for($data=array();$row=mysql_fetch_assoc($result);$data[]=$row) {}

$menu = array();
$menu_index = array();

while($row = mysql_fetch_assoc($query)){
	
//	$menu[$row['pid']] = $row;

  if($row['pid'] == 0) {
    $menu[] = $row;
    $menu[sizeof($menu)-1]['child'] = array();
    $menu_index[$row['id']] = &$menu[sizeof($menu)-1];
  } else {
    $menu_index[$row['pid']]['child'][] = $row;
    $menu_index[$row['id']] = &$menu_index[$row['pid']]['child'][sizeof($menu_index[$row['pid']]['child'])-1];
  }

}

//print_r($menu);



function view_cat ($dataset) {
 
  foreach ($dataset as $menu) {
 
    echo '<li><a href="'.$menu["link"].'">'.$menu["text"].'</a>'?>
	
<!--	
<form action="" method="post" enctype="multipart/form-data">
	<table class="addtable">
	  <tr>
		<td width="150">Родительский заголовок:</td>
		<td >
			<select class="long" name="text" style="width: 100px;">
				<?
				if ($menu["pid"] == '0') {?><option>root</option><?} else {

					$sql = "SELECT * FROM `mandarinko_menu` WHERE `id` = ".mysql_real_escape_string($menu["pid"]);
					$r = mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
						?>
						<?
						foreach($data as $el) {?>
						<option><?=$el['text'];?></option>
					<?}}?>
				
				<?
				$sql = "SELECT * FROM `mandarinko_menu`";
				$r = mysql_query($sql);
				for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
					?>
					<?
					foreach($data as $el) {?>
					<option><?=$el['text'];?></option>
				<?}?>	
			</select>	 <input type="submit" value="Применить"/> 		
		</td>
		<td>
			
		</td>
	</table>
</form>	
-->	
	<?;
 
    if($menu['child']) {
        echo '<ul style=" margin: 10px; ">';
            view_cat($menu['child']);
        echo '</ul>';
    }
    echo '</li>';
 
 }
 
}

?>
<div style="border: solid 1px black;">
<ul style="margin-left: 20px;">
    <?php view_cat($menu);?>
</ul><!-- Конец списка -->
</div>

</br>

<p><b>Добавление пункта меню</b></p>
<form action="" method="post" enctype="multipart/form-data">
	<table class="addtable">
		<tr>	
			<td>Название пункта меню</td>
			<td>
				<select class="long" name="text" style="width: 150px;">		
					<?
					$sql = "SELECT * FROM `mandarinko_static`";
					$r = mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
						?>
						<?
						foreach($data as $el) {?>
						<option title="Заголовок страницы"><?=$el['title'];?></option>
					<?}?>	
				</select>
			</td>
		</tr>
		<tr>	
			<td>Название страницы</td>
			<td>
				<select class="long" name="title" style="width: 150px;">		
					<?
					$sql = "SELECT * FROM `mandarinko_static`";
					$r = mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
						?>
						<?
						foreach($data as $el) {?>
						<option title="Заголовок страницы"><?=$el['url'];?></option>
					<?}?>	
				</select>
			</td>
		</tr>
		<tr>
			<td>Название родительской страницы</td>
			<td>
					<select class="long" name="parent_title" value="<?=$r['link'];?>" style="width: 150px;">
						<option title="корень">root</option>			
						<?
						$sql = "SELECT * FROM `mandarinko_menu`";
						$r = mysql_query($sql);
						for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
							?>
							<?
							foreach($data as $el) {?>
							<option title="кастомная страница"><?=$el['title'];?></option>
						<?}?>	
					</select>
			</td>
		</tr>
		<tr>
			<td>Ссылка на страницу</td>
			<td>
					<select class="long" name="link" value="<?=$r['link'];?>" style="width: 150px;">
						<option title="корень">/</option>			
						<?
						$sql = "SELECT * FROM `mandarinko_static`";
						$r = mysql_query($sql);
						for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
							?>
							<?
							foreach($data as $el) {?>
							<option title="кастомная страница">/<?=$el['url'];?></option>
							<option title="статическая страница">/page/<?=$el['url'];?></option>
						<?}?>	
					</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" name="additem" value="Добавить" style="width: 150px; height: 30px; margin: 20px;"></td>
		</tr>
	</table>
</form>
<?}?>


<?$sql = "SELECT * FROM `mandarinko_menu`";
$r = mysql_query($sql);
for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
?>
<br>
<table class="table">
  <tr>
	<th>Название пункта меню</th>
	<th>Название страницы</th>
	<th>Название родительской страницы</th>
	<th>Ссылка на страницу</th>
    <th></th>
  </tr>
<?
foreach($data as $el) {?>
  <tr>
	<td><?=$el['text'];?></td>
	<td><?=$el['title'];?></td>
	<td><?=$el['parent_title'];?></td>
    <td><?=$el['link'];?></td>
	<td width="36">
		<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&editp=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"/></a>
	  	<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&deletep=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"/></a>
    </td>
  </tr>
<?}?>
</table>
