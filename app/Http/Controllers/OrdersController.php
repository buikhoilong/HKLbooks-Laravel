<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getAllOrders(){
        $oders = Order::all();
        return view('Admin.order.index_orders',compact('oders'));
    }

    public function getAllOrdersProcessing(){
        $oders = Order::all();
        return view('Admin.order.orders_processing',compact('oders'));
    }

    public function getAllDeliveryOrders(){
        $oders = Order::all();
        return view('Admin.order.delivery_orders',compact('oders'));
    }

    public function getAllOrdersDelivered(){
        $oders = Order::all();
        return view('Admin.order.orders_delivered',compact('oders'));
    }

    public function getAllOrdersCancel(){
        $oders = Order::all();
        return view('Admin.order.orders_cancel',compact('oders'));
    }
}
