<select name="curriculum_id" class="form-control" required>
	<?php
	include_once('classes/store.php');

	 $result = array();
      $get = Store::getCurriculumList();
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):
     $course_name = Store::getColById('system_coursedata','id',$list->course_id,1);
	 echo "<option value='".$list->id."'>".$list->curriculum_name . ' ' . $course_name . ' - ' . $list->school_year . ' '  . ($list->semester == 1 ? '1st sem' : '2nd sem') ."</option>";

	 endforeach;


	?>
	</select>
