<?php

namespace App\Http\Controllers\admin\dashboard;

use App\core\member\MemberInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // private $memberInterface;
    // public function __construct( MemberInterface $memberInterface){
    //     $this->memberInterface = $memberInterface;
    // }
    public function dashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    public function leads($page)
    {
        if($page == 'membership') $data['leads'] = User::where('page', 'membership')->get();
        return view('admin.dashboard.leads', $data);
    }
    
}
