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
							<center>Teacher Data Management</center>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-secondary">
								<div class="panel-heading text-primary">Add New Teacher</div>
								<div class="panel-body">
									<form method="post"  class="addTeacher" role="form">
										<input type="hidden" name="action" value="addTeacher">
										<div class="form-group">
											<label>Teacher name</label>
											<input type="text" name="name" id="name" class="form-control">
										</div>
										<div class="form-group">
											<label>Teacher Type</label>
                                            <select name="prof_type" class="form-control">
                                                <option value="professional">Professional</option>
                                                <option value="visiting-lecturer">Visting Lecturer</option>
                                            </select>
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
							<table class="table table-striped table-bordered table-hover teacherList" border="0">
								<thead class="thead">
									<tr>
										<th>Teacher Name</th>
										<th>Type</th>
										<th>Action</th>
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