<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database_cleaner extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function upperCaseArray($array)
	{
		//Setting up new array
		$lowerArray = array();
		
		//Itterating over all the values in the array
		foreach($array as $keys => $values)
		{
			//Making every value lower case to make it easier to make the first word of every value uppercase
			$lowerArray[$keys] = strtolower($values);
		}
		
		//Setting up final array(dictionary)
		$newArray = array();
		
		//Itterating over every key value pair from the lower case array walk through.
		foreach($lowerArray as $key => $value)
		{
			//Making the value of every key have the first letter be uppercase with the ucwords function
			$newArray[$key] = ucwords($value);
		}
		
		//Returning out the final array
		return $newArray;
	}

	public function cleanText($_uid = "", $_col = "", $_table = "")
	{
		//Offset for limit in query
		$_o = 5000;

		//Amount we going by(initially 0)
		$_a = 0;

		if($this->db->table_exists($_table))
		{
			//Getting the total amount of rows in the table
			$rc = $this->db->query("SELECT * from {$_table}")->num_rows();
			//Getting the amount to loop the function by and rounding up
			$l = ceil($rc / $_o);

			//for loop to bypass the memory limit set by PHP for running through to much data
			for($i = 0; $i < $l; $i++)
			{
				//Getting the list of id's for updating and setting into an array with sub arrays
				$array_ids = $this->db->query("SELECT {$_uid} from {$_table} limit {$_a},{$_o}")->result_array();
				//Initializing an empty area to hold single area of ids
				$id_array = array();

				foreach ($array_ids as $row_array) 
				{
					foreach ($row_array as $key => $values) 
					{
						$id_array[] = $values;
					}
				}

				$array_vals = $this->db->query("SELECT {$_col} from {$_table} limit {$_a},{$_o}")->result_array();
				$vals_array = array();

				foreach ($array_vals as $row_array2) 
				{
					foreach ($row_array2 as $key2 => $values2) 
					{
						$vals_array[] = $values2;
					}
				}

				$arrayList = array_combine($id_array, $vals_array);
				$newArray = $this->upperCaseArray($arrayList);

				
				foreach($newArray as $key => $value)
				{
					$this->db->trans_start();

					$data = array(
		               $_col => $value
		            );

					$this->db->where($_uid, $key);
					$this->db->update($_table, $data);

					$this->db->trans_complete();
				}

				$_a += $_o;
			}
		}
	}
}