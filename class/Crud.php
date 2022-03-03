<?php
session_start();
include_once ('Dbconnect.php');

class Crud extends Dbconnect
{
	
	public 	$columns="";
	public $values="";
	
	public $column="";
	public $value="";
	
	
	
	public function __construct()
	{
	parent::__construct();	
	}
	
	
	 public function selectalldata($table) 
  { 
                $select="SELECT * FROM books"; 
    $select1=$this->connection->query($select);
    return $select1; 
  } 
	
	public function selectbyid($table,$id)
	{
		$sel= "SELECT * FROM books where id=$id";
		$sel1=$this->connection->query($sel);
		return mysqli_fetch_array($sel1);
		
	}

	// insert data
	
	public function insert($data,$books)
	{
		
	//print_r($data);
		
		foreach($data as $this->column => $this->value)
		{
			
			$this->columns .= ($this->columns == "") ? "" : ", ";
			$this->columns .= $this->column;
		
			$this->values .= ($this->values == "") ? "" : ", ";
			$this->values .= "'".$this->value ."'";
			
			//echo $this->values;
		
		}
		
		$insert= ("INSERT into books ($this->columns) values ($this->values)");
		//echo $insert;
		$insert1= $this->connection->query($insert);
		
	}

	// update data

	 public function update($data,$books,$id) 
    { 
             foreach ($data as $this->column => $this->value) 
     { 
     $update=("UPDATE books SET $this->column = '$this->value' WHERE id= '$id'"); 
            // echo $update; 
             $this->connection->query($update);
     } 
             return true; 
    } 

	// delete data
	
	function deletedata($books,$where) 
    { 
     $delete=("DELETE FROM books WHERE id=$where"); 
             $this->connection->query($delete);
             return true; 
			 header("Location:../user/listing.php");
    } 
	
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
	
}


?>