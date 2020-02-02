<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Symfony\Component\Console\Tests\Input\InputTest;
use Intervention\Image\Facades\Image;


class UsersController extends Controller
{

    public function index()
    {

        $users = User::Orderdesc()->paginate(10);

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {



        return view('admin.users.create');
    }


    public function store(StoreUsersRequest $request)
    {

//        $inputs = $request->except(['_token']);
//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $filename = time() . '.' . $image->getClientOriginalExtension();
//            $path = public_path('upload/staff/' . $filename);
//            Image::make($image->getRealPath())->widen(700)->save($path);
//
//            $inputs['image'] = $filename;
//            //dd($filename);
//        }
//        $user = User::create($request->all());

        $userId = $request->user_id;
        $user   =   User::updateOrCreate(
            ['id' => $userId],
            [
                'name' => $request->name,
                'email' => $request->email
            ]);

        return Response::json($user);
       // return redirect()->route('admin.users.index');
    }


    public function edit($id)
    {


        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUsersRequest $request, $id)
    {
        $inputs = $request->except(['_token']);
        $user = User::findOrFail($id);
        if ($request->hasFile('image')) {
            @unlink(public_path('upload/users/' . $user->image));
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/users/' . $filename);
            Image::make($image->getRealPath())->save($path);

            $inputs['image'] = $filename;
        }


        $user->update($inputs);


        return redirect()->route('users');
    }

    public function destroy($id)
    {

        $user = User::where('id',$id)->delete();

        //return Response::json($user);
        return Response::json($user);
    }


}
