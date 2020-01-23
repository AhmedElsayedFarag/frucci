<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = bcrypt($request['password']);
        $requestData = array_merge($request->except('password'), ['password' => $password]);
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $requestData['image'] = $picture_name;


        }//end if
        User::create($requestData);
        session()->flash('message', trans('sweet_alert.added_successfully'));
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if($request->password != ''){
            $password = bcrypt($request['password']);
            $data = array_merge($request->except('password'), ['password' => $password ]);
            User::find($id)->update($data);
        }else{
            User::find($id)->update($request->except('password'));
        }
        if ($request->hasFile('image')) {
            $picture_name = 'uploads/'.time().str_shuffle('abcdef').'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save(public_path("$picture_name"));
            $requestData['image'] = $picture_name;
            User::find($id)->update($requestData);
        }
        if(auth()->user()->save()) {
            session()->flash('message', trans('sweet_alert.updated_successfully'));
        }
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setStatus($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_active == 1){
            $user->is_active = 0;
            $user->save();
            return response()->json('ban');

        }else{
            $user->is_active = 1;
            $user->save();
            return response()->json('unban');
        }

    }
}
