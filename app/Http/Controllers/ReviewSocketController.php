<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Exception;

class ReviewSocketController extends Controller implements MessageComponentInterface
{
    private $connections;

    function __construct() {
        $this -> connections = collect();
        echo "server started \r\n";
    }

    function onOpen(ConnectionInterface $conn){
        echo "new connection \r\n";
        $newobj = new \stdClass();
        $newobj->conn = $conn;
        $newobj->count = 0;

        $this -> connections -> push($newobj);
    }

    function onClose(ConnectionInterface $conn){
        echo "connection closed \r\n";
        $this -> connections -> reject(function($elem) {
            return $conn == $elem->conn;
        });
    }

    function onError(ConnectionInterface $conn, Exception $ex){
        echo "something went wrong! ".$ex -> getMessage()."\r\n";
    }

    function onMessage(ConnectionInterface $conn, $msg){
        echo "Message received: ".$msg."\r\n";

        foreach($this -> connections as &$connection) {
            if($conn != $connection->conn) {
                echo "before ".$connection->count." \r\n";
                $connection->count = $connection->count + 1;
                echo "after ".$connection->count." \r\n";
                $connection->conn -> send($connection->count);
            }
        }
    }
}
