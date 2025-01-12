<?php include 'classes/store.php'; ?>
<?php get_header('Admin | ITE Online Clearance', [], 'hold-transition skin-blue sidebar-mini') ?>

   
<div id="wrapper">
    <?php get_topbar()?>
    <?php get_sidebar()?>
	
	<div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="well panel-primary text-success">
							<center>Curriculum Data Management</center>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-secondary">
								<div class="panel-heading text-primary">Add New Curriculum</div>
								<div class="panel-body">
									<form method="post"  class="addCurriculum" role="form">
										<input type="hidden" name="action" value="addCurriculum">
										<div class="form-group">
											<label>Currlculum name</label>
											<input type="text" name="curriculum_name" id="curriculum_name" class="form-control">
										</div>
										<div class="form-group">
											<label>School Year</label>
											<input type="text" name="school_year" id="school_year" class="form-control">
										</div>
										<div class="form-group">
											<label class="control-label">Semester</label>
											<select name="semester" id="semester" class="form-control" required>
												<option value="1">First</option>
												<option value="2">Second</option>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label">Course</label>
											<div id="getCourseList">
												<select class="form-control">
												</select>
											</div>
										</div>

										<div class="form-group mt-2">
											<button type="submit" class="btn btn-primary"><span class="fas fa-save"></span> Save</button>
										</div>
									</form>
									<div class="alert_message_mod mt-2"></div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<table class="table table-striped table-bordered table-hover curriculumList" border="0">
								<thead class="thead">
									<tr>
										<th>Curriculum</th>
										<th>Course</th>
										<th>School Year</th>
										<th>Semester</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>

	</div>
<?php get_rightbar()?>
<?php get_footer(
	array(
		get_url() . 'views/admin/dist/js/datatables.min.js',
		get_url() . 'views/admin/dist/js/dataTables.select.min.js',
		get_url() . 'views/admin/dist/js/actions.js'
	)
)?>