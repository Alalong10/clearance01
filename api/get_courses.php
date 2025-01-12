<?php
    include_once('classes/store.php');

	 $result = array();
      $get = Store::loadTable('system_coursedata');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
      $row = array(
      'id'=>$list->id,
      'course'=>$list->course_name 
    );
      

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);

?>
