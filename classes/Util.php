<?php

class Util
{
    // {{{ properties

    /**
     * The status of string's universe
     * The status od Id is dependent on the Table Unique Id
     * @var string id
     */
    public $id;
    private $_db;

    /**
     * Calls the Database when User class is called.
     *
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->_db = $conn;
    }

    /**
     * This Truncate a string and append "..." to it.
     *
     * @param        $string           String you want to Truncate.
     * @param        $length           Integer of String you want.
     * @param string $dots Fixed value of "..."
     *
     * @return string           This returns the Truncated String
     */
    public function truncate($string, $length, $dots = "...")
    {
        return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
    }

    /**
     * @param $string   String to Sanitize
     *
     * @return string   sanitized String
     */
    public function sanitize($string)
    {
        return htmlspecialchars(strip_tags($string));
    }

    /**
     * @param $table    String tableName within the database
     * @param $field    String columnName within the database
     *
     * @return mixed    returns value in a column
     */
    public function getTableFieldViaColumn($table, $field, $column, $value)
    {
        $query = "SELECT $field
                  FROM 
                       $table
                  WHERE $column = '$value'
                  LIMIT 1
        ";


        $stmt = $this->_db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();

        $userData = $stmt->fetch();
        return $userData[$field];
    }

    /**
     * @param $table    String value [Table Name]
     * @param $column    String value [Column Name]
     * @param $value    String value [Value Entered]
     *
     * @return bool     Boolean Value of true or false
     */
    public function checkValueExist($table, $column, $value)
    {
        $value = addslashes($value);
        # Query that Checks if Value exist in table on the database
        $query = "SELECT COUNT(*) FROM `$table` WHERE `$column` = '$value'";

        # Perform the Direct Query
        $stmt = $this->_db->query($query);


        # Rows Returned
        $rows = (int)$stmt->fetchColumn();

        if ($rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}