<?php 
class persone{
    private static $age=20;
  
        echo "age : ".self::$age."years";
        return self::$age;
    


}
$old=new persone();
$old->age();
