<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    function index()
    {
        return view('frontend.index');
    }
    function ourvision()
    {
        return view('frontend.our-vision');
    }

    function singleprogram($slug)
    {
        return view('frontend.single-program', compact('slug'));
    }

    function ourteam()
    {
        return view('frontend.our-team');
    }

    function store($slug = null)
    {
        if ($slug) {
            return view('frontend.single-store', compact('slug'));
        }
        return view('frontend.store');
    }

    function enrollment()
    {
        return view('frontend.enrollment');
    }

    function membership()
    {
        return view('frontend.membership');
    }

    function contactus()
    {
        return view('frontend.contactus');
    }

    function donate()
    {
        return view('frontend.donate');
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
        $data['password'] = Hash::make('12345');
        $user = User::create($data);
        if ($user instanceof User) {

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
