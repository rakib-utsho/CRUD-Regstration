<?php
    class crud{
       public static function conect()
       {
            try{
                $con=new PDO('mysql:localhost=host; dbname=crud', 'root','');
            return $con;
            }catch(PDOException $error1){
                echo "Connection failed : ". $error1->getMessage();
            }catch(Exception $error2){
                echo "Generic Error!". $error2->getMessage();
            }
       }
    }







?>