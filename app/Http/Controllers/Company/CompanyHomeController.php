<?php

namespace App\Http\Controllers\Company;

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
        $this->middleware('auth:web');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(Request $request): View
    {   
        $groups=Group::where('company_id',Auth::id())->count();
        $guides=Guide::where('company_id',Auth::id())->count();
        $companyUsers=CompanyUser::where('company_id',Auth::id())->count();
        $allMonths = range(1, 12);

        // Retrieve user counts for each month, including zero counts
        $usersByMonth = CompanyUser::where('company_id',Auth::id())->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupByRaw('MONTH(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->pluck('total', 'month')
            ->toArray();

        // Fill in zero counts for months without user creations
        $userCounts = array_map(function ($month) use ($usersByMonth) {
            return $usersByMonth[$month] ?? 0;
        }, $allMonths);

        // Label months
        $monthLabels = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $labels = array_map(function ($month) use ($monthLabels) {
            return $monthLabels[$month - 1];
        }, $allMonths);

        $values = array_values($userCounts);


        return view('company.dashboard',compact('labels', 'values','groups','guides','companyUsers'));
    } 



  
   
}
