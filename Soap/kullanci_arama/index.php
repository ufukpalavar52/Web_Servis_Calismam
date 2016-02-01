<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <title>Form</title>
    <style>
        form {
            margin: auto;
        }
        button {
            background-color: blue;
            width: 60px;
            height: 30px;
        }
        table{
            margin: auto;
            
        }
    </style>
</head>
<body>
<center>
    <h2>Form Bilgileri</h2>
    <form method="post" action="">
        <table>
            <tr>
                <td><input type="text" name="ad"  placeholder="Aranacak Ad" required/></td>
                
            </tr>
            
            <tr>
                <td><button type="submit">Göster</button></td>
            </tr>
        </table>
    </form>
</center>
<br>
<?php if($_POST) { ?>
<table border="1">
    <?php
    
    
        $istek = new SoapClient(null,array("uri"=>"http//ufukpalavar-service",'location'=>'http://localhost/PhpWebservice/ServicePhp.php'));
        
        $userList = $istek->parametreGoster(trim($_POST["ad"]));
        
        if (!empty($userList)) {
    ?>
    <tr>
        <th>Adı</th>
        <th>Soyadı</th>
        <th>Eposta</th>
    </tr>
    <?php  foreach ($userList as $list) { ?>
    <tr>
        <th><?= $list["ad"] ?></th>
        <th><?= $list["soyad"] ?></th>
        <th><?= $list["email"] ?></th>
    </tr>
    <?php
        }
        } else {
            echo '<tr><th><p style="color: red">Aradığınız isim bulunamadı</p></th></tr>';
        }
    
    ?>
 </table>   
<?php 
  
}
?>
</body>
</html>
