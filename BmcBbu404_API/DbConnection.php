<?php
class DbConnection
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $userpass = '';
    private $database = 'BmcBbu404_API';
    public function connect()
    {
        try {
            $conn = new mysqli($this->hostname, $this->username, $this->userpass, $this->database);
            return $conn;
        } catch (\Exception $ex) {
            echo "Error : " . $ex->getMessage();
        }
    }
}
