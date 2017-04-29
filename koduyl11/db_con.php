<?php
function db_connect() {

        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;

        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {

          $host = "localhost";
          $user = "test";
          $pass = "t3st3r123";
          $db = "test";
             // Load configuration as an array. Use the actual location of your configuration file
            
            $connection = mysqli_connect($host, $user, $pass, $db);
            /*$db = mysql_select_db("uus_transport", $connection);*/
        }

        // If connection was not successful, handle the error
        if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return mysqli_connect_error(); 
        }
        return $connection;

    }

function db_error() {
        $connection = db_connect();
        return mysqli_error($connection);
    }

function db_query($query) {
      // Connect to the database
      $connection = db_connect();

      // Query the database
      $result = mysqli_query($connection,$query);

      return $result;
 }


?>




