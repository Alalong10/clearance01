<select name="course_id" class="form-control" required>
	<?php
	include_once('classes/store.php');

	 $result = array();
      $get = Store::getCourseList();
	 			$query = $get->fetchAll(PDO::FETCH_OBJ);

     $data= array();
     foreach($query as $list):

	 echo "<option value='".$list->id."'>".$list->course_name."</option>";

	 endforeach;


	?>
	</select>
