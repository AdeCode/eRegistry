<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class DiffTables extends DatabaseObject 
{		 
  public static function find_by_sql($sql="") 
  {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
	
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = $row;
    }
	return !empty($object_array) ? $object_array : false;
  }
  
  public static function update_by_sql($sql) 
  {
	  global $database;
	  
	  //$cleanSql = $database->escape_value($sql);	  
	  
	  //if($database->query($cleanSql))
	  if($database->query($sql))
	  {	  
		  return ($database->affected_rows() == 1) ? true : false;
	  }				
  }
  
  public static function insert($sql) 
  {
	global $database;
	
	try
	{
		if($database->query($sql))
		{
	  	return true;
		} 
		else 
		{
	  	return false;
		}
	}
	catch(Exception $e)
	{
		return false;	
	}
  }

  // NOTE: find_by_sql(), update_by_sql() and insert() are all doing the same thing. 	
  //another function here
}
?>