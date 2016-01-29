		<style>
        
            /* Demo styles */
            .content{color:#777; font:12px/1.4 "helvetica neue", arial, sans-serif; width:800px; margin:1px auto; padding-top: 16px}
            h1{font-size:12px;font-weight:normal;color:#ddd;margin:0;}
            p{margin:0 0 20px}
            a {color:#22BCB9;text-decoration:none;}
            .cred{margin-top:20px;font-size:11px;}
            
            /* This rule is read by presentation to define the presentation height: */
            #presentation{height:420px;}
            
        </style>
        <!-- load jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        
        <!-- load presentation -->
        <script src="/js/presentation/presentation-1.2.3.min.js"></script>
		<script src="/js/presentation/themes/classic/presentation.classic.js"></script>
		
				<div id="foto">
					<div id="foto_title"><span>Фотоархив </span></div>
					<div id="foto_article">					
						<div id="foto_content">
							
							
							
<?if(is_numeric($URL[2]))
	{
	$sql = "SELECT * FROM `mandarinko_presentation` WHERE `id`='".mysql_real_escape_string($URL[2])."'";
	$g = mysql_fetch_assoc(mysql_query($sql));
	$CONTENT['title'] = "Альбом : ".$g['name'];
	
	$sql = "SELECT * FROM `mandarinko_presentation_item` WHERE `pid`='".$g['id']."'";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);?>
		
		<div class="content">
		<!--		<h1>< ?=$CONTENT['title'];?></h1>-->
			<div id="presentation">
				<?foreach($data as $el)
				{?>		
					<a rel="presentation" class="fancy" href="/upload/presentation/<?=$el['pid'];?>_<?=$el['id'];?>.jpg">
						<img title="<?=$el['title'];?>" style="wight: 114px; height: 114px;" src="/upload/presentation/tmb/<?=$el['pid'];?>_<?=$el['id'];?>.jpg" alt=""/>
					</a>				
				<?}?>
			</div>
		</div>
		
    <script>

    // Load the classic theme
    presentation.loadTheme('presentation.classic.js');
    
    // Initialize presentation
    $('#presentation').presentation();

    </script><?
	}?>



						</div>
					</div>
				</div>