<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\CompanyUser;
use App\Models\Guide;
use Auth;
class CompanyHomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        try {
            $this->middleware('auth:api');
        } catch (\Throwable $th) {
          //  dd($th->getMessage());
            return response()->json(['error'=>$th->getMessage()]);
        }
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {   
        $groups=Group::where('company_id',Auth::id())->count();
        $guides=Guide::where('company_id',Auth::id())->count();
        $companyUsers=CompanyUser::where('company_id',Auth::id())->count();
        return response()->json(['groups' => $groups,"guides"=>$guides,"companyUsers"=>$companyUsers,'status' => 'success',]);
    } 
  
   
}
