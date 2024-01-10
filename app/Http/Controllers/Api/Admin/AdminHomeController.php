<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\CompanyUser;
use App\Models\Guide;
use Auth;
class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $groups=Group::count();
        $guides=Guide::count();
        $companyUsers=CompanyUser::count();
        return response()->json(['groups' => $groups,'groups'=>$guides,'companyUsers'=>$companyUsers, 'status' => 'success']);
    }

}
