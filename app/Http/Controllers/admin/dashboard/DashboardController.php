<?php

namespace App\Http\Controllers\admin\dashboard;

use App\core\member\MemberInterface;
use App\Http\Controllers\Controller;
use App\Models\Enquery;
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
        if($page == 'membership') $data = Enquery::where('type', '0')->get();
        if($page == 'contacts') $data = Enquery::where('type', '1')->get();

        

        return view('admin.dashboard.leads', compact('data'));
    }
    public function leadsdestory($id){
        $data = Enquery::where('id', $id)->first();
        if ($data) {
            // Delete the lead
            $data->delete();
        }
        return redirect()->back()->with('msg','Lead deleted successfully!');
        
    }
    
}
