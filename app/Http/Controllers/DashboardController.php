<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\Nhaphang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
    public function revenue(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        if (is_null($month) || is_null($year)) {
            return redirect()->back()->with('error', 'Vui lòng chọn cả tháng và năm!');
        }
        $totalOrder = DonHang::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('tong_tien');
        $totalNhap = Nhaphang::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('tong_tien');
        $totalRevenue = $totalOrder - $totalNhap;
        return view('dashboard.dashboard', compact('totalRevenue', 'month', 'year', 'totalOrder', 'totalNhap'));
    }
}
