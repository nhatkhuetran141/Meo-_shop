<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $thisMonth = Carbon::now()->month; 
        $lastMonth = $thisMonth-1; 
        $lastTwoMonth = $thisMonth-2; 
        $lastThreeMonth = $thisMonth-3; 

        $thisMonth_totalProducts = Product::count(); 

        $thisMonthData = $this->getDataByMonth($thisMonth); 
        $lastMonthData = $this->getDataByMonth($lastMonth); 
        $twoMonthAgoData = $this->getDataByMonth($lastTwoMonth); 
        $threeMonthAgoData = $this->getDataByMonth($lastThreeMonth); 

       return view('admin.dashboard.index', compact('thisMonth','thisMonthData', 'lastMonthData', 'twoMonthAgoData', 'threeMonthAgoData', 'thisMonth_totalProducts'));
    }

   
    public function getDataByMonth($month)
    {
        $totalOrders = $this->getTotalOrders($month); 
        $pendingOrders = $this->getPendingOrders($month);
        $shippingOrders = $this->getShippingOrders($month); 
        $completedOrders = $this->getCompleteOrders($month); 
        $canceledOrders = $this->getCancelOrders($month); 
        $saleResult = $this->getSalesResult($month); 

        $thisMonthData = [
            "totalOrders" =>  $totalOrders,
            "pendingOrders" =>  $pendingOrders,
            "shippingOrders" =>  $shippingOrders,
            "completedOrders" =>  $completedOrders,
            "canceledOrders" =>  $canceledOrders,
            "saleResult" =>  $saleResult,
        ];

        return $thisMonthData; 
    }

    public function getSalesResult($month)
    {
        return Order::whereMonth(
            'created_at',
            $month
        )->sum('last_total'); 
    }


    public function getTotalOrders($month)
    {
        return Order::whereMonth(
            'created_at',
            $month
        )->count(); 
    }
    public function getPendingOrders($month)
    {
        return Order::where('order_status', '=', 'pending')->whereMonth(
            'created_at',
            $month
        )->count(); 
    }
    public function getShippingOrders($month)
    {
        return Order::where('order_status', '=', 'shipping')->whereMonth(
            'created_at',
            $month
        )->count(); 
    }
    public function getCompleteOrders($month)
    {
        return Order::where('order_status', '=', 'completed')->whereMonth(
            'created_at',
            $month
        )->count(); 
    }
    public function getCancelOrders($month)
    {
        return Order::where('order_status', '=', 'canceled')->whereMonth(
            'created_at',
            $month
        )->count(); 
    }
}