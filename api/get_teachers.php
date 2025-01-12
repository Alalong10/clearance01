<?php
    include_once('classes/store.php');

	 $result = array();
      $get = Store::loadTable('system_teacher');
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
        $prof_type = ucfirst($list->prof_type);
        $prof_type = str_replace('-', ' ', $list->prof_type);
      $row = array(
      'id'=>$list->id,
      'teacher'=>$list->name,
      'prof_type'=> ucfirst($prof_type),
      'action' => '<button class="btn btn-primary"><i class="fa fa-eye"></i> View</button>'
	  );
      

     $data[]=$row;
     endforeach;

     $result['data'] = $data;

  echo json_encode($result);

?>
