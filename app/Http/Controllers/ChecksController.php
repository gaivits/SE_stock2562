<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
class ChecksController extends Controller
{
    public function index()
    {
     $user_data = DB::table('check__models')->get();
     return view('checks',['user_data'=>$user_data]);
    }

    public function excel()
    {
     $user_data = DB::table('check__models')->get()->toArray();
     $user_array[] = array('id', 'firstname', 'lastname', 'stationery', 'amount');
     foreach($user_data as $u)
     {
      $user_array[] = array(
       'id'  => $u->id,
       'firstname'   => $u->firstname,
       'lastname'    => $u->lastname,
       'stationery'  => $u->stationery,
       'amount'   => $u->amount
      );
     }
     Excel::create('user_data', function($excel) use ($user_array)
     {
      $excel->setTitle('Stock_เครื่องเขียน');
      $excel->sheet('user_data', function($sheet) use ($user_array)
      {
       $sheet->fromArray($user_array, null, 'A1', false, false);
      });
     	})->download('xlsx');
    }
    public function delete($id)
    {
    	DB::table('check__models')->where('id',$id)->delete();
    	return redirect('checks');
    }
    public function edit($id)
    {
    	$user_id = DB::table('check__models')->find($id);
      return view('edit',['user_id'=>$user_id]);
    }
    public function update($id)
    {
    	$users = DB::table('check__models')->where('id',$id);
    	$users->update(
        [ 
          'firstname'=> request()->get('firstname'),
        'lastname'=> request()->get('lastname'),
        'stationery'=> request()->get('stationery'),
        'firstname'=> request()->get('firstname'),
      ]);
      return redirect('checks');
    }
}
