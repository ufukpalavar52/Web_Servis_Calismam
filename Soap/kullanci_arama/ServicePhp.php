<?php

include_once 'veritabaniAyar/veritabaniAyar.php';

class ServicePhp {
    public function parametreGoster($name)
    {
        $userList = array();
        $baglanti = new VeriTabaniBaglanti();
        $conn = $baglanti->pdo_baglanti();
        $sorgu = $conn->query("Select *from users where name like '%$name%'  or last_name like '%$name%'");
        $rows = $sorgu->fetchAll(PDO::FETCH_CLASS);        
        foreach ($rows as $list) {
            $listd = array(
                "ad" => $list->name,
                "soyad" => $list->last_name,
                "email" => $list->email
            );
            array_push($userList, $listd);
            //$listd = null;
            //echo $list->name.'<br>';
        }
       return $userList;
    }
    
}

$service = new SoapServer(null, array("uri"=>"http//ufukpalavar-service"));
$service->setClass("ServicePhp");
$service->handle();
