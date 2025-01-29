<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enquery;
use App\Models\Product;
use App\Models\Program;
use App\Models\User;
use App\Models\Member;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    function index()
    {
        $seo = Seo::where('page_name', '=', 'home')->first();
        return view('frontend.index', compact('seo'));
    }
    function ourvision()
    {
        $seo = Seo::where('page_name', '=', 'our-vision')->first();
        return view('frontend.our-vision', compact('seo'));
    }
    public function program($slug)
    {

        $program = Program::where('slug', $slug)->first();
        $seo = $program;

        return view('frontend.program', compact('program', 'seo'));
    }

    function ourteam()
    {
        $member = Member::get();
        $seo = Seo::where('page_name', '=', 'our-team')->first();

        return view('frontend.our-team', compact('member', 'seo'));
    }

    function donatenow()
    {
        $seo = Seo::where('page_name', '=', 'home')->first();
        return view('donatenow', compact('seo'));
    }

    function store($slug = null)
    {
        if ($slug) {
            $product = Product::where('slug', $slug)->first();
            $seo = $product;
            return view('frontend.single-store', compact('slug', 'product', 'seo'));
        }

        $seo = Seo::where('page_name', '=', 'store')->first();

        $products = Product::orderBy('id', 'desc')->get();

        return view('frontend.store', compact('products', 'seo'));
    }

    function enrollment()
    {
        $seo = Seo::where('page_name', '=', 'enrollment')->first();
        return view('frontend.enrollment', compact('seo'));
    }

    function membership()
    {
        $seo = seo::where('page_name', '=', 'membership')->first();
        return view('frontend.membership', compact('seo'));
    }

    function contactus()
    {
        $seo = Seo::where('page_name', '=', 'contact')->first();
        return view('frontend.contactus', compact('seo'));
    }

    function donate()
    {
        $seo = Seo::where('page_name', '=', 'donate')->first();
        return view('frontend.donate', compact('seo'));
    }

    function leadCreate(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:15', // Assuming a max length for phone number
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:500',
        ]);
        $data = $request->only("first_name", "last_name", "email", "phone", "subject", "message", "page");
        $data['type'] = '0';
        $user = Enquery::create($data);
        if ($user instanceof Enquery) {

            return response()->json([
                "status" => "success",
                "toUrl" => route($request->input('page')),
                "msg" => "You successfully registered as a member, we will contact you shortly!"
            ]);
        }

        return response()->json([
            "status" => "error",
            "msg" => "Some error occurred."
        ], 500);
    }
    public function contactdata(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:15', // Assuming a max length for phone number
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:500',
        ]);
        $data = $request->only("first_name", "last_name", "email", "phone", "subject", "message", "page");
        $data['type'] = '1';
        $data['subject'] = 'null';
        $user = Enquery::create($data);
        if ($user instanceof Enquery) {

            return response()->json([
                "status" => "success",
                "toUrl" => route($request->input('page')),
                "msg" => "You successfully registered as a member, we will contact you shortly!"
            ]);
        }

        return response()->json([
            "status" => "error",
            "msg" => "Some error occurred."
        ], 500);
    }
}
