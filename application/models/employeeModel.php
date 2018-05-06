<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employeeModel extends CI_Model {

	public function getAllEmployeeData(){

		$query = $this->db->select('employee_id, employee_name, employee_salary,department_name')
						  ->from('employee_table')
						  ->join('department_table',' employee_table.employee_department_id = department_table.department_id')
		                  ->order_by('employee_id', "asc")
						  ->get();
		if( $query->num_rows() )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	
	public function getAllDepartmentData(){

		$query = $this->db->select('*')
		                  ->from('department_table')
		                  ->order_by('department_id', "asc")
						  ->get();
		if( $query->num_rows() )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}

	public function insertEmployee($data)
	{
		
		$this->db->insert('employee_table', $data);

		return true;
	}
	
	public function insertDepartment($data)
	{
		
		$this->db->insert('department_table', $data);

		return true;
	}
	
	public function deleteEmployee($id)
	{
		
		$this->db->delete('employee_table', ['employee_id'=> $id]);

		return true;
    }
	
}
