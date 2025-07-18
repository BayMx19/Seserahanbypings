<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $getCountUsers = User::count();
        $getCountProduk = Produk::count();

        $from = $request->input('from');
        $to = $request->input('to');

        $pesananQuery = Pesanan::query();

        if ($from && $to) {
            $pesananQuery->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
        }
        $getCountTransaksi = $pesananQuery->count();
        $getCountSaldo = number_format($pesananQuery->sum('total_harga'), 0, ',', '.');

        $getChartPemasukan = clone $pesananQuery;
        $getChartPemasukan = $getChartPemasukan
            ->selectRaw('MONTH(created_at) as month, SUM(total_harga) as total')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $getChartTransaksi = clone $pesananQuery;
        $getChartTransaksi = $getChartTransaksi
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthLabels = [];
        $monthDataPemasukan = [];
        $monthDataTransaksi = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthLabels[] = date('F', mktime(0, 0, 0, $i, 1));
            $monthDataPemasukan[] = $getChartPemasukan[$i] ?? 0;
            $monthDataTransaksi[] = $getChartTransaksi[$i] ?? 0;
        }

        $sewaPesanan = Pesanan::with(['detailPesanan.keranjang.layananHarga', 'pembeli'])
            ->whereHas('detailPesanan.keranjang.layananHarga', function ($query) {
                $query->whereIn('layanan', ['Sewa + Jasa Hias', 'Sewa Box']);
            });

        if ($from && $to) {
            $sewaPesanan->whereBetween('created_at', [$from . ' 00:00:00', $to . ' 23:59:59']);
        }

        $sewaPesanan = $sewaPesanan->get();

        return view('admin.dashboard', compact(
            'getCountUsers',
            'getCountProduk',
            'getCountTransaksi',
            'getCountSaldo',
            'monthLabels',
            'monthDataPemasukan',
            'monthDataTransaksi',
            'sewaPesanan'
        ));
    }

}
