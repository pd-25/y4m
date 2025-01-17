<?php

namespace App\Http\Controllers\admin\teamMember;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class teamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = Member::all();
        return view('admin.member.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $path = $request->file('image')->store('team-members', 'public');

        Member::create([
            'image' => $path,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('team-members.index')->with('msg', 'Team Member added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $teamMember)
    {
        return view('team-members.show', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $teamMember)
    {
        return view('admin.member.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $teamMember)
    {
        // Validate the incoming request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            
            // Store the new image and update the image field
            $teamMember->image = $request->file('image')->store('team-members', 'public');
        }
    
        // Update the other fields
        $teamMember->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        // Redirect with a success message
        return redirect()->route('team-members.index')->with('msg', 'Team Member updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }
        $teamMember->delete();
        return redirect()->route('team-members.index')->with('msg', 'Team Member deleted successfully.');
    }
}
