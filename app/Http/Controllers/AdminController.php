<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use App\Models\Faq;



use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        $items = Admin::all();
        $details = DB::table('orders')
                ->join('checkouts', 'orders.id', '=', 'checkouts.order_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.on_order','=',1)
                ->get();
        // dd($details);
        return view('admin.home',compact('items', 'details', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $admin = new Admin();
        $admin->food_name = strtoupper( $request->food_name);
        $admin->food_price = $request->food_price;
        $admin->food_description = $request->food_description;
        $file_name = $request->file('image')->getClientOriginalName();
        $admin->food_photo_path = 'images/'.$file_name;
        $admin->food_type = $request->food_type;
        $admin-> save();
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Admin::find($id);
        return view('admin.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Admin::find($id);
        $item->food_name = strtoupper( $request->food_name);
        $item->food_price = $request->food_price;
        $item->food_description = $request->food_description;
        $file_name = $request->file('image')->getClientOriginalName();
        $item->food_photo_path = 'images/'.$file_name;
        $item->food_type = $request->food_type;
        $item-> save();
        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect()->route('admin.home'); 
    }
}
