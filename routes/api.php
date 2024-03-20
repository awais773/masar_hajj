<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Admin\AdminHomeController;
use App\Http\Controllers\Api\Admin\AdminCompanyController;
use App\Http\Controllers\Api\Admin\AdminHajjProcedureController;
use App\Http\Controllers\Api\Admin\AdminDuaController;
use App\Http\Controllers\Api\Admin\AdminRegistrationRequestController;
use App\Http\Controllers\Api\Admin\AdminSurveyControlller;
use App\Http\Controllers\Api\Admin\AdminNotificationController;
use App\Http\Controllers\Api\Company\CompanyHomeController;
use App\Http\Controllers\Api\Company\CompanyGuideController;
use App\Http\Controllers\Api\Company\CompanyUserController;
use App\Http\Controllers\Api\Company\CompanyResidenceController;
use App\Http\Controllers\Api\Company\CompanyGroupController;
use App\Http\Controllers\Api\Admin\SurveyController;
use App\Http\Controllers\Api\Admin\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register'])->name('api.register');
    Route::post('login', [AuthController::class,'login'])->name('api.login');
    Route::middleware('jwt.auth')->post('logout', 'AuthController@logout')->name('api.logout');
    Route::middleware('auth')->post('refresh', 'AuthController@refresh')->name('api.refresh');
    Route::middleware('jwt.auth')->post('me', 'AuthController@me')->name('api.me');

    Route::post('loginUser', [AuthController::class,'loginUser']);
    Route::post('loginGuide', [AuthController::class,'loginGuide']);
    Route::post('userLocationEdit/{id}', [AuthController::class,'userLocationEdit']);
    Route::post('GuideLocationEdit/{id}', [AuthController::class,'GuideLocationEdit']);
    Route::post('addLocation', [AuthController::class,'addLocation']);
    Route::get('hajjProcedure/{id}', [AuthController::class,'hajjProcedure']);

});

/*------------------------------------------
--------------------------------------------
All company Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth:api', 'company-access'])->group(function () {
    Route::get('/company/dashboard', [CompanyHomeController::class, 'dashboard'])->name('company.home');
      // hajj procedure
      Route::get('company/guide', [CompanyGuideController::class, 'index'])->name('company.guide');
      Route::post('company/guide/store', [CompanyGuideController::class, 'store'])->name('company.guide.store');
      Route::get('company/guide/delete/{id}', [CompanyGuideController::class, 'delete'])->name('company.guide.delete');
      Route::get('company/guide/edit/{id}', [CompanyGuideController::class, 'edit'])->name('company.guide.edit');
      Route::post('company/guide/update/{id}', [CompanyGuideController::class, 'update'])->name('company.guide.update');

       // user
       Route::get('company/users', [CompanyUserController::class, 'index'])->name('company.user');
       Route::post('company/user/store', [CompanyUserController::class, 'store'])->name('company.user.store');
       Route::get('company/user/delete/{id}', [CompanyUserController::class, 'delete'])->name('company.user.delete');
       Route::get('company/user/edit/{id}', [CompanyUserController::class, 'edit'])->name('company.user.edit');
       Route::post('company/user/update/{id}', [CompanyUserController::class, 'update'])->name('company.user.update');

        // residence
        Route::get('company/residence', [CompanyResidenceController::class, 'index'])->name('company.residence');
        Route::post('company/residence/store', [CompanyResidenceController::class, 'store'])->name('company.residence.store');
        Route::get('company/residence/delete/{id}', [CompanyResidenceController::class, 'delete'])->name('company.residence.delete');
        Route::get('company/residence/edit/{id}', [CompanyResidenceController::class, 'edit'])->name('company.residence.edit');
        Route::post('company/residence/update/{id}', [CompanyResidenceController::class, 'update'])->name('company.residence.update');

         // Group
         Route::get('company/group', [CompanyGroupController::class, 'index'])->name('company.group');
         Route::post('company/group/store', [CompanyGroupController::class, 'store'])->name('company.group.store');
         Route::get('company/group/delete/{id}', [CompanyGroupController::class, 'delete'])->name('company.group.delete');
         Route::get('company/group/edit/{id}', [CompanyGroupController::class, 'edit'])->name('company.group.edit');
         Route::post('company/group/update/{id}', [CompanyGroupController::class, 'update'])->name('company.group.update');
         //
         Route::get('company/mecca-hotels', [CompanyGroupController::class, 'mecca_hotels'])->name('company.mecca_hotels');
         Route::get('company/city-hotels', [CompanyGroupController::class, 'city_hotels'])->name('company.city_hotels');
         Route::get('company/minas', [CompanyGroupController::class, 'minas'])->name('company.minas');
         Route::get('company/arafats', [CompanyGroupController::class, 'arafats'])->name('company.arafats');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth:api', 'admin-access'])->group(function () {

    Route::get('/admin/dashboard', [AdminHomeController::class, 'dashboard'])->name('admin.home');
    // Route::get('admin/map/view', [AdminHomeController::class, 'adminMap'])->name('admin.map');
    //company
    Route::get('admin/company', [AdminCompanyController::class, 'index'])->name('admin.company.index');
    Route::post('admin/company/store', [AdminCompanyController::class, 'store'])->name('admin.company.store');
    Route::get('admin/company/delete/{id}', [AdminCompanyController::class, 'delete'])->name('admin.company.delete');
    Route::get('admin/company/edit/{id}', [AdminCompanyController::class, 'edit'])->name('admin.company.edit');
    Route::post('admin/company/update/{id}', [AdminCompanyController::class, 'update'])->name('admin.company.update');
    Route::get('admin/company/user/{id}', [AdminCompanyController::class, 'companyUser'])->name('admin.company.user');
    Route::get('admin/company/user/delete/{id}', [AdminCompanyController::class, 'companyUserdelete'])->name('admin.company.user.delete');

    // hajj procedure
    Route::get('admin/hajjprocedure', [AdminHajjProcedureController::class, 'index'])->name('admin.hajjprocedure.index');
    Route::post('admin/hajjprocedure/store', [AdminHajjProcedureController::class, 'store'])->name('admin.hajjprocedure.store');
    Route::get('admin/hajjprocedure/delete/{id}', [AdminHajjProcedureController::class, 'delete'])->name('admin.hajjprocedure.delete');
    Route::get('admin/hajjprocedure/edit/{id}', [AdminHajjProcedureController::class, 'edit'])->name('admin.hajjprocedure.edit');
    Route::post('admin/hajjprocedure/update/{id}', [AdminHajjProcedureController::class, 'update'])->name('admin.hajjprocedure.update');
    //notification
    // Route::get('admin/notification', [AdminNotificationController::class, 'index'])->name('admin.notification');
    Route::post('admin/notification/store', [AdminNotificationController::class, 'store'])->name('admin.notification.store');
});

  // hajj procedure
  Route::get('admin/registrationRequest', [AdminRegistrationRequestController::class, 'index'])->name('admin.registrationRequest');
  Route::get('admin/registrationRequest/approved', [AdminRegistrationRequestController::class, 'approved'])->name('admin.registrationRequest.approved');
  Route::get('admin/registrationRequest/reject', [AdminRegistrationRequestController::class, 'reject'])->name('admin.registrationRequest.reject');
  Route::post('admin/registrationRequest/store', [AdminRegistrationRequestController::class, 'store'])->name('admin.registrationRequest.store');
  Route::get('admin/registrationRequest/delete/{id}', [AdminRegistrationRequestController::class, 'delete'])->name('admin.registrationRequest.delete');
  Route::get('admin/registrationRequest/update/{id}/{status}', [AdminRegistrationRequestController::class, 'update'])->name('admin.registrationRequest.update');

   // dua
   Route::get('admin/dua/{id}', [AdminDuaController::class, 'index']);
   Route::post('admin/dua/store', [AdminDuaController::class, 'store'])->name('admin.dua.store');
   Route::get('admin/dua/delete/{id}', [AdminDuaController::class, 'delete'])->name('admin.dua.delete');
   Route::get('admin/dua/edit/{id}', [AdminDuaController::class, 'edit'])->name('admin.dua.edit');
   Route::post('admin/dua/update/{id}', [AdminDuaController::class, 'update'])->name('admin.dua.update');

    // dua
    Route::get('admin/survey', [AdminSurveyControlller::class, 'index'])->name('admin.survey');
    Route::get('admin/survey/detail/{id}', [AdminSurveyControlller::class, 'survayDetail'])->name('admin.survey.survayDetail');
    Route::post('admin/survey/store', [AdminSurveyControlller::class, 'store'])->name('admin.survey.store');
    Route::get('admin/survey/delete/{id}', [AdminSurveyControlller::class, 'delete'])->name('admin.survey.delete');
    Route::get('admin/survey/edit/{id}', [AdminSurveyControlller::class, 'edit'])->name('admin.survey.edit');
    Route::post('admin/survey/update/{id}', [AdminSurveyControlller::class, 'update'])->name('admin.survey.update');

// New Api
Route::get('admin/survey/{id}', [SurveyController::class, 'survey']);
Route::post('admin/company/user/{id}', [SurveyController::class, 'user_update_password']);
Route::post('admin/guide/user/{id}', [SurveyController::class, 'guide_update_password']);
Route::get('guide/user/{id}', [SurveyController::class, 'guide_get']);
Route::get('company/user/{id}', [SurveyController::class, 'company_get']);
Route::post('guide/update/image/{id}', [SurveyController::class, 'guide_update_image']);
Route::post('user/update/image/{id}', [SurveyController::class, 'user_update_image']);

Route::get('customer/location/{id}', [AuthController::class, 'custom_location']);
// Today Api
Route::get('user/guide/{id}', [SurveyController::class, 'guide_id_user']);
Route::post('group/member', [SurveyController::class, 'group_member']);
// Survey Submit

// Route::post('survey/submit', [SurveyController::class, 'survey_submit']);
Route::get('user/guide/company/{id}', [SurveyController::class, 'guide_user']);
Route::delete('customer/location/delete/{id}', [SurveyController::class, 'custom_location_del']);
//  search Api
Route::get('search/user/{id}', [SurveyController::class, 'search_user']);

Route::get('company/user/guide/{id}', [SurveyController::class, 'guide_get']);
Route::post('surveysubmit', [SurveyController::class, 'surveysubmit']);
Route::get('duaGet', [SurveyController::class, 'duaGet']);
Route::get('NotificationGet/{id}', [SurveyController::class, 'NotificationGet']);


