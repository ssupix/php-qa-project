<?php 
        $localhost = 'localhost';
        $user = 'root';
        $password = 'root';
        $db_name = 'classlist';

        $userdb = new MySQLi( $localhost, $user, $password, $db_name );

        
        if( $userdb->connect_errno > 0 ) {
            die( 'Cannot connect to database. Error: ' . $userdb->error );
        }else {
            // echo "connected!";
        }
 ?> 
