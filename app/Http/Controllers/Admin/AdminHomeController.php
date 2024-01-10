<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\CompanyUser;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(): View
    {
        $groups=Group::count();
        $guides=Guide::count();
        $companyUsers=CompanyUser::count();
        return view('admin.dashboard',compact('groups','guides','companyUsers'));
    }

      
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminMap(Request $request): View
    {   
        return view('admin.map');
    } 
  
}
