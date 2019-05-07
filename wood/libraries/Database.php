<?php
class Database{
	public $host = DB_HOST;
	public $username = DB_USER;
	public $password = DB_PASS;
	public $db_name = DB_NAME;
	
	public $link;
	public $error;
	
	/*
	 * Class Constructor
	 */
	public function __construct(){
		//Call Connect Function
		$this->connect();
	}
	
	/*
	 * Connector
	 */
	 private function connect(){
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
		
		if(!$this->link){
			$this->error = "Connection Failed: ".$this->link->connect_error;
			return false;
		}
	 }
	 
	 /*
	  *	Select
	  */
	  public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	  }
	  
	  
	  
	  
	  

	  
	  	  
	   /*
	   * Inserto Invented module
	   */
	   public function inserto($query){
			$insert_tool = $this->link->query($query) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($insert_tool){
				
				header('Refresh: 0');
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	  

	  
	  	    /*
	   * Deleto
	   */
	   public function deleto($query){
			$delete_tool = $this->link->query($query) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($delete_tool){
				
				header('Refresh: 0');
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	  
	  

	  
	  	   /*
	   * Updato
	   */
	   public function updato($query){
			$update_tool = $this->link->query($query) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($update_tool){
				header('Refresh: 0');
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	  
	  
	  
	  
	  
	  
	  
	  /*
	   * Insert
	   */
	   public function insert($query){
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($insert_row){
				header("Location: profile.php?msg=".urlencode('Record Added'));
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	   
	   /*
	   * Update
	   */
	   public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($update_row){
				header("Location: profile.php?msg=".urlencode('Record Updated'));
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	   
	    /*
	   * Delete
	   */
	   
	   
	   public function delete($query,$query1){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			$delete_row = $this->link->query($query1) or die($this->link->error.__LINE__);
			
			//Validate Insert
			if($delete_row){
				header("Location: profile.php?msg=".urlencode('Record Deleted'));
				exit();
			} else {
				die('Error : ('. $this->link->errno .') '. $this->link->error);
			}
	   }
	 
}