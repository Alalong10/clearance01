<?php
    include_once('classes/store.php');

	 $result = array();
      $get = Store::loadTable('system_curriculum');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
      $row = array(
      'id'=>$list->id,
      'curriculum_name'=>$list->curriculum_name,
      'course'=>Store::getColById('system_coursedata','id',$list->course_id,1),
      'school_year'=>$list->school_year,
      'semester'=>$list->semester == 1 ? 'First' : 'Second'
    );
      

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);

?>
