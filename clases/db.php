<?php

abstract class DB
{
    private static $db_host = 'localhost';
    private static $db_user = 'devs';
    private static $db_pass = 'urqu1z4!';
    private static $db_port = 4548;
    protected $db_name = 'terciario';
    protected $query;
    protected $rows = array();
    private $conn;

    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    private function open_connection()
    {
        $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_port, $this->db_name);
    }

    private function close_connection()
    {
        $this->conn->close();
    }

    protected function execute_single_query()
    {
        $this->open_connection();
        $this->conn->query($this->query);
        $this->close_connection();
    }

    protected function get_results_from_query()
    {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_connection();
        array_pop($this->rows);
    }
}
