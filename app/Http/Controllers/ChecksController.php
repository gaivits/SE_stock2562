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
     $user_array[] = array('id', 'firstname', 'lastname', 'item', 'amount','วันที่ยืม');
     foreach($user_data as $u)
     {
      $user_array[] = array(
       'id'  => $u->id,
       'firstname'   => $u->firstname,
       'lastname'    => $u->lastname,
       'item'  => $u->item,
       'amount'   => $u->amount,
       'date' => $u->date,
       );
     }
     Excel::create('user_data', function($excel) use ($user_array)
     {
      $excel->setTitle('Stock_เครื่องเขียน');
      $excel->sheet('Stock', function($sheet) use ($user_array)
      {
       $sheet->fromArray($user_array, null, 'A2', false, false);
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
        'item'=> request()->get('item'),
        'amount'=> request()->get('amount'),
      ]);
      return redirect('checks');
    }
}
