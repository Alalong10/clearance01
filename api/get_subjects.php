<?php
    include_once('classes/store.php');

	 $result = array();
      $get = Store::loadTable('system_subjectdata');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
      $row = array(
      'id'=>$list->id,
      'course'=>Store::getColById( 'system_coursedata','id', Store::getColById('system_curriculum','id',$list->curriculum_id,1), 1) ,
      'curriculum'=>Store::getColById('system_curriculum','id',$list->curriculum_id,2),
      'name'=>$list->name,
      'code'=>$list->code,
			'school_year'=>Store::getColById('system_curriculum','id',$list->curriculum_id,3),
			'semester'=>Store::getColById('system_curriculum','id',$list->curriculum_id,4) == 1 ? 'First' : 'Second'
		
	  );
      

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);

?>
