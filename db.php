<?php 
        $localhost = 'localhost';
        $user = 'ssupix21';
        $password = 'NoSleep22$';
        $db_name = 'u704810528_classlist';

        $userdb = new MySQLi( $localhost, $user, $password, $db_name );

        if( $userdb->connect_errno > 0 ) {
            die( 'Cannot connect to database. Error: ' . $userdb->error );
        }
 ?> 
