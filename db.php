<?php 
        $localhost = "localhost";
        $user = "u704810582_ssupix21";
        $password = "NoSleep22$";
        $db_name = "u704810582_classlist";

        $userdb = new MySQLi( $localhost, $user, $password, $db_name );

        if( $userdb->connect_errno > 0 ) {
            die( 'Cannot connect to database. Error: ' . $userdb->error );
        }
 ?> 
