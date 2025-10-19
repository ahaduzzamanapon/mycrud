<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\SalesController;

Auth::routes(['register' => false]);

// login2, register2 pages
Route::view('login2', 'auth.login2');
Route::view('login3', 'auth.login3');
Route::view('register2', 'auth.register2');
Route::view('register3', 'auth.register3');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/books', function () {
    return view('books');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/branches', function () {
    return view('branches');
});

Route::get('/batch-schedule', function () {
    return view('batch-schedule');
});

Route::get('/blogs', function () {
    return view('blogs');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});



// GUI crud builder routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

    // Model checking
    Route::post('tableCheck', 'AppBaseController@tableCheck');

    include 'web_builder.php';

});
Route::get('empty_table', 'JoshController@emptyTable');
Route::get('remove_all_files', 'JoshController@remove_all_files');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('{name?}', 'JoshController@showView');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:web'], function(){
    Route::resource('employees', App\Http\Controllers\Admin\EmployeeController::class);
    Route::get('attendance/create', [App\Http\Controllers\Admin\AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('attendance', [App\Http\Controllers\Admin\AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('attendance/report', [App\Http\Controllers\Admin\AttendanceController::class, 'report'])->name('attendance.report');
    Route::post('attendance/report', [App\Http\Controllers\Admin\AttendanceController::class, 'report']);
    Route::resource('ledgers', App\Http\Controllers\Admin\LedgerController::class);
    Route::get('transactions/create', [App\Http\Controllers\Admin\TransactionController::class, 'create'])->name('transactions.create');
    Route::post('transactions', [App\Http\Controllers\Admin\TransactionController::class, 'store'])->name('transactions.store');
    Route::get('reports/accounts', [App\Http\Controllers\Admin\AccountReportController::class, 'report'])->name('reports.accounts');
    Route::post('reports/accounts', [App\Http\Controllers\Admin\AccountReportController::class, 'report']);
    Route::resource('courses', App\Http\Controllers\Admin\CourseController::class);
    Route::resource('batches', App\Http\Controllers\Admin\BatchController::class);
    Route::get('students', [App\Http\Controllers\Admin\StudentListController::class, 'index'])->name('students.index');
    Route::get('students/{student}/manage-batches', [App\Http\Controllers\Admin\StudentListController::class, 'manage'])->name('students.manage_batches');
    Route::post('students/{student}/assign-batches', [App\Http\Controllers\Admin\StudentListController::class, 'assignBatches'])->name('students.assign_batches');
    Route::get('reports/students', [App\Http\Controllers\Admin\StudentListController::class, 'report'])->name('reports.students');
    Route::post('reports/students', [App\Http\Controllers\Admin\StudentListController::class, 'report']);
    Route::resource('payment_methods', App\Http\Controllers\Admin\PaymentMethodController::class);
    Route::get('enrollments', [App\Http\Controllers\Admin\EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('enrollments/{enrollment}/approve', [App\Http\Controllers\Admin\EnrollmentController::class, 'approve'])->name('enrollments.approve');
    Route::post('enrollments/{enrollment}/reject', [App\Http\Controllers\Admin\EnrollmentController::class, 'reject'])->name('enrollments.reject');
    Route::match(['get', 'post'], 'enrolled-students', [App\Http\Controllers\Admin\StudentListController::class, 'enrolledStudents'])->name('students.enrolled_list');
});

Route::group(['prefix' => 'student', 'as' => 'student.'], function(){
    Route::get('/login', [App\Http\Controllers\Student\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Student\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Student\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [App\Http\Controllers\Student\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Student\Auth\RegisterController::class, 'register']);
    Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [App\Http\Controllers\Student\StudentController::class, 'courses'])->name('courses');
    Route::get('/profile', [App\Http\Controllers\Student\StudentController::class, 'profile'])->name('profile');
    Route::get('/settings', [App\Http\Controllers\Student\StudentController::class, 'settings'])->name('settings');
    Route::post('/profile', [App\Http\Controllers\Student\StudentController::class, 'update'])->name('profile.update');
    Route::get('/enroll', [App\Http\Controllers\Student\EnrollmentController::class, 'create'])->name('enroll.create');
    Route::post('/enroll', [App\Http\Controllers\Student\EnrollmentController::class, 'store'])->name('enroll.store');
});


