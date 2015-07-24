<?php

// dbShortCuts v1.2, by 220 @ WKH
// GPLv2 license

if (!defined ("dbSC")) {
define ("dbSC", "loaded");

class dbSC {
	public function __construct ($db_info) { 
		$this->config ($db_info);
		}
	
	public function config ($db_info) {
		$this->getDbInfo ($db_info);
		}
	public function getDbInfo ($db_info) {
		$this->hostname = $db_info->hostname;
		$this->username = $db_info->username;
		$this->password = $db_info->password;
		$this->database = $db_info->database;
		}
	public function getInfo ($dbsc) {
		$this->hostname = $dbsc->hostname;
		$this->username = $dbsc->username;
		$this->password = $dbsc->password;
		$this->database = $dbsc->database;
	}
	public function query ($query) {
		$this->connect ();

		$this->results = mysql_query ($query);
		$this->num_rows = mysql_num_rows ($this->results);
		
		mysql_close ();
		}
	public function execute ($query) {
		$this->connect ();
		
		mysql_query ($query);
		mysql_close ();
		}
	public function ue_query ($query) {
		$this->ue_connect ();

		$this->results = mysql_query ($query);
		$this->num_rows = mysql_num_rows ($this->results);
		
		mysql_close ();
		}
	public function ue_execute ($query) {
		$this->ue_connect ();
		
		mysql_query ($query);
		mysql_close ();
		}
	public function result ($row, $field_name) {
		return mysql_result ($this->results, $row, $field_name);
		}
	public function connect () {
		$result = mysql_connect ($this->hostname, $this->username, convert_uudecode ($this->password));
		@mysql_select_db ($this->database) or die ();
		}
	public function ue_connect () {
		$result = mysql_connect ($this->hostname, $this->username, $this->password);
		@mysql_select_db ($this->database) or die ();
		}
		
		
	
	
	public function directFetch ($table, $id_field, $id, $field) {
		$this->connect ();
		
		$query = "SELECT $field FROM $table WHERE $id_field=$id";
		
		$this->query ($query);
		mysql_close ();
		
		if ($this->num_rows>0) return $this->result (0, $field);
	}
	
	public  $results;
	public  $num_rows;
	
	private  $hostname;
	public  $username;
	private  $password;
	private  $database;
	
} // end: dbSC
}
?>
