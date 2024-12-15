<?php
class functions
{
    // Data member || member variables
    private $db;
    private $sql;
    private $result;

    // constructor
    function __construct()
    {
        require_once 'DbConnection.php';
        // create an instance of class DbConnection
        $this->db = new DbConnection();
        // calling the method: connect() of class DbConnection
        $this->db->connect();
    }
    // destructor
    function __destruct()
    {
        // close the connection
        $this->db->connect()->close();
    }
    // methods
    public function insert_data($tablename, $fields, $values)
    {
        // count fields in array
        $count = count($fields);
        // generate insert statement
        // syntax: INSERT INTO tablename(col1,col2,...) VALUES(val1,val2,...)
        $this->sql = "INSERT INTO $tablename( ";
        for ($i = 0; $i < $count; $i++) {
            $this->sql .= $fields[$i];
            if ($i < $count - 1) {
                $this->sql .= " ,  ";
            } else {
                $this->sql .= " ) VALUES (";
            }
        }
        for ($i = 0; $i < $count; $i++) {
            $this->sql .= "'" . $values[$i] . "'";
            if ($i < $count - 1) {
                $this->sql .= " , ";
            } else {
                $this->sql .= " ); ";
            }
        }
        // execute insert statement
        $this->result = $this->db->connect()->query($this->sql);
        if ($this->result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function login_user($username, $password)
    {
        $user = stripslashes($username);
        $pwd = stripslashes($password);
        $user = $this->db->connect()->real_escape_string($user);
        $pwd = $this->db->connect()->real_escape_string($pwd);
        $md5 = md5($pwd);
        $this->sql = "SELECT * FROM Bmcbbu_404 WHERE UserName ='$user' AND UserPassword	='$md5'";
        // $stmt = $this->db->connect()
        $this->result = $this->db->connect()->query($this->sql);
        if (mysqli_num_rows($this->result) == 1) {
            return mysqli_fetch_assoc($this->result);
        } else {
            return false;
        }
    }

    public function update_data($tablename, $fields, $values, $fid, $vid)
    {
        $count = count($fields);
        $this->sql = "UPDATE $tablename SET ";
        for ($i = 0; $i < $count; $i++) {
            $this->sql .= $fields[$i] . "='" . $values[$i] . "'";
            if ($i < $count - 1) {
                $this->sql .= ", ";
            }
        }
        $this->sql .= " WHERE $fid = $vid";

        // Execute the query
        $this->result = $this->db->connect()->query($this->sql);
        if ($this->result === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
