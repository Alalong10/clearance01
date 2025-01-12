jQuery(document).ready(function ($) {
   var base_url = $('body').attr('data-base-url');
   $("#login-form").submit(function (e) {
      loginProcess(e);
   });
   $("#getVoteResult").change(function (e) {
      getResult(e);
   });

   //alert(12345);


   facultyList();
   deptList();
   sessionList();
   feeList();
   studentList();
   userList();
   courseList();
   getCourseList();
   curriculumList();
   getCurriculumList();
   subjectList();
   teacherList();
   /**
    *
    *Update starts here
    *
    */

   //discount_fetcher
   function loginProcess(evt) {
      var _this = $(evt.target);
      evt.preventDefault();
      var username = $(_this).find('#username').val();
      var password = $(_this).find('#password').val();
      var formdata = $(_this).serialize();
      $(_this).find(':input').attr('disabled', true);
      $(_this).find(':button').attr('disabled', false);
      $(_this).find(':button').html('Loading..');
      if (username === "" || password === "") {
         $("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
         $(_this).find(':input').attr('disabled', false);
         $(_this).find(':button').attr('disabled', false);
         $(_this).find(':button').html('Login');
      } else {
         $.ajax({
            url: 'reducer.php',
            type: 'POST',
            data: formdata,
            success: function (result) {
               //alert(result);
               if (result == 1) {
                  $("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
                  location.href = 'users.php';


               } else {
                  $("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>No user is registered using this credentials.</p>');
                  $(_this).find(':input').attr('disabled', false);
                  $(_this).find(':button').attr('disabled', false);
                  $(_this).find(':button').html('<i class="icon-signin icon-large"></i>Login');
               }
            }
         });
      }
      return this;
   }



   function facultyList() {
      $('.facultyList').DataTable({
         "ajax": "facultyList.php",
         retrieve: true,
         "columns": [{
               "data": "name"
            },
            {
               "data": "created"
            }
            //{ "data": "action" }
         ]
      });
   }


   function sessionList() {
      $('.sessionList').DataTable({
         "ajax": "sessionList.php",
         retrieve: true,
         "columns": [{
               "data": "name"
            },
            {
               "data": "created"
            }
            //{ "data": "action" }
         ]
      });
   }

   function deptList() {
      $('.deptList').DataTable({
         "ajax": "deptList.php",
         retrieve: true,
         "columns": [{
               "data": "faculty"
            },
            {
               "data": "name"
            },
            {
               "data": "created"
            }
         ]
      });
   }


   function feeList() {
      $('.feeList').DataTable({
         "ajax": "feeList.php",
         retrieve: true,
         "columns": [{
               "data": "faculty"
            },
            {
               "data": "dept"
            },
            {
               "data": "session"
            },
            {
               "data": "amount"
            },
            //{ "data": "action" }
         ]
      });
   }


   $(document).on('submit', '.addFaculty', function (evt) {
      evt.preventDefault();

      $.ajax({
         url: 'reducer.php',
         type: "POST",
         dataType: "json",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.facultyList').DataTable();
               table.destroy();
               facultyList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This faculty already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this faculty!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addDept', function (evt) {
      evt.preventDefault();

      $.ajax({
         url: 'reducer.php',
         type: "POST",
         dataType: "json",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.deptList').DataTable();
               table.destroy();
               deptList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This department already exists under given faculty!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this department!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addSession', function (evt) {
      evt.preventDefault();

      $.ajax({
         url: 'reducer.php',
         type: "POST",
         dataType: "json",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.sessionList').DataTable();
               table.destroy();
               sessionList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This session already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this session!!! Please try again later.</div>');

            }
         }


      });
   });
   $(document).on('submit', '.addFee', function (evt) {
      evt.preventDefault();

      $.ajax({
         url: 'reducer.php',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.feeList').DataTable();
               table.destroy();
               feeList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This fees already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating fees!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addStudent', function (evt) {
      evt.preventDefault();
      $.ajax({
         url: base_url + 'json/save/user',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.studentList').DataTable();
               table.destroy();
               studentList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This student already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating student!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addCourse', function (evt) {
      evt.preventDefault();
      $.ajax({
         url: base_url + 'json/save/course',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.courseList').DataTable();
               table.destroy();
               courseList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This course already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating course!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addCurriculum', function (evt) {
      evt.preventDefault();
      $.ajax({
         url: base_url + 'json/save/curriculum',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.curriculumList').DataTable();
               table.destroy();
               curriculumList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This course already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating course!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addSubject', function (evt) {
      evt.preventDefault();
      $.ajax({
         url: base_url + 'json/save/subject',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.subjectList').DataTable();
               table.destroy();
               subjectList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This course already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating course!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addTeacher', function (evt) {
      evt.preventDefault();
      $.ajax({
         url: base_url + 'json/save/teacher',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            //alert(result);
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.teacherList').DataTable();
               table.destroy();
               teacherList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This course already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating course!!! Please try again later.</div>');

            }
         }


      });
   });

   $(document).on('submit', '.addUser', function (evt) {
      evt.preventDefault();

      $.ajax({
         url: 'reducer.php',
         type: "POST",
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData: false,
         success: function (result) {
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.userList').DataTable();
               table.destroy();
               userList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error:: This user already exists!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error creating user!!! Please try again later.</div>');

            }
         }


      });
   });


   function studentList() {
      $('.studentList').DataTable({
         "ajax": base_url + 'json/get/student',
         retrieve: true,
         "columns": [{
               "data": "fullname"
            },
            {
               "data": "matric"
            },
            {
               "data": "faculty"
            },
            {
               "data": "course"
            }
            //{ "data": "action" }
         ]
      });
   }

   function courseList() {
      $('.courseList').DataTable({
         "ajax": base_url + 'json/get/course-list',
         retrieve: true,
         "columns": [{
               "data": "course"
            }
            //{ "data": "action" }
         ]
      });
   }

   function curriculumList() {
      $('.curriculumList').DataTable({
         "ajax": base_url + 'json/get/curriculum-list',
         retrieve: true,
         "columns": [{
               "data": "curriculum_name"
            },
            {
               "data": "course"
            },
            {
               "data": "school_year"
            },
            {
               "data": "semester"
            }
         ]
      });
   }

   function subjectList(){
      $('.subjectList').DataTable({
         "ajax": base_url + 'json/get/subject-list',
         retrieve: true,
         "columns": [{
               "data": "course"
            },
            {
               "data": "curriculum"
            },
            {
               "data": "name"
            },
            {
               "data": "code"
            },
            {
               "data": "school_year"
            },
            {
               "data": "semester"
            }
         ]
      });
   }
   
   function teacherList(){
      $('.teacherList').DataTable({
         "ajax": base_url + 'json/get/teacher-list',
         retrieve: true,
         "columns": [{
               "data": "teacher"
            },
            {
               "data": "prof_type"
            },
            {
               "data": "action"
            }
         ]
      });
   }

   function userList() {
      $('.userList').DataTable({
         "ajax": "userList.php",
         retrieve: true,
         "columns": [{
               "data": "fullname"
            },
            {
               "data": "username"
            },
            {
               "data": "date"
            },
            //{ "data": "action" }
         ]
      });
   }

   function getDept() {
      $("#getDeptList").empty();
      $("#getDeptList").html('<p>connecting to the server......</p>');
      $.ajax({
         url: base_url + 'admin/department-list',
         type: 'POST',
         data: {
            faculty: 1
         },
         success: function (result) {
            $("#getDeptList").empty();
            $("#getDeptList").append(result);
         }
      });
   }




   function saveUser(evt) {
      var _this = $(evt.target);
      evt.preventDefault();
      var formdata = $(_this).serialize();
      $.ajax({
         url: 'reducer.php',
         type: 'POST',
         data: formdata,
         success: function (result) {
            if (result == 1) {
               $('.alert_message_mod').html('<div class="alert alert-success" role="alert">Saved successfully</div>');
               table = $('.studentList').DataTable();
               table.destroy();
               studentList();
            } else if (result == 2) {
               $('.alert_message_mod').html('<div class="alert alert-warning" role="alert">Error: This student already exist!!!</div>');

            } else {
               $('.alert_message_mod').html('<div class="alert alert-danger" role="alert">Error adding this student!!! Please try again later.</div>');

            }
         }
      });
   }


   function getCourseList(){
      $("#getCourseList").empty();
      $("#getCourseList").html('<p>connecting to the server......</p>');
      $.ajax({
         url: base_url + 'admin/course-list',
         type: 'POST',
         data: {
            faculty: 1
         },
         success: function (result) {
            $("#getCourseList").empty();
            $("#getCourseList").append(result);
         }
      });
   }
   
   function getCurriculumList(){
      $("#getCurriculumList").empty();
      $("#getCurriculumList").html('<p>connecting to the server......</p>');
      $.ajax({
         url: base_url + 'admin/curriculum-list',
         type: 'POST',
         data: {
            faculty: 1
         },
         success: function (result) {
            $("#getCurriculumList").empty();
            $("#getCurriculumList").append(result);
         }
      });
   }
   /**
    *
    *Editd code ends up
    *
    */

});