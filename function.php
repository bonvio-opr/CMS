
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
 
    echo '<li><a href="'.$menu["link"].'">'.$menu["text"].'</a>';
 
    if($menu['child']) {
        echo '<ul>';
            view_cat($menu['child']);
        echo '</ul>';
    }
    echo '</li>';
 
 }
 
}


?>


<ul>
    <?php view_cat($menu);?>
</ul><!-- Конец списка -->


