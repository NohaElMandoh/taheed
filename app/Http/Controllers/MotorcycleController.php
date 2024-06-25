<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Models\Order;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index(Request $request)
    {

        $motorcycles = Motorcycle::all();

        $totalCount=  $this->getCountMotorcyclesForMonth(2024, 6);
        $totalAmount =  $this->getTotalMotorcyclesForMonth(2024, 6);


        return view('motorcycles.index', compact('motorcycles', 'totalAmount','totalCount'));
    }


    public function getCountMotorcyclesForMonth($year, $month)
    {
        // Calculate the first and last day of the month
        $firstDayOfMonth = $year . '-' . $month . '-01';
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth)); // 't' returns the last day of the month


        $totalMotorcycles = Order::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
            ->sum('motorcycles_count');

        return $totalMotorcycles;
    }

    public function getTotalMotorcyclesForMonth($year, $month)
    {
        // Calculate the first and last day of the month
        $firstDayOfMonth = $year . '-' . $month . '-01';
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth)); // 't' returns the last day of the month


        $totalMotorcycles = Order::where('status', 'completed')->whereBetween('created_at', [$firstDayOfMonth, $lastDayOfMonth])
            ->sum('total_amount');

        return $totalMotorcycles;
    }
}
