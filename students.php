<?php
class Student{
    // dbection
    private $db;
    // Table
    private $db_table = "student";
    // Columns
    public $id;
    public $name;
    public $branch;
    public $mobile;
    public $gender;


    // Db dbection
    public function __construct($db){
        $this->db = $db;
    }

    // GET ALL
    public function getStudents(){
        $sqlQuery = "SELECT id, name, branch, mobile, gender FROM " . $this->db_table . "";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // CREATE
    public function createStudent(){
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->branch=htmlspecialchars(strip_tags($this->branch));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->gender=htmlspecialchars(strip_tags($this->gender));
        $sqlQuery = "INSERT INTO
        ". $this->db_table ." SET name = '".$this->name."',
        branch = '".$this->branch."',
        mobile = '".$this->mobile."', gender = '".$this->gender."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // UPDATE
    public function getSingleStudent(){
        $sqlQuery = "SELECT id, name, branch, mobile, gender FROM
        ". $this->db_table ." WHERE id = ".$this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->name = $dataRow['name'];
        $this->branch = $dataRow['branch'];
        $this->mobile = $dataRow['mobile'];
        $this->gender = $dataRow['gender'];
    }

    // UPDATE
    public function updateStudent(){
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->branch=htmlspecialchars(strip_tags($this->branch));
        $this->mobile=htmlspecialchars(strip_tags($this->mobile));
        $this->gender=htmlspecialchars(strip_tags($this->gender));

        $sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
        branch = '".$this->branch."',
        mobile = '".$this->mobile."',gender = '".$this->gender."'
        WHERE id = ".$this->id;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    // DELETE
    function deleteStudent(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
        return true;
        }
        return false;
    }
}
?>