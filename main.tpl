<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
		<title><?=strip_tags($CONTENT['title']);?></title>
		<meta name="title" content="<?=strip_tags($CONTENT['title']);?>" />
		<meta name="description" content="<?=$CONTENT['metad'];?>" />
		<meta name="keywords"    content="<?=$CONTENT['metak'];?>" />
		<link rel="icon" href="img/favicon.gif" type="image/x-icon">
		<link href="/style.css" rel="stylesheet" type="text/css" />
<!-- -->		
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable="0" name="viewport">
		<script>
			var timerMulti = window.setInterval("scrll();", 20);
			var x=1;
			function scrll(){
				element=document.getElementById('banner');
				element.style.backgroundPosition = x-- + 'px 50%';
				if(x > 1000) x = 1;
				element=document.getElementById('banner2');
			}
			var timu = window.setInterval("scrlli();", 20);
			var y=0;
			var tm=0;
			var phase=0;
			function scrlli(){
				tm=tm+1;
				phase=1;
				if (tm<150) phase=0;
				if (tm>330) phase=0;
				if (tm>480) phase=1;
				if (tm>660) phase=0;
				if (tm>810) phase=1;
				if (tm>990) {
					tm=0;
					y=0;
				}
				if (phase==1) y=y-5;
				element.style.backgroundPosition = y + 'px 0px';
			}		
		</script>

</head>
<body>

			<div style=" position: fixed; top: 0px; width: 100%">
				<div style=" border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; margin: 0 auto; background:url(/img/delimiterbg.jpg) repeat-x; width: 900px; height: 32px;">
					<div id="div_top_menu">
						<div id="mainmenu">

							<?include('function.php');?>	
							
						</div><!-- Конец блока #mainmenu -->					
					</div>
					<div id="phone_top">
						<span><?=$TEXT['phone'];?></span>
					</div>
				</div>
			</div>

<table id="mtd">
	<td id="leftcolumn">&nbsp</td>
	<td id="centralcolumn">
		<table id="maintable">
			<!--///////////////////////////////////-->

			
			<tr>
				<td class="deli miter2" style="height: 30px;">
					
				</td>
			</tr>
			<!--///////////////////////////////////-->
			<tr>
				<td id="headertd">
					<table width="897 px" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<div id="logosection">
									<img src="/img/bonvio_logo.jpg"/>
									<div id="newsinlogo">
										<font color="#4444dd"><?=date("d.m.y");?>: </font>	Мы работаем для Вас:<br>
																							Пн-Пт 9:45 - 18:15
									</div>
								</div>
							</td>
							<td></td>
							<td align="center">
								<div id="temp">
									<div id="banner">
										<img src="/img/10y.png" id="bannerim"/>
									</div>
										Мы продаем не товар, а результат!
								</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<div class="delimiter">
						<div id="header" style="height: 22px;"><!--Направления деятельности <b><i>BONVIO</i></b>--></div>
					</div>
				</td>
			</tr>
			<tr>
				<td>
												
<?=$CONTENT['text'];?>					
									
				</td>
			</tr>
			<tr>
				<td class="delimiter">
					<div id="header">&nbsp</div>
				</td>
			</tr>
		<tr>
	<td>
	<table id="bottom_blocks" valign="top">
		<tr>
			<td width="50%" valign="top" id="bb">
				Среди наших клиентов:<br>
				<img src="/img/partners.jpg" id="partners"/>
			</td>
			<td width="5px">
			</td>
			<td valign="top" id="bb" width="220px">
				<script type="text/javascript" src="https://vk.com/js/api/openapi.js?105">
				</script>  <!-- VK Widget --> 
				<div id="vk_groups"></div> 
				<script type="text/javascript"> VK.Widgets.Group("vk_groups", {mode: 0, width: "440", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 57902807); </script>
			</td>
		</tr>
	</table>
</td>
</tr>
<tr><td id="delim"><?=$TEXT['footer_address'];?> Тел: <?=$TEXT['footer_phone'];?></td></tr>
<tr><td id="copyrights"><?=$TEXT['footer_right'];?> <i>Bonvio, Russian Federation</i> </td></tr>
<tr><td id="delim1"></td></tr>
		</table>
		</td>
		<td id="rightcolumn">&nbsp
		</td>
	</tr>
</table>





</body>
</html>