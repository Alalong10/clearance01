<?php
include('./functions.php');
require_once __DIR__.'/router.php';

$base_url = '/online-clearance';

get($base_url, 'views/index.php');

//Admin
get($base_url .'/admin', 'views/admin/index.php');
get($base_url .'/admin/students', 'views/admin/students.php');
get($base_url .'/admin/courses', 'views/admin/courses.php');
get($base_url . '/admin/subjects', 'views/admin/subjects.php');
get($base_url . '/admin/curriculums', 'views/admin/curriculums.php');
get($base_url . '/admin/teachers', 'views/admin/teachers.php');

//Teacher

//Student


// API Calls
post($base_url . '/json/save/user', '/api/save_user.php');
post($base_url . '/json/save/course', '/api/save_course.php');
post($base_url . '/json/save/curriculum', '/api/save_curriculum.php');
post($base_url . '/json/save/subject', '/api/save_subject.php');
post($base_url . '/json/save/teacher', '/api/save_teacher.php');

get($base_url . '/json/get/student', '/api/get_students.php');
get($base_url . '/json/get/course-list', '/api/get_courses.php');
get($base_url . '/json/get/curriculum-list', '/api/get_curriculum.php');
get($base_url . '/json/get/subject-list', '/api/get_subjects.php');
get($base_url . '/json/get/teacher-list', '/api/get_teachers.php');

post($base_url . '/admin/department-list', 'views/admin/getDeptList.php');

post($base_url . '/admin/course-list', 'views/admin/getCourseList.php');
post($base_url . '/admin/curriculum-list', 'views/admin/getCurriculumList.php');




any('/404','views/404.php');