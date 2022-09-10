<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // set index page view
    public function index()
    {
        return view('components.users.index');
    }

    // handle fetch all users ajax request
    public function fetchAll()
    {
        try {
            $users = User::all();
            $output = '';
            if ($users->count() > 0) {
                $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($users as $user) {
                    $output .= '<tr>
                <td>' . $user->id . '</td>
                <td>' . $user->name . '</td>
                <td>' . $user->email . '</td>
                <td>
                  <a href="#" id="' . $user->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $user->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
                }
                $output .= '</tbody></table>';
                echo $output;
            } else {
                echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
            }
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    // handle insert a new users ajax request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        try {
            $user = User::create($validated);
            if ($user) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 204,]);
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // handle edit an users ajax request
    public function edit(Request $request)
    {
        try {
            $id = $request->id;
            $user = User::find($id);
            return response()->json($user);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // handle update an users ajax request
    public function update(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->update($request->only(['name', 'email', 'password']));
            return response()->json([
                'status' => 200,
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // handle delete an users ajax request
    public function delete(Request $request)
    {
        try {
            User::destroy($request->id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
