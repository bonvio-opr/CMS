<?


function get_item_base($returnsql=true) {	
	//настройка структуры таблицы
	//name - имя поля в бд, type - SQL-тип в бд, input - соответсвующее html-поле
	//checkbox, radio, textarea, wysiwyg, text, password, divide, outside
	//id, cid уже описаны
	$item_base = array(		
		array('name' => 'name', 'type' => 'text', 'input' => 'text', 'field' => 'Название'),
		array('name' => 'price', 'type' => 'float', 'input' => 'text', 'field' => 'Цена'),
		array('name' => 'compound', 'type' => 'text', 'input' => 'text', 'field' => 'Состав', 'hide' => 'hide'),
		array('name' => 'country', 'type' => 'text', 'input' => 'text', 'field' => 'Страна производства', 'hide' => 'hide'),		
		array('name' => 'reserve', 'type' => 'text', 'input' => 'checkbox', 'field' => 'В&nbsp;наличии'),
		array('name' => 'size', 'type' => 'text', 'input' => 'divide', 'field' => 'Размер (через запятую)', 'hide' => 'hide'),
		array('name' => 'weight', 'type' => 'int', 'input' => 'text', 'field' => 'Вес (граммы)'),
		array('name' => 'color', 'type' => 'text', 'input' => 'outside', 'field' => 'Цвета', 'hide' => 'hide'),
		/*array('name' => 'links', 'type' => 'text', 'input' => 'outside', 'field' => 'Связанные позиции', 'hide' => 'hide'),*/
		array('name' => 'tablesizes', 'type' => 'text', 'input' => 'wysiwyg', 'field' => 'Таблица размеров', 'hide' => 'hide'),
		array('name' => 'desc', 'type' => 'text', 'input' => 'textarea', 'field' => 'Описание'),
		array('name' => 'top', 'type' => 'text', 'input' => 'checkbox', 'field' => 'Топ-товар'),
		array('name' => 'new', 'type' => 'text', 'input' => 'checkbox', 'field' => 'Новый товар'),
		array('name' => 'admin_comments', 'type' => 'text', 'input' => 'textarea', 'field' => 'Примечание (недоступно на сайте)')		
	);
	
	if($returnsql) {
		$sql = "CREATE TABLE IF NOT EXISTS `mandarinko_catalog_item` (
			`id` INT(11) NOT NULL AUTO_INCREMENT, 
			`cid` INT(11) NOT NULL,
			`url` TEXT NOT NULL, ";	
		foreach($item_base as $el) {
			$sql .= '`'.$el['name'].'` '.$el['type']." NOT NULL, ";
		}
		$sql .= "PRIMARY KEY (`id`)) ENGINE = MyISAM;";
		return $sql;
	} else {
		return $item_base;
	}
}
?>