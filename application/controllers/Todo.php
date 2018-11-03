<?php
/**
 * @author [Hasan Hüseyin CİHANGİR]
 * @email [hashusfb@gmail.com]
 * @create date 2018-09-20 13:46:45
 * @modify date 2018-09-20 13:46:45
 * @desc [Todo.php]
*/
class Todo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("Todo_Model","todo_model");
	}
    public function index()
    {
		$items = $this->todo_model->get_all();
		foreach($items as $item)
		{
			$realDifference=strtotime($item->finishDate)-strtotime($item->startDate);
			$relativeDifference=strtotime($item->finishDate)-strtotime(date("Y-m-d H:i:s"));
			$relativeRemainingTime = gmdate("m H i s", $relativeDifference);
			$item->remainingTime=explode(' ', $relativeRemainingTime);
			$mapDifference=map($relativeDifference,0,$realDifference,100,0);
			if ($mapDifference>=0 and $mapDifference<100)
			{
				$item->progressValue=round($mapDifference);
			}
			else{
				$item->remainingTime=0;
				$item->progressValue=100;
			}
		}
    	$viewData =array(
    		"todos" => $items
		);
        $this->load->view("todo_list",$viewData);
    }
    public function insert()
    {
		$todo_title 	= $this->input->post("todo_title");
		$startDate		= $this->input->post("startDate");
		$finishDate		= $this->input->post("finishDate");
		
        if($todo_title)
		{
			$insert = $this->todo_model->insert(
				array(
					"explanation"	=> $todo_title,
					"isCompleted"	=> 0,
					"startDate"		=> $startDate,
					"finishDate"	=> $finishDate
				)
			);
			if ($insert)
			{
				redirect(base_url());
			}
		}
		else
		{
			redirect(base_url());
		}
    }
    public function delete($id)
    {
        //echo $this->uri->segment(3);
        $this->todo_model->delete($id);
        redirect(base_url());        
    }
    public function isCompletedSetter($id)
    {
    	$completed= ($this->input->post("completed")=="true") ? 1 : 0;
		echo $id."</br>".$completed;
        $this->todo_model->update($id,array(
        	"isCompleted"   => $completed
		));
    }
}
?>
