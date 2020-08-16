<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function users(Request $request)
    {
        //$collection = [];
        $users =  User::all('id', 'name', 'email', 'status');
        // dd($users);
        // foreach ($users as $user) {
        //     if ($user->status == 1) {
        //         $userData = [
        //             "id" => $user->id,
        //             "name" => $user->name,
        //             "email" => $user->email,
        //             'status' => "active"

        //         ];
        //     } else {
        //         $userData = [
        //             "id" => $user->id,
        //             "name" => $user->name,
        //             "email" => $user->email,
        //             'status' => "Deactive"

        //         ];
        //     }

        //     array_push($collection, $userData);
        // }
        //dd($collection);

        //the basic
       // return Datatables::of($users)->make(true);

        //row customization

        return Datatables::of($users)
        ->addIndexColumn()
        ->setRowClass(function ($user) {
            return $user->status == 1 ?  : 'alert-warning';
        })
        ->editColumn('status', function ($user) {
            if($user->status == 1){
                $markup = '<span class="text-success">Active</span>';
            } else{
                $markup = '<span class="text-warning">Deactive</span>';
            }
            
            return $markup;
        })
        ->addColumn('action', function($user){
            $button = '<button type="button" name="edit" data-id="'.$user->id.'" onclick="editUser('.$user->id.')" class="edit btn btn-primary btn-sm">Edit</button>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" data-id="'.$user->id.'"onclick="deleteUser('.$user->id.')" class="delete btn btn-danger btn-sm">Delete</button>';
            return $button;
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
}
