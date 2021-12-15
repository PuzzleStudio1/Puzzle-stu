<?php

use App\Http\Middleware\ConvertNum;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('sitemap.xml','SitemapController@sitemap');
Route::get('sitemap-pages.xml','SitemapController@pages');
Route::get('sitemap-course.xml','SitemapController@course');
Route::get('sitemap-teacher.xml','SitemapController@teacher');
Route::get('sitemap-category.xml','SitemapController@category');
Route::get('sitemap-tag.xml','SitemapController@tag');

// Route::view('/irantv', 'irantv');
Route::get('/live/{course}', 'Frontend\HomeController@live')->name('live.frontend');
Route::view('/services', 'services');

Route::get('/api/login','AuthApi@login');
Route::get('/api/quick_search','Frontend\HomeController@ajaxsearch');

Route::get('/webinar/{course}', 'Frontend\HomeController@webinar')->name('webinar.frontend');
Route::get('/{teacher}/teacher', 'Frontend\HomeController@teacher')->name('teacher.frontend');
Route::get('/{institute}/institute', 'Frontend\HomeController@institute')->name('institute.frontend');
Route::get('/category/{category}/courses', 'Frontend\HomeController@category')->name('category.frontend');
Route::get('/tag/{tag}/courses', 'Frontend\HomeController@tag')->name('tag.frontend');
// Route::get('/courses', 'Frontend\HomeController@lastCourses')->name('lastCourses.frontend');
Route::get('/basket/add/{course}', 'BasketController@add')->name('basket.add');
Route::get('/basket/remove/{course}', 'BasketController@remove')->name('basket.remove');
Route::get('/basket', 'BasketController@index')->name('basket.index');
Route::get('/basket/checkout', 'BasketController@checkout')->name('basket.checkout');
Route::get('payment/callback', 'PaymentController@verify')->name('payment.verify');
Route::post('/{user}/{classroom}/question', 'QuestionController@store')->name('question.store');
Route::post('/iframe/question', 'QuestionController@storeGuest')->name('question.storeGuest');
Route::get('search/', 'Frontend\HomeController@search')->name('front.search');

Route::post('/messagePost', 'Frontend\HomeController@messagePost');
// Route::get('/chat/{id}', 'Frontend\HomeController@chat');
Route::post('/absenceStart', 'Frontend\HomeController@absenceStart');
Route::post('/absenceEnd', 'Frontend\HomeController@absenceEnd'); 
// iframe access token URL
Route::get('/accessCheck/{token}/{courseID}', 'IframeController@checkToken');
// sinuhe
Route::get('/sinuhe', 'Frontend\HomeController@sinuhe');
// Voice Test
Route::get('voices', 'Frontend\HomeController@voice')->name('voice.index');
Route::post('voices/save/{classid}', 'Frontend\HomeController@save')->name('voice.save');
Route::get('voices/delete', 'Frontend\HomeController@delete')->name('voice.delete');
// BBB
Route::get('createMeeting/{liveClass}', 'BigBlueButtonController@createMeeting')->name('create.meeting');
Route::get('joinAdmin/{liveClass}', 'BigBlueButtonController@joinAdmin')->name('join.admin');
Route::get('joinUser/{liveClass}', 'BigBlueButtonController@joinUser')->name('join.user');
Route::post('joinUserGuest/{liveClass}', 'BigBlueButtonController@joinUserGuest')->name('join.userGuest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('signL/{course}', 'CourseController@signLoginCourse')->name('signLoginCourse');
    Route::post('signCode/{course}', 'CourseController@CodeLoginCourse')->name('CodeLoginCourse');
    Route::post('sinuhe/CodeLoginSinuhe/{course}', 'CourseController@CodeLoginSinuhe')->name('CodeLoginSinuhe');
    Route::get('sinuhe/signAll', 'CourseController@sinuheSign')->name('sinuheSign');
});

Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function () {
    Route::get('/', 'Frontend\DashboardController@dashboard')->name('user.dashboard');
    
    Route::get('/dashboard/courses', 'Frontend\DashboardController@dashboardCourses')->name('user.dashboardCourses');
    
    Route::get('/edit', 'Frontend\DashboardController@editUser')->name('user.dashboard.edit');
    Route::post('/edit', 'Frontend\DashboardController@updateUser')->name('user.dashboard.update');
    
    Route::group(['middleware' => 'can:manage course'], function () {
        Route::get('/IT/courses', 'Frontend\DashboardController@courses')->name('teacher.institute.courses');
        Route::get('/{course}/classrooms', 'Frontend\DashboardController@classrooms')->name('teacher.institute.course.classrooms');
        Route::get('/{course}/booklets', 'Frontend\DashboardController@booklets')->name('teacher.institute.course.booklets');
        Route::post('/{course}/booklets', 'Frontend\DashboardController@bookletStore')->name('teacher.institute.booklet.store');
        Route::get('/{booklet}/booklet', 'Frontend\DashboardController@bookletDestroy')->name('teacher.institute.booklet.destroy');
        Route::get('/{course}/students', 'Frontend\DashboardController@students')->name('teacher.institute.course.students');
        Route::get('/{classroom}/questions', 'Frontend\DashboardController@questions')->name('teacher.institute.course.questions');
        Route::get('/{classroom}/absence', 'Frontend\DashboardController@absences')->name('teacher.institute.course.absence');
        Route::post('course/{course}/importUser', 'CourseController@importUser')->name('teacher.institute.course.importUser');
        Route::get('/question/{question}', 'QuestionController@instituteDestroy')->name('institute.question.destroy');
        Route::get('course/{course}/student/delete', 'CourseController@deleteStudent')->name('course.deleteStudent');
    });
    
    Route::get('/tasks', 'Frontend\DashboardController@tasksList')->name('dashboard.tasks.list');
    Route::get('/task/{id}', 'Frontend\DashboardController@tasksCheck')->name('dashboard.tasks.check');

    Route::group(['middleware' => 'can:import user to course'], function () {
        Route::get('/{course}/{user}', 'CourseController@courseStudentDelete')->name('institute.courseStudentDelete');
        Route::post('/{course}/addStudent', 'CourseController@courseStudentAdd')->name('institute.courseStudentAdd');
        Route::post('/{course}/createStudent', 'CourseController@courseStudentCreate')->name('institute.courseStudentCreate');
    });
    
    Route::group(['middleware' => 'can:read questions'], function () {
        Route::get('/classrooms', 'Frontend\DashboardController@TvShowIndex')->name('dashboard.tvshow.index');
    });
    
    Route::group(['middleware' => 'role:employee'], function () {
        Route::get('/courses', 'Frontend\DashboardController@courseList')->name('dashboard.course.list');
        Route::get('{course}/course/calssrooms', 'Frontend\DashboardController@courseClassroom')->name('dashboard.classroom.courseClassroom');
        Route::post('{course}/{classroom}/LiveOrArchive', 'ClassroomController@LiveOrArchive')->name('dashboard.classroom.LiveOrArchive');
    });
});


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('/register', 'RegisterController@showFirstRegistrationForm')->name('auth.firstRegister.form');
    Route::get('/register/username', 'RegisterController@showFirstRegistrationOldUserForm')->name('auth.firstRegisterOldUser.form');
    Route::get('/register2', 'RegisterController@showSecondRegistrationForm')->name('auth.secondRegister.form');
    Route::get('/register3', 'RegisterController@showThirdRegistrationForm')->name('auth.thirdRegister.form');

    Route::post('/register', 'RegisterController@firstRegister')->name('auth.firstRegister');
    Route::post('/register/username', 'RegisterController@firstRegisterOldUser')->name('auth.firstRegisterOldUser');
    Route::post('/register2', 'TwoFactorController@confirmCode')->name('auth.secondRegister');
    Route::post('/register3', 'RegisterController@thirdRegister')->name('auth.thirdRegister');

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::get('login/code', 'LoginController@showCodeForm')->name('auth.login.code.form');

    Route::post('/login', 'LoginController@login')->name('auth.login')->middleware(ConvertNum::class);
    Route::post('login/code', 'LoginController@confirmCode')->name('auth.login.code');

    Route::get('/logout', 'LoginController@logout')->name('auth.logout');

    Route::get('two-factor/resent', 'TwoFactorController@resent')->name('auth.two.factor.resent');
});


Route::group(['prefix' => 'tvshow', 'middleware' => 'can:read questions'], function () {
    Route::get('/classrooms', 'TvShowController@index')->name('tvshow.index');
    Route::get('{classroom}/questions', 'TvShowController@questions')->name('tvshow.questions');
    Route::post('/questions', 'TvShowController@classroomsQuestions')->name('tvshow.classroomsQuestions');
});

Route::group(['middleware' => 'can:finish class'], function () {
    Route::get('classroom/{classroom}/finish', 'ClassroomController@finish')->name('classroom.finish');
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {

    Route::get('users/create', 'UserController@adminCreate')->name('admin.create.user');
    Route::post('users/create', 'UserController@adminStore')->name('admin.store.user');
    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/loginas/{user}', 'UserController@LoginAs')->name('users.LoginAs');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::post('users/{user}/edit', 'UserController@update')->name('users.update');
    Route::get('users/{user}/destroy', 'UserController@destroy')->name('users.destroy');
    Route::get('users/search', 'UserController@search')->name('admin.search.user');
    Route::get('users/export', 'UserController@userExcel')->name('admin.userExcel');
    Route::post('users/importAdmin/', 'UserController@importAdminUser')->name('admin.importAdminUser');
    Route::post('users/importOldUser/', 'UserController@importOldUser')->name('admin.importOldUser');

    Route::get('roles', 'RoleController@index')->name('roles.index');
    Route::post('roles', 'RoleController@store')->name('roles.store');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
    Route::post('roles/{role}/update', 'RoleController@update')->name('roles.update');
    Route::get('roles/{role}/destroy', 'RoleController@destroy')->name('roles.destroy');

    Route::get('permissions', 'PermissionController@index')->name('permissions.index');
    Route::post('permissions', 'PermissionController@store')->name('permissions.store');
    Route::get('permissions/{permission}/destroy', 'PermissionController@destroy')->name('permissions.destroy');

    Route::get('tags', 'TagController@index')->name('tags.index');
    Route::post('tags', 'TagController@store')->name('tags.store');
    Route::get('tags/{tag}/destroy', 'TagController@destroy')->name('tags.destroy');
    
    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::post('categories', 'CategoryController@store')->name('categories.store');
    Route::get('categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::post('categories/{category}/update', 'CategoryController@update')->name('categories.update');
    Route::get('categories/{category}/destroy', 'CategoryController@destroy')->name('categories.destroy');

    Route::resource('player', 'PlayerController');

    Route::get('absencedelete', 'AbsenceController@absencedelete');

    Route::resource('booklet', 'BookletController');
    Route::get('booklet/course/{course}/list', 'BookletController@indexCourse')->name('booklet.indexCourse');
    Route::post('booklet/course/{course}/store', 'BookletController@courseStore')->name('booklet.courseStore');

    Route::resource('course', 'CourseController');
    Route::get('{course}/destroy', 'CourseController@destroy')->name('destroy.course');
    Route::get('course/{course}/student/excel', 'CourseController@courseStudent')->name('course.courseStudent');
    Route::get('course/{course}/student', 'CourseController@courseStudentList')->name('course.courseStudentList');
    Route::get('course/{course}/code', 'CourseController@courseCodeList')->name('course.courseCodeList');
    Route::get('course/{course}/{user}', 'CourseController@courseStudentDeleteAdmin')->name('course.courseStudentDeleteAdmin');
    Route::post('course/{course}/addStudent', 'CourseController@courseStudentAddAdmin')->name('course.courseStudentAddAdmin');
    Route::post('course/{course}/createStudent', 'CourseController@courseStudentCreateAdmin')->name('course.courseStudentCreateAdmin');
    Route::post('course/{course}/createCode', 'CourseController@courseCodeCreateAdmin')->name('course.courseCodeCreateAdmin');
    Route::post('course/{course}/importUser', 'CourseController@importUser')->name('course.importUser');
    Route::get('courses/search', 'CourseController@adminSearch')->name('admin.search.course');
    Route::get('{course}/complete', 'CourseController@complete')->name('course.complete');
    Route::get('course/{course}/code/delete', 'CourseController@deleteCode')->name('course.deleteCode');
    
    Route::get('{course}/course/calssrooms', 'ClassroomController@courseClassroom')->name('classroom.courseClassroom');
    Route::get('/calssrooms/{classroom}', 'ClassroomController@destroy')->name('classroom.destroy');
    Route::post('{course}/classroom/store', 'ClassroomController@storeForCourse')->name('classroom.storeForCourse');
    Route::post('{course}/{classroom}/LiveOrArchive', 'ClassroomController@LiveOrArchive')->name('classroom.LiveOrArchive');
    Route::get('classroom/{classroom}/question', 'QuestionController@indexClassroom')->name('question.indexClassroom');
    Route::get('classroom/{classroom}/absence', 'AbsenceController@classroomAbsence')->name('classroom.absence');
    Route::get('classroom/{classroom}/edit', 'ClassroomController@edit')->name('classroom.edit');
    Route::post('classroom/{classroom}/edit', 'ClassroomController@update')->name('classroom.update');

    Route::get('notif', 'NotifController@index')->name('notif.index');
    Route::post('/notif/store', 'NotifController@store')->name('notif.store');
    Route::get('/notif/{id}/edit', 'NotifController@edit')->name('notif.edit');
    Route::post('/notif/{id}/update', 'NotifController@update')->name('notif.update');
    Route::get('/notif/{id}/destroy', 'NotifController@destroy')->name('notif.delete');
    
    Route::get('/tasks/destroy/{task}', 'TaskController@destroy')->name('tasks.delete');
    Route::resource('tasks', 'TaskController');

    Route::get('payments', 'PaymentController@adminIndex')->name('admin.payment.index');
    
    Route::get('/dashboard/admin', 'AdminController@dashboard')->name('admin.dashboard');
    
    Route::get('/question/{question}', 'QuestionController@destroy')->name('question.destroy');
    
    Route::get('/bbb', 'BigBlueButtonController@index')->name('bbb.index');
    
    Route::get('/resize', 'AdminController@imageresize')->name('admin.imageresize');
    
    Route::get('/twofactor', 'AdminController@twofactor')->name('admin.twofactor');
    
    Route::get('/kavimo', 'AdminController@kavimo')->name('admin.kavimo');

    Route::get('/upload', 'AdminController@upload')->name('admin.upload');
    Route::post('/upload', 'AdminController@uploadStore')->name('admin.upload.store');
    
    Route::get('/calendar', 'AdminController@calendar')->name('admin.calendar');

    Route::get('/livecheck', 'AdminController@livecheck')->name('admin.livecheck');

    Route::get('/invoiceCreate', 'AdminController@invoiceCreate')->name('admin.invoiceCreate');
    Route::post('/invoiceDemo', 'AdminController@invoiceDemo')->name('admin.invoiceDemo');

    Route::get('/noneposter', 'CourseController@noneposter')->name('admin.noneposter');
});


Route::group(['prefix' => 'file'], function () {
    Route::get('/create', 'FileController@create')->name('file.create');
    Route::post('', 'FileController@new')->name('file.new');
    Route::get('files', 'FileController@index')->name('files');
    Route::get('{file}', 'FileController@show')->name('file.show');
    Route::get('delete/{file}', 'FileController@delete')->name('file.delete');
});
