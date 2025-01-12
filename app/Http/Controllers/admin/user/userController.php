<?php

namespace App\Http\Controllers\admin\user;

use App\Core\user\userInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public $userInterface;
    public function __construct(userInterface $userInterface){
        $this->userInterface = $userInterface;
    }
    public function index()
    {
        $users = $this->userInterface->getAllUser();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */public function edit($id)
{
    $user = $this->userInterface->getUserById($id);
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'username' => 'required|string|max:255',
        'phone' => 'nullable|string|max:15',
    ]);

    $data = $request->only(['name', 'email', 'username', 'phone']);
    $this->userInterface->updateUser($id, $data);

    return redirect()->route('users.index')->with('msg', 'User updated successfully!');
}

public function destroy($id)
{
    $this->userInterface->deleteUser($id);
    return redirect()->route('users.index')->with('msg', 'User deleted successfully!');
}

}
