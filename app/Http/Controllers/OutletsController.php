<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OutletsController extends Controller
{
    // set index page view
    public function index()
    {
        return view('components.outlets.index');
    }

    // handle fetch all users ajax request
    public function fetchAll()
    {
        try {
            $outlets = Outlets::all();
            $output = '';
            if ($outlets->count() > 0) {
                $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($outlets as $outlet) {
                    $output .= '<tr>
                <td>' . $outlet->id . '</td>
                <td>' . $outlet->name . '</td>
                <td>' . $outlet->phone . '</td>
                <td><img src="storage/images/' . $outlet->image . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>
                  <a href="#" id="' . $outlet->id . '" class="text-success mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewOutletModal"><i class="bi bi-eye h4"></i></a>
                  <a href="#" id="' . $outlet->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editOutletModal"><i class="bi-pencil-square h4"></i></a>
                  <a href="#" id="' . $outlet->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
                }
                $output .= '</tbody></table>';
                echo $output;
            } else {
                echo '<h1 class="text-center text-secondary my-5">No record present in the datatable!</h1>';
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
            'phone' => 'required',
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        try {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            $validated['image']=$fileName;
            $outlet = Outlets::create($validated);
            if ($outlet) {
                return response()->json(['status' => 200,]);
            } else {
                return response()->json(['status' => 204,]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 204,]);
            // return $th->getMessage();
        }
    }

    // handle edit an users ajax request
    public function edit(Request $request)
    {
        try {
            $id = $request->id;
            $outlet = Outlets::find($id);
            return response()->json($outlet);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // handle update an users ajax request
    public function update(Request $request)
    {
        try {
            $fileName='';
            $outlet = Outlets::find($request->id);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);
                if ($outlet->image) {
                    Storage::delete('public/images/' . $outlet->image);
                }
            } else {
                $fileName = $request->image;
            }
            $request->image=$fileName;
            $outlet->update($request->only(['name', 'phone', 'image', 'latitude', 'longitude']));
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
            Outlets::destroy($request->id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
