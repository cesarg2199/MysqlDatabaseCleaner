<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('database_cleaner');
	}
	
	public function index()
	{
		$this->load->view('includes/menu');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}

	/* FUNCTIONS */

	public function cleanText()
	{
		$table = $this->input->post('table');
		$uid = $this->input->post('uid');
		$col = $this->input->post('col');

		if($this->database_cleaner->cleanText($uid, $col, $table))
		{
			return true;
		}
	}

	public function saveTempDatabaseDetails()
	{
		$host = $this->input->post('host');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$database = $this->input->post('database');

		// Create connection
		$conn = new mysqli($host, $username	, $password);

		// Check connection
		if (!($conn->connect_error)) 
		{
			$data = array(
				'hostname' => $host,
				'username' => $username,
				'password' => $password,
				'database' => $database
			);

			file_put_contents("application/views/temp/temp_db.php", json_encode($data));

			return 0;
		}
		else
		{
			return 1;
		}
	}
}

/* End of file lists.php */
/* Location: ./application/controllers/lists.php */