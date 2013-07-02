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
   
    <script>
        $(function() {
            $( "#accordion" ).accordion({
                heightStyle: "content",
                collapsible: true,
                active: false
            });

            $( "#accordion2" ).accordion({
                heightStyle: "content",
                collapsible: true,
                active: false
            });
        });
    </script>
    
</head>
    
<body>
    <?= $data['vw_Login']  ?>
    
    <div class="center">
        <div class="containerCt">
            <div class="container">
                <?php
                    foreach ($data['Joomla'] as $dados) {
                        echo utf8_encode($dados['introtext']);
                    }
                ?>
            </div>
        </div>
    </div>
    
    <?php include 'views/footer.php'; ?> 
    
</body>
</html>
