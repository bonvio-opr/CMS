
<?//include('function.php');?>

<?

$result = "SELECT * FROM `mandarinko_menu`";					
$query = mysql_query($result);
//for($data=array();$row=mysql_fetch_assoc($result);$data[]=$row) {}


// получение данных в виде ассоциативного массива и формирование нужного нам массива ($data)
while($row = mysqli_fetch_assoc($query))
{
    $data[$row[id]] = $row;
}

function mapTree($dataset) {
 
    $tree = array();
 
    foreach ($dataset as $id=>&$node) {
 
        if (!$node['pid']) {
            $tree[$id] = &$node;
        }
        else {
            $dataset[$node['pid']]['childs'][$id] = &$node;
        }
 
    }
    return $tree;
 
}
// вызываем функцию и передаем ей наш массив
$data = mapTree($data);


function view_cat($dataset) {
 
  foreach ($dataset as $menu) {
 
    echo '<li><a href="?id='.$menu["id"].'">'.$menu["text"].'</a>';
 
    if($menu['childs']) {
        echo '<ul>';
            view_cat($menu['childs']);
        echo '</ul>';
    }
    echo '</li>';
 
 }
 
}

view_cat($data);
?>

