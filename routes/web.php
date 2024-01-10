<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminHajjProcedureController;
use App\Http\Controllers\Admin\AdminDuaController;
use App\Http\Controllers\Admin\AdminRegistrationRequestController;
use App\Http\Controllers\Admin\AdminSurveyControlller;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Company\CompanyHomeController;
use App\Http\Controllers\Company\CompanyGuideController;
use App\Http\Controllers\Company\CompanyUserController;
use App\Http\Controllers\Company\CompanyResidenceController;
use App\Http\Controllers\Company\CompanyGroupController;
use App\Http\Controllers\Company\CompanyAdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CommanController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\LogoutController;
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
  
Route::get('/', function () {
    return view('website.index');
});
  
Route::get('/profileCompany', function () {
  return view('company.admin.companyProfile');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth:web','admin-access'])->group(function () {
  
    Route::get('/admin/dashboard', [AdminHomeController::class, 'dashboard'])->name('admin.home');
    Route::get('admin/map/view', [AdminHomeController::class, 'adminMap'])->name('admin.map');
    //company
    Route::get('admin/company', [AdminCompanyController::class, 'index'])->name('admin.company.index');
    Route::get('admin/company/add', [AdminCompanyController::class, 'add'])->name('admin.company.add');
    Route::post('admin/company/store', [AdminCompanyController::class, 'store'])->name('admin.company.store');
    Route::get('admin/company/delete/{id}', [AdminCompanyController::class, 'delete'])->name('admin.company.delete');
    Route::get('admin/company/edit/{id}', [AdminCompanyController::class, 'edit'])->name('admin.company.edit');
    Route::post('admin/company/update/{id}', [AdminCompanyController::class, 'update'])->name('admin.company.update');
    Route::get('admin/company/user/{id}', [AdminCompanyController::class, 'companyUser'])->name('admin.company.user');
    Route::get('admin/company/user/delete/{id}', [AdminCompanyController::class, 'companyUserdelete'])->name('admin.company.user.delete');

    // // hajj procedure
    // Route::get('admin/hajjprocedure', [AdminHajjProcedureController::class, 'index'])->name('admin.hajjprocedure.index');
    // Route::get('admin/hajjprocedure/add', [AdminHajjProcedureController::class, 'add'])->name('admin.hajjprocedure.add');
    // Route::post('admin/hajjprocedure/store', [AdminHajjProcedureController::class, 'store'])->name('admin.hajjprocedure.store');
    // Route::get('admin/hajjprocedure/delete/{id}', [AdminHajjProcedureController::class, 'delete'])->name('admin.hajjprocedure.delete');
    // Route::get('admin/hajjprocedure/edit/{id}', [AdminHajjProcedureController::class, 'edit'])->name('admin.hajjprocedure.edit');
    // Route::post('admin/hajjprocedure/update/{id}', [AdminHajjProcedureController::class, 'update'])->name('admin.hajjprocedure.update');
    //notification
    Route::get('admin/notification', [AdminNotificationController::class, 'index'])->name('admin.notification');
    Route::post('admin/notification/store', [AdminNotificationController::class, 'store'])->name('admin.notification.store');
});

/*------------------------------------------
--------------------------------------------
All company Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth:web','company-access'])->group(function () {
    Route::get('/company/dashboard', [CompanyHomeController::class, 'dashboard'])->name('company.home');
      // hajj procedure
      Route::get('company/guide', [CompanyGuideController::class, 'index'])->name('company.guide');
      Route::get('company/guide/add', [CompanyGuideController::class, 'add'])->name('company.guide.add');
      Route::post('company/guide/store', [CompanyGuideController::class, 'store'])->name('company.guide.store');
      Route::get('company/guide/delete/{id}', [CompanyGuideController::class, 'delete'])->name('company.guide.delete');
      Route::get('company/guide/edit/{id}', [CompanyGuideController::class, 'edit'])->name('company.guide.edit');
      Route::post('company/guide/update/{id}', [CompanyGuideController::class, 'update'])->name('company.guide.update');

       // user
       Route::get('company/users', [CompanyUserController::class, 'index'])->name('company.user');
       Route::get('company/user/add', [CompanyUserController::class, 'add'])->name('company.user.add');
       Route::post('company/user/store', [CompanyUserController::class, 'store'])->name('company.user.store');
       Route::get('company/user/delete/{id}', [CompanyUserController::class, 'delete'])->name('company.user.delete');
       Route::get('company/user/edit/{id}', [CompanyUserController::class, 'edit'])->name('company.user.edit');
       Route::post('company/user/update/{id}', [CompanyUserController::class, 'update'])->name('company.user.update');

        // residence
        Route::get('company/residence', [CompanyResidenceController::class, 'index'])->name('company.residence');
        Route::get('company/residence/add', [CompanyResidenceController::class, 'add'])->name('company.residence.add');
        Route::post('company/residence/store', [CompanyResidenceController::class, 'store'])->name('company.residence.store');
        Route::get('company/residence/delete/{id}', [CompanyResidenceController::class, 'delete'])->name('company.residence.delete');
        Route::get('company/residence/edit/{id}', [CompanyResidenceController::class, 'edit'])->name('company.residence.edit');
        Route::post('company/residence/update/{id}', [CompanyResidenceController::class, 'update'])->name('company.residence.update');

        // Group
        Route::get('company/group', [CompanyGroupController::class, 'index'])->name('company.group');
        Route::get('company/group/add', [CompanyGroupController::class, 'add'])->name('company.group.add');
        Route::post('company/group/store', [CompanyGroupController::class, 'store'])->name('company.group.store');
        Route::get('company/group/delete/{id}', [CompanyGroupController::class, 'delete'])->name('company.group.delete');
        Route::get('company/group/edit/{id}', [CompanyGroupController::class, 'edit'])->name('company.group.edit');
        Route::post('company/group/update/{id}', [CompanyGroupController::class, 'update'])->name('company.group.update');

        // dua
        Route::get('company/dua', [AdminDuaController::class, 'index'])->name('company.dua');
        Route::get('company/dua/add', [AdminDuaController::class, 'add'])->name('company.dua.add');
        Route::post('company/dua/store', [AdminDuaController::class, 'store'])->name('company.dua.store');
        Route::get('company/dua/delete/{id}', [AdminDuaController::class, 'delete'])->name('company.dua.delete');
        Route::get('company/dua/edit/{id}', [AdminDuaController::class, 'edit'])->name('company.dua.edit');
        Route::post('company/dua/update/{id}', [AdminDuaController::class, 'update'])->name('company.dua.update');

        // survey
        Route::get('company/survey', [AdminSurveyControlller::class, 'index'])->name('company.survey');
        Route::get('company/survey/add', [AdminSurveyControlller::class, 'add'])->name('company.survey.add');
        Route::get('company/survey/detail/{id}', [AdminSurveyControlller::class, 'survayDetail'])->name('company.survey.survayDetail');
        Route::post('company/survey/store', [AdminSurveyControlller::class, 'store'])->name('company.survey.store');
        Route::get('company/survey/delete/{id}', [AdminSurveyControlller::class, 'delete'])->name('company.survey.delete');
        Route::get('company/survey/edit/{id}', [AdminSurveyControlller::class, 'edit'])->name('company.survey.edit');
        Route::post('company/survey/update/{id}', [AdminSurveyControlller::class, 'update'])->name('company.survey.update');

         // admins
         Route::get('company/admin', [CompanyAdminController::class, 'index'])->name('company.admin');
         Route::get('company/admin/add', [CompanyAdminController::class, 'add'])->name('company.admin.add');
         Route::post('company/admin/store', [CompanyAdminController::class, 'store'])->name('company.admin.store');
         Route::get('company/admin/delete/{id}', [CompanyAdminController::class, 'delete'])->name('company.admin.delete');
         Route::get('company/admin/edit/{id}', [CompanyAdminController::class, 'edit'])->name('company.admin.edit');
         Route::post('company/admin/update/{id}', [CompanyAdminController::class, 'update'])->name('company.admin.update');

          // hajj procedure
    Route::get('company/hajjprocedure', [AdminHajjProcedureController::class, 'index'])->name('admin.hajjprocedure.index');
    Route::get('company/hajjprocedure/add', [AdminHajjProcedureController::class, 'add'])->name('admin.hajjprocedure.add');
    Route::post('company/hajjprocedure/store', [AdminHajjProcedureController::class, 'store'])->name('admin.hajjprocedure.store');
    Route::get('company/hajjprocedure/delete/{id}', [AdminHajjProcedureController::class, 'delete'])->name('admin.hajjprocedure.delete');
    Route::get('company/hajjprocedure/edit/{id}', [AdminHajjProcedureController::class, 'edit'])->name('admin.hajjprocedure.edit');
    Route::post('company/hajjprocedure/update/{id}', [AdminHajjProcedureController::class, 'update'])->name('admin.hajjprocedure.update');
});


  // hajj procedure
  Route::get('admin/registrationRequest', [AdminRegistrationRequestController::class, 'index'])->name('admin.registrationRequest');
  Route::get('admin/registrationRequest/approved', [AdminRegistrationRequestController::class, 'approved'])->name('admin.registrationRequest.approved');
  Route::get('admin/registrationRequest/reject', [AdminRegistrationRequestController::class, 'reject'])->name('admin.registrationRequest.reject');
  Route::post('admin/registrationRequest/store', [AdminRegistrationRequestController::class, 'store'])->name('admin.registrationRequest.store');
  Route::get('admin/registrationRequest/delete/{id}', [AdminRegistrationRequestController::class, 'delete'])->name('admin.registrationRequest.delete');
  Route::get('admin/registrationRequest/update/{id}/{status}', [AdminRegistrationRequestController::class, 'update'])->name('admin.registrationRequest.update');


Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');
Route::get('common/groups_users_loc_xml', [CommanController::class, 'groups_users_location_xml'])->name('CommonGroupUserLocationsXml');
Route::post('common/update_groups_users_loc', [CommanController::class, 'groups_users_location_xml'])->name('CommonUpdate_groups_users_loc');
Route::get('common/groups/partialddl', [CommanController::class, 'GetGroupsForDDL'])->name('GetGroupsForDDL');
Route::get('arabic', [WebsiteController::class, 'arabic'])->name('arabic');


  
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
  /**
  * Logout Route
  */
  Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});
  
