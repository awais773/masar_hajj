<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Group;
use App\Models\CompanyUser;
use App\Models\Guide;
use App\Models\User;
use App\Models\RegistrationRequest;
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
        // $groups=Group::count();
        $groups = User::where('type', '0')->count();
        $guides=Guide::count();
        $companyUsers=CompanyUser::count();
        $request = RegistrationRequest:: where('request_status','0')->count();
        $approved = RegistrationRequest:: where('request_status','1')->count();
        $rejected = RegistrationRequest:: where('request_status','3')->count();
        $companiesByCountry = User::groupBy('country_name')
        ->selectRaw('country_name, count(*) as count')
        ->orderBy('count', 'desc')
        ->get();

    $totalRequests = $request + $approved + $rejected;
    $requestPercentage = $totalRequests > 0 ? ($request / $totalRequests) * 100 : 0;
    $approvedPercentage = $totalRequests > 0 ? ($approved / $totalRequests) * 100 : 0;
    $rejectedPercentage = $totalRequests > 0 ? ($rejected / $totalRequests) * 100 : 0;

    return view('admin.dashboard', compact('companiesByCountry','groups', 'guides', 'companyUsers', 'request', 'approved', 'rejected', 'requestPercentage', 'approvedPercentage', 'rejectedPercentage'));
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
