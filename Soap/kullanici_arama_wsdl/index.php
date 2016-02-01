<?php
include './lib/nusoap.php';
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
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
                <td><input type="text" name="ad"  placeholder="Aranacak isim" required/></td>
                
            </tr>
            
            <tr>
                <td><button type="submit">Göster</button></td>
            </tr>
        </table>
    </form>
</center>
<br>
<table border="1">
<?php

if ($_POST) {
    $sonuc = new nusoap_client("http://localhost/SoapWebService/UserService.php?wsdl");
    $userList = $sonuc->call("UserListe",array("name" => $_POST["ad"]));
    
    //$sonuc =  new SoapClient("http://localhost/SoapWebService/UserService.php?wsdl");
    //$userList = $sonuc->UserListe($_POST["ad"]);
    if (!empty($userList)) {
    ?>
    <tr>
        <th>Adı</th>
        <th>Soyadı</th>
        <th>Eposta</th>
    </tr>
    <?php  foreach ($userList as $list) { ?>
    <tr>
        <td><?= $list["ad"] ?></td>
        <td><?= $list["soyad"] ?></td>
        <td><?= $list["email"] ?></td>
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
