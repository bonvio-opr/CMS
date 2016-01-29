<?
/**/	
$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = '".mysql_real_escape_string($URL[1])."'";
$r = mysql_query($sql);
if (mysql_num_rows($r)==1) {
	$r = mysql_fetch_assoc($r);
	
	$CONTENT['title'] .= " - ".$r['header'];
	$CONTENT['metak'] = $r['metakey'];
	$CONTENT['metad'] = $r['metadesc'];
	

	?>
	
	


<table id="central_part1">

						<? 	echo stripslashes($r['text']); ?>

<!-- of banner2 
						<tr height="0" style="visibility: hidden; height: 10x;">
							<td colspan="6" height="0px"><div style="visibility: hidden;  height: 0px;" id="banner2">
							</div>
						</td>
						
						</tr>-->

</table>



						<?	
/**/	
				} else {
				
	include('tpl/404.php');
}

?>		
