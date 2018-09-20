<?php
/**
 * @author [Hasan Hüseyin CİHANGİR]
 * @email [hashusfb@gmail.com]
 * @create date 2018-09-20 13:47:08
 * @modify date 2018-09-20 13:47:08
 * @desc [Todo_Model.php]
*/

class Todo_Model extends CI_Model
{
	public $tableName = "todos";

	public function __construct()
	{
		parent::__construct();
	}
	public function get_all()
	{
		return $this->db->get($this->tableName)->result();
	}
	public function insert($data=array())
	{
		return $this->db->insert($this->tableName,$data);
	}
	public function delete($id)
	{
		return $this->db->where("id",$id)->delete($this->tableName);
	}
	public function update($id,$data=array())
	{
		return $this->db->where("id",$id)->update($this->tableName,$data);
	}
}
?>
