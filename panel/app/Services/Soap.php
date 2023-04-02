<?php

namespace App\Services;

use SoapClient;
use SoapFault;
use SoapParam;

class Soap {

    private $messages = array();
    private $soap;

    public function __construct() {
        try {
            $this -> connect();
        }
        catch (\Exception $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function connect() {
        try {
            $this->soap = new SoapClient(NULL, array(
                'location' => 'http://127.0.0.1:7878/',
                'uri' => 'urn:AC',
                'style' => SOAP_RPC,
                'login' => 'admin',
                'password' => 'A111111a!'
            ));
        }
        catch (SoapFault $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function cmd($command) {
        $result = $this->soap->executeCommand(new SoapParam($command, 'command'));
        $this->addMessage($result);
    }

    public function addMessage($message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        return $this->messages;
    }
}
