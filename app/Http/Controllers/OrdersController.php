<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Book;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getAllOrders(){
        $accounts = Account::all();
        $oders = Order::all();
        return view('Admin.order.index_orders',compact('oders','accounts'));
    }

    public function getAllOrdersProcessing(){
        $accounts = Account::all();
        $oders = Order::all();
        return view('Admin.order.orders_processing',compact('oders','accounts'));
    }

    public function getAllDeliveryOrders(){
        $accounts = Account::all();
        $oders = Order::all();
        return view('Admin.order.delivery_orders',compact('oders','accounts'));
    }

    public function getAllOrdersDelivered(){
        $accounts = Account::all();
        $oders = Order::all();
        return view('Admin.order.orders_delivered',compact('oders','accounts'));
    }

    public function getAllOrdersCancel(){
        $accounts = Account::all();
        $oders = Order::all();
        return view('Admin.order.orders_cancel',compact('oders','accounts'));
    }

    public function editStatusProcessing($id){
        Order::where('Id',$id)->update([
            'StatusId' => 1
        ]);
        return redirect()->route('index_orders');
    }

    public function editStatusDelivery($id){
        Order::where('Id',$id)->update([
            'StatusId' => 2,
        ]);
        OrderLine::where('OrderId',$id)->update([
            'Status' => 1,  
        ]);
        return redirect()->route('index_orders');
    }

    public function editStatusCancel($id){
        Order::where('Id',$id)->update([
            'StatusId' => 3
        ]);
        return redirect()->route('index_orders');
    }




    public function OrdersLines($id){
        $order = Order::find($id);
        $order_lines = OrderLine::all();
        $books = Book::all();
        $total = 0;
        return view('Admin.order.orders_lines',compact('order','order_lines','books','total'));
    }

}
