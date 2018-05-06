
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee extends CI_Controller {

   public function __construct(){ 
	  parent::__construct();
       	$this->load->model('employeeModel');
	}

	public function index()
	{
		$this->load->model('employeeModel');
		$posts = $this->employeeModel->getAllEmployeeData();
		$this->load->view('index',['post'=>$posts]);

	}

	public function departmentIndex()
	{
		//$this->load->model('employeeModel');
		//$posts = $this->employeeModel->getAllEmployeeData();
		$this->load->view('department');

	}

	public function employeeIndex()
	{
		$this->load->model('employeeModel');
		$departmentId = $this->employeeModel->getAllDepartmentData();
		$this->load->view('employee',['departmentId'=> $departmentId]);

	}

	public function insertDepartment()
	{

		$this->form_validation->set_rules('department_name', 'Department', 'required');
		if ($this->form_validation->run())
		{
			//echo "Success";
			$data = $this->input->post();
			//$OrderLines=$this->input->post('orderlines');
			//echo "<pre>";
			//print_r($data);
			//exit;
			//unset($data['submit']);
			$this->load->model('employeeModel');
			if($this->employeeModel->insertDepartment($data))
			{
				$this->session->set_flashdata('msg','Post save Successful');
			}
			else
			{
				$this->session->set_flashdata('msg','Fail to save Data');
			}
			return redirect('department');
		}
		else
		{
			//echo validation_errors();
			$this->load->view('department');
		}

	}

	public function insertEmployee()
	{
		$this->form_validation->set_rules('employee_department_id', 'Department Name', 'required'); 
		$this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
		$this->form_validation->set_rules('employee_salary', 'Employee Salary', 'required');
		if ($this->form_validation->run())
		{
			//echo "Success";
			$data = $this->input->post();
			//$OrderLines=$this->input->post('orderlines');
			//echo "<pre>";
			//print_r($data);
			//exit;
			//unset($data['submit']);
			$this->load->model('employeeModel');
			if($this->employeeModel->insertEmployee($data))
			{
				$this->session->set_flashdata('msg','Post save Successful');
			}
			else
			{
				$this->session->set_flashdata('msg','Fail to save Data');
			}
			return redirect('employee/employeeIndex');
		}
		else
		{
			//echo validation_errors();
			$this->load->view('employee/employeeIndex');
		}

	}

	public function deleteEmployeeFromList($id)
	{
		$this->load->model('employeeModel');
		if($this-> employeeModel->deleteEmployee($id))
		{
			$this->session->set_flashdata('msg','Post Delete Successful');
		}
		else
		{
			$this->session->set_flashdata('msg','Fail to Delete Data');
		}
		return redirect('employee/index');

	}



  }
