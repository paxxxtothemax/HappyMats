<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Model_aggregate extends CI_Model{

	function getSensorData(){
		//$this -> db -> select('*');
		//$this -> db -> from('sensor_report_entry');
		$query = $this->db->query("SELECT * from sensor_report_entry");
		//return $this->db->get()->result();
		return $query->result();
	}

	function getUrineArsenicFailValue(){
		$query = $this->db->query("SELECT IntValue FROM settings where setting = 'ArsenicUrineThreshold'");
		//$query = $this->db->query('SELECT * from settings');
		$row = $query->row(0);

		$query = $this->db->query("SELECT count(*) AS FailCount FROM urines WHERE ArsenicUrineLevel >=".$row->IntValue);
		return $query->row(0);

	}

	function getUrineArsenicSafeValue(){
		$query = $this->db->query("SELECT IntValue FROM settings where setting = 'ArsenicUrineThreshold'");
		//$query = $this->db->query('SELECT * from settings');
		$row = $query->row(0);

		$query = $this->db->query("SELECT count(*) AS SafeCount FROM urines WHERE ArsenicUrineLevel <".$row->IntValue);
		return $query->row(0);

	}
}
	