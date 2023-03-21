<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\userResources;

class UserController extends Controller
{
    public function index() {
        // return response()->json("Indexed Successfully");
        return userResources::collection(UserModel::all());
    }

    public function store(StoreUserRequest $request)
    {
       UserModel::create($request->validated());
       return response()->json("Created Successfully");
    }

    public function update(StoreUserRequest $request, UserModel $user_model)
    {
        $user_model->update($request->validated());
        return response()->json("Updated Successfully");
    }

    public function show(UserModel $user_model)
    {
        return new userResources($user_model); 
    }

    public function destroy(UserModel $user_model)
    {
        $user_model->delete();
        return response()->json("Successfully deleted");
    }


}
