<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Talentu - ajuda</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <script src="jquery183.js"></script>
	
	<link rel="stylesheet" type="text/css" href="js/jqchart/css/jquery.jqChart.css" />
    <link rel="stylesheet" type="text/css" href="js/jqchart/css/jquery.jqRangeSlider.css" />
	
    <link rel="stylesheet" href="js/jquery-ui/css/custom-theme/jquery-ui-1.10.1.custom.min.css" />
	<script src="js/jquery-ui/js/jquery-ui-1.10.1.custom.min.js"></script>
	
    <script src="js/jqchart/js/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="js/jqchart/js/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
    <!--[if IE]><script lang="javascript" type="text/javascript" src="../js/excanvas.js"></script><![endif]-->
	
	<script lang="javascript" type="text/javascript">
		$(document).ready(function () {
	
			var background = {
				type: 'linearGradient',
				x0: 0,
				y0: 0,
				x1: 0,
				y1: 1,
				colorStops: [{ offset: 0, color: '#eee' },
							 { offset: 1, color: 'white'}]
			};
	
			$('#jqChart').jqChart({
				title: { text: 'Jean Reis' },
				border: { strokeStyle: '#f0702e', lineWidth: 2 },
				background: background,
				shadows: {
					enabled: true
				},
				axes: [
						{
							type: 'categoryAngle',
							categories: [
								'Auto-Motivação',
								'Controle',
								'Equilíbrio Emocional',
								'Reflexão',
								'Independência',
								'Liderança',
								'Comunicação e Gestão',
								'Cooperação']
						}
					  ],
				series: [
							{
								title: 'Jean Reis',
								type: 'radarLine',
								data: [
									1,
									2,
									2.5,
									0,
									2,
									3,
									2.5,
									1.5
								]
							}
						]
			});
		});
	</script>
   

	
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
				<div id="jqChart" style="width: 920px; height: 500px; margin: 40px; border-width: 2px;">
					<div class="block" style="position: absolute; bottom: 4px; right:11px; width: 121px; height: 20px; background: #fff; z-index: 2"></div>
        		</div>	
                
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?>
    
</body>
</html>
