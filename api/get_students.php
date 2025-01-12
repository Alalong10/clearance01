<?php
    include_once('classes/store.php');

	 $result = array();
      $get = Store::loadTable('account_studentprofile');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
      $row = array(
      'id'=>$list->id,
      'faculty'=>Store::getColById('system_facultydata','id',1,1),
      'course'=>Store::getColById('system_coursedata','id',$list->course_id,1),
      'matric'=>$list->matric,
			'fullname'=>$list->fullname
			//'action'=> "<button id='".$list->id."' etype='finished'
			//class='btn btn-success activate'>Finished </button></div>"

	  );
      

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);

?>
