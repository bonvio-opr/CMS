<?
/**/
$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = 'main'";
$r = mysql_query($sql);
if (mysql_num_rows($r)==1) {
	$r = mysql_fetch_assoc($r);
	
	$CONTENT['title'] .= " - ".$r['header'];
	$CONTENT['metak'] = $r['metakey'];
	$CONTENT['metad'] = $r['metadesc'];
	
	
	?>
					<?					

					$sql = "SELECT * FROM `mandarinko_menu`";					
					$r_main_menu= mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r_main_menu);$data[]=$row)						
					?>	
	
	
					<table id="central_part">
						<tr>
							<td valign="top">
								<?foreach($data as $el){
									if ($el['parent_title']=="main")
									{?>
								<div class="sidemenu"><a href="<?=$el['link'];?>"><?=$el['text'];?></a></div>
								<?};};?>
							</td>
							<td>
								<img src="img/renner.jpg" class="menuimage"/>
							</td>
							<td width="5px">
							</td>
							<td>
								<img src="img/konig.jpg" class="menuimage"/>
							</td>
							<td width="5px">
							</td>
							<td>
								<img src="img/festool.jpg" class="menuimage"/>
							</td>
						</tr>
						<tr>
							<td colspan="6" height="137px"><div id="banner2">&nbsp</div>
							</td>
						</tr>	
					</table>	
						
						
						<?	
/**/	
				} else {
				
	include('tpl/404.php');
}

?>					