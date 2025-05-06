<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::get();
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'userName' => 'required',
            'email' => 'required|unique:users,email,' . $request->userId . ',userId|email',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);

        $validate = Users::create([
            'userName' => $request->userName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        if ($validate) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } else {
            return redirect()->route('users.create')->with('error', 'User created failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Users::find($id); //$users;

        return view('users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Users::findOrFail($id);

        $this->validate($request, [
            'userName' => 'required',
            'email' => 'nullable|email|unique:users,email,' . $data->userId . ',userId',
            'password' => 'nullable',
            'phone' => 'required',
            'role' => 'required'
        ]);

        $field = [
            'userName' => $request->userName,
            // 'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role
        ];

        if ($request->password != null) {
            $field['password'] = bcrypt($request->password);
        }

        if ($request->email != null) {
            $field['email'] = $request->email;
        }


        $data->update($field);


        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::where('userId', $id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
