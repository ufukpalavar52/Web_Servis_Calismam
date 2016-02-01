<?php


//error_reporting(0);

class VeriTabaniBaglanti
{
    private $dns;
    private $user;
    private $pdo = null;
    private $pass;
    
    public function pdo_baglanti() 
    {
        try{
           $this->dns = 'mysql:host=localhost;dbname=logintest';
           $this->user = 'root';
           $this->pass = '12345';
           $this->pdo = new PDO($this->dns,$this->user,$this->pass);
           $this->pdo->exec('SET CHARCTER UTF-8');
           
           
          //echo("PDO bağlantı objesi oluşturuşdu");
        } catch(PDOException $e) {
            die('Baglanti kurulamadi: '.$e->getMessage());
        }
        return $this->pdo;
    }
    
    public function pdo_sonlandir()
    {
        $this->pdo = null;
        return $this->pdo;
    }
    
}
//$d = new VeriTabaniBaglanti();
//$d->pdo_baglanti();
