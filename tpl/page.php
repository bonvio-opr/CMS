<?
if ($URL[2]!='') {	
	$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = '".mysql_real_escape_string($URL[2])."'";
	$r = mysql_query($sql);
	if (mysql_num_rows($r)==1) {
		$r = mysql_fetch_assoc($r);// http://example.org/page/name		
		$CONTENT['title'] .= " - ".$r['header'];		
		$CONTENT['metak'] = $r['metakey'];
		$CONTENT['metad'] = $r['metadesc'];?>
					<table id="central_part">
						<tr>
					<?					
					$sql = "SELECT * FROM `mandarinko_menu`";					
					$r_main_menu= mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r_main_menu);$data[]=$row)						
					?>
							<td valign="top">
								<?foreach($data as $el){
									if ($el['parent_title']=="main"){?>
								<div class="sidemenu"><a href="<?=$el['link'];?>"><?=$el['text'];?></a></div>
								<?};};?>
							</td>
							<td>							
									<!--page-slyder /*border: solid 1px red;*/-->
							<?
							$presentation = $URL[2];
							$sql = "SELECT * FROM `mandarinko_presentation` WHERE `url`='".mysql_real_escape_string($URL[2])."'";
							$g = mysql_fetch_assoc(mysql_query($sql));
							$CONTENT['title'] = $g['name'];	
							$SPAN_WIDTH = $g['width']-20;
							$sql = "SELECT * FROM `mandarinko_presentation_item` WHERE `pid`='".$g['id']."'";
							$r_presentation = mysql_query($sql);
							for($data=array();$row=mysql_fetch_assoc($r_presentation);$data[]=$row) 
								?>									
								<link href="/sliders/tpl_1/style.css" rel="stylesheet" type="text/css">
								<style>
									#slide span {
										width: <?=$SPAN_WIDTH;?>px;
									}
								</style>
								<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
								<script type='text/javascript' src='/sliders/tpl_1/script.js'></script>
								<script type="text/javascript">

								$(function() {				
										$('#slideshow').cycle({ 
											fx: '<?=$g['method'];?>',
											speed: <?=$g['time_pause'];?>,
											timeout: <?=$g['time_active'];?>
										});
									});	
								</script>
								<div id="slideshow" style="position: relative;  float: left; overflow: hidden;">
										<?foreach($data as $el)
										{?>
											<div id="slide">
											
												<img title="<?=$el['title'];?>" src="/upload/presentation/tmb/<?=$el['pid'];?>_<?=$el['id'];?>.jpg" width="<?=$g['width'];?>" height="<?=$g['height'];?>" class="first" alt="<?=$el['title'];?>"/>
												<span><h3><?=$el['title'];?></h3><p><?=$el['text'];?> <a href="<?=$el['link'];?>" title="Coolness" class="readmore" TARGET="_blank"><?=$el['link'];?></a></p></span>
											
											</div>	
										<?};?>									
								</div>								
									<!--page-slyder /*border: solid 1px red;*/-->		
							</td>
						</tr>
						<tr>
							<td colspan="6">
								<div>
								
									<? 	echo stripslashes($r['text']); ?>
									
								</div>
							</td>
							
						</tr>
						<!-- of banner2 -->
						<tr height="0" style="visibility: hidden; height: 10x;">
							<td colspan="6" height="0px"><div style="visibility: hidden;  height: 0px;" id="banner2">
							</div>
						</td>
						
						</tr>
						
					</table>
		
		
		
		
		
		<?
		
	
	} else {
		include('tpl/404.php');
	}
} else {
	include('tpl/404.php');
}

?>
