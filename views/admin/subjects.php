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
							<center>Subject Data Management</center>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-secondary">
								<div class="panel-heading text-primary">Add New Subject</div>
								<div class="panel-body">
									<form method="post"  class="addSubject" role="form">
										<input type="hidden" name="action" value="addSubject">
										<div class="form-group">
											<label>Subject name</label>
											<input type="text" name="name" id="name" class="form-control">
										</div>
										<div class="form-group">
											<label>Subject code</label>
											<input type="text" name="code" id="code" class="form-control">
										</div>
										<div class="form-group">
											<label>Curriculum</label>
                                            <div id="getCurriculumList">
											    <select class="form-control"></select>
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
							<table class="table table-striped table-bordered table-hover subjectList" border="0">
								<thead class="thead">
									<tr>
										<th>Course</th>
										<th>Curriculum</th>
										<th>Subject</th>
										<th>Code</th>
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