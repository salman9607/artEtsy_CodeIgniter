<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}
	function getAllParameters($select,$table,$whereArr='',$order='',$sort='',$result_array=false,$sLimit='',$db_group="default",$num_rows=false,$offset='')
  	{
		if($db_group !="default")
			$this->load->database($db_group, TRUE);
		$this->db->select($select);
		$this->db->from($table);
		if($whereArr!="")
		$this->db->where($whereArr);
		if($sLimit!='' && $offset!='')
		$this->db->limit($sLimit,$offset);
		elseif($sLimit!='')
		$this->db->limit($sLimit);
		if($order!='' && $sort!='')
		{
			$this->db->order_by($order,$sort);
		}
		$query = $this->db->get();

		if($query->num_rows() == 0)
			return false;				  
		else
		{
			if($num_rows==true)
			return $query->num_rows();
			if($result_array==true)
				$result = $query->result_array();
			else
				$result = $query->result();
			return $result;				  
		}
	}
	function delete($table,$whereArr)
	{
		$this->db->where($whereArr);
		$this->db->delete($table);
	}
	function getParameters($select,$table,$whereArr='',$result_array=false)
  	{
		$this->db->select($select);
		$this->db->from($table);
		if($whereArr!='')
		$this->db->where($whereArr);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
			return false;				  
		else
		{
			if($result_array==true)
				$result = $query->result_array();
			else
				$result = $query->result();
			return $result[0];				  
		}
	}
	function save($db_array,$table)
	{
		$this->db->insert($table, $db_array);
		return $this->db->insert_id();
	} 
  
	function update_common($db_array,$table,$whereArr,$escape=true)
  	{
		$whereClause=array();
	   	foreach($whereArr as $index => $value)
	   	{
	   		if($index=='trans_status_id_not_in')
				$this->db->where_not_in('trans_status_id', $value);
			else
				$whereClause[$index] = $value;
		}
	   	$this->db->where($whereClause);
	   	$this->db->update($table, $db_array,NULL,NULL,$escape);
		return $this->db->affected_rows();
  	}
    function login($data){
		// echo "<pre>";print_r($data);return;
    	$this->db->select('*');
		$this->db->where($data);
		$query = $this->db->get('admin_login');
		
		if ($query->num_rows() > 0)
		{ 
            $userData = array();
			foreach ($query->result() as $row)
			{
			   $userData['id'] 					= $row->id;
               $userData['email'] 				= $row->email;
               $userData['first_name'] 			= $row->first_name;
               $userData['last_name'] 			= $row->last_name;
               $userData['is_status'] 			= $row->is_status;
			}
			return $userData;
		}
        return false;
    }
}