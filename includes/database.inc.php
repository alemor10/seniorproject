<?php



class Connection {

    private  $host  =  " localhost " ;
    private  $dbname  =  "loginsystem" ;
    private  $user  =  "localhost" ;
    private  $password  =  "" ;
    private  $connection  =  null ;

    public  function  getConnection () {
        try {
            $this -> connection  =  new  PDO (
                                "mysql: host = $this->host ; dbname = $this->dbname " ,
                                $this->user ,
                                $this->password
                                );
        return  $this -> connection ;
        } catch (Exception  $e ) {
            echo  $e ->getMessage ();
        } finally {
            $this -> connection  =  null ;
        }
    }
}


?>
