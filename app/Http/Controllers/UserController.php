<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use ProtoneMedia\Splade\SpladeTable;

class UserController extends Controller
{
    public function index()
    {
    //    for($i=1;$i<=100;$i++){
    //     User::create([
    //         'name' => $i.'name',
    //         'email' => 'user'.$i.'@user.com',
    //         'password' => Hash::make('password')
    //     ]);

        return view('users.index',[
            'users' => SpladeTable::for(User::class)
            ->column('id',sortable:true)
            ->column('name')
            ->column('email')
            ->column('actions')
            ->defaultSort('name')
            ->withGlobalSearch(columns: ['name','email'])
            ->paginate(15)

        ]);
       }
    

    public function show($id)
    {
       $user = User::findOrfail($id);
        return view('users.show',compact('user'));
    }
}
