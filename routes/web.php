<?php
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
Auth::routes();
Artisan::call('cache:clear');

Route::get('/', function () {
    return view('dashboard');
})->name('home')->middleware('auth');

Route::get('login','LoginController@login')->name('login');
Route::post('login','LoginController@login_validation');
Route::get('employees','EmployeesController@index')->middleware('auth');
Route::match(['get', 'post'],'employees/create','EmployeesController@create')->middleware('auth');
Route::get('employees/{emp_id}','EmployeesController@showEmployee')->middleware('auth');

Route::get('profile', 'profileController@profileview')->middleware('auth');
Route::post('profile/saveProfile', 'profileController@updateProfile')->middleware('auth');

Route::get('dashboard','DashboardController@dashboard')->middleware('auth');

Route::get('projects','ProjectsController@index')->middleware('auth');
Route::post('project/create','ProjectsController@create')->middleware('auth');
Route::get('myprojects','ProjectsController@myprojects')->middleware('auth');

Route::get('mytasks','TasksController@mytasks')->middleware('auth'); //8/24/2017
Route::get('tasks','TasksController@TeamLeaderTasks')->middleware('auth');
Route::get('tasks/{id}','TasksController@project_task')->middleware('auth');
Route::post('task/create/{id}','TasksController@create')->middleware('auth');
Route::post('attension/create','TasksController@attension')->middleware('auth');

Route::get('teams','TeamsController@index')->middleware('auth');
Route::get('myteam','TeamsController@myteam')->middleware('auth');
Route::post('team/create','TeamsController@create')->middleware('auth');

Route::get('permissions','PermissionController@index')->middleware('auth');
Route::get('performance','PerformanceController@index')->middleware('auth');
Route::post('apply/permission','PermissionController@apply_permission')->middleware('auth');
Route::post('apply/leave','PermissionController@apply_leave')->middleware('auth');

Route::get('punchings','PunchingController@index')->middleware('auth');
Route::post('punchings','PunchingController@index')->middleware('auth');
Route::get('approvels','ApprovelsController@index')->middleware('auth');
Route::get('approvels/leaves','ApprovelsController@leaves_approvel')->middleware('auth');
Route::get('approvels/permission','ApprovelsController@permission_approvel')->middleware('auth');

Route::get('clients','ClientController@index')->middleware('auth');

/*
 * Api call
 */
Route::get('/logout','LoginController@logout');

Route::get('/api/roles','RolesController@allroles');

Route::get('/api/employee','EmployeesController@all_employees');
Route::get('/api/user/getuser/{id}','EmployeesController@employeeedit');
Route::get('/api/user/delete/{id}','EmployeesController@employee_delete');
//8/8/2017
Route::get('/api/client/getclient/{id}','ClientController@edit');
Route::post('/api/client/save','ClientController@save');



Route::get('/api/project','ProjectsController@all_projects');
Route::get('/api/projects/edit/{proj_id}','ProjectsController@projectedit');
Route::get('/api/project/delete/{id}','ProjectsController@project_delete');
Route::get('/api/project/details/{id}','ProjectsController@projectdetails');
Route::get('/api/status','ProjectsController@project_status');

Route::get('/api/team/teamlist','TeamsController@allteams');
Route::get('/api/team/edit/{team_id}','TeamsController@teamedit');
Route::get('/api/team/team-leaders','TeamsController@teamleaders');
Route::get('/api/team/team-members','TeamsController@teammembers');
Route::get('/api/team/delete/{id}','TeamsController@team_delete');
//Route::get('/api/teams','TeamsController@allteam');

Route::get('/api/task','TasksController@all_tasks');
Route::get('/api/edittask/{id}','TasksController@edit_task');
Route::get('/api/task/delete/{id}','TasksController@task_delete');
Route::get('/api/task/details/{id}','TasksController@taskdetails');
Route::get('/api/task/attension/{id}','TasksController@attensiondetails');
/*Route::post('/api/task/save','TasksController@attension');*/

Route::get('/api/priority','TasksController@priority');
Route::get('/api/task_type','TasksController@task_type');

Route::get('/api/role/rolelist','PermissionController@allroles');
Route::get('/api/performance/performance_list','PerformanceController@performancedtails');

Route::get('/api/leave/types','PermissionController@leave_types');
Route::get('/api/permission/types','PermissionController@permission_types');
Route::get('/api/leave/status','PermissionController@leave_stats');
Route::get('/api/permission/edit/{pid}','PermissionController@permission_edit');
Route::get('/api/permission/delete/{pid}','PermissionController@permission_del');

Route::get('/api/performance/starttime','PerformanceController@starttime');
Route::get('/api/performance/endtime','PerformanceController@stoptheday');




