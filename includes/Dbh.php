<?php

class Dbh
{
    /**
     * @var string $servername
     * @var string $username
     * @var string $password
     * @var string $dbname
     * @var string $charset
     * @var  $conn
     *
     */
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    public $conn;
    /**
     * Connect To Database
     *
     * @param /PDO $conn
     * @return void
     */

    public function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "UsingController";
        $this->charset = "utf8mb4";

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset; // Data Source Name
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed:" . $e->getMessage();
        }

    }
    
    public function insert($tableName, $data)
    {

        $sql = "INSERT INTO $tableName SET";

        foreach ($data as $column => $value) {
            $sql .= '`' . $column . '` = ?, ';

        }
        $sql = rtrim($sql, ', ');
        $query = $this->conn->prepare($sql);
        $query->execute(array_values($data));
    }
    public function queryFetch($tableName, $where, $select = '*')
    {
        $sql = "SELECT $select FROM $tableName ";
        if (!empty($where)) {
            $sql .= "WHERE ";
        }
        foreach ($where as $column => $value) {
            $sql .= '`' . $column . '` = ? AND ';
        }
        $sql = rtrim($sql, 'AND ');
        $query = $this->conn->prepare($sql);
        $query->execute(array_values($where));
        return $query;
    }
    public function fetch($tableName, $where, $select = '*') //where array ,select string
    {
        $query = $this->queryFetch($tableName, $where, $select);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchAll($tableName, $where = [], $select = '*') //where array ,select string
    {
        $query = $this->queryFetch($tableName, $where, $select);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function whereDef($where)
    {
        $sql ;
        if (!empty($where)) {
            $sql .= "WHERE ";
        }
        foreach ($where as $column => $value) {
            $sql .= '`' . $column . '` = ? AND ';
        }
        $sql = rtrim($sql, 'AND ');
        return $sql;
    }
    public function update($tableName, $data, $where) //where array ,select string
    {
        $sql = "UPDATE $tableName SET ";
        foreach ($data as $column => $value) {
            $sql .= '`' . $column . '` = ?, ';
        }
        $sql = rtrim($sql, ', ');
        $sql .= $this->whereDef($where);
        $query = $this->conn->prepare($sql);
        $query->execute(array_values(array_merge($data,$where)));
    }
    public function delete($tableName, $where)
    {

        $sql = "DELETE FROM $tableName ";
        $sql .= $this->whereDef($where);
        $query = $this->conn->prepare($sql);
        $query->execute(array_values($where));
    }
    

    // $indexArray = ['H', 'Z', 'hassanzohdy@gmail.com'];

    // $assocs = [
    //     'first' => 'H',
    //     'last' => 'Z',
    //     'email' => 'hassanzohdy@gmail.com',

    // $columns = array_keys($data);
    // $values = array_values($data);

    // $columnString = implode(',',$columns);

    // $valueString = implode(',', array_fill(0, count($array), '?'));

    // $insert = $conn->prepare("INSERT INTO {$tableName} ({$columnString}) VALUES ({$valueString})");

}
