<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'mongo' => array(
            // This group is used when no instance name has been provided.
            'default' => array(
                'hostname'   => 'localhost',
                'database'   => 'mongo_fuel',
            ),


            // List your own groups below.
            'my_mongo_connection' => array(
                'hostname'   => 'localhost',
                'database'   => 'mongo_fuel',
                'replicaset' => '',
                'username'   => '',
                'password'   => '',
            ),

            // An alternative group example using a UNIX socket connection, instead of the TCP localhost
            'my_mongo_sock' => array(
                //'hostname'   => '/tmp/mongodb-27017.sock',
                //'port'   => 0,
                //'database'   => 'mongo_fuel',
            ),

        ),
);
