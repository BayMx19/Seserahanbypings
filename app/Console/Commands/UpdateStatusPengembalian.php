<?php

namespace App\Console\Commands;

use App\Models\Pesanan;
use Illuminate\Console\Command;

class UpdateStatusPengembalian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pesanan:update-status-pengembalian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $kemarin = now()->subDay()->format('Y-m-d');

        $pesananList = Pesanan::whereDate('tanggal_acara', $kemarin)
            ->where('status_pesanan', 'Dikirim')
            ->whereHas('detailPesanan.keranjang.layananHarga', function($q) {
                $q->whereIn('layanan', ['Sewa Box', 'Sewa + Jasa Hias']);
            })
            ->get();

        foreach ($pesananList as $pesanan) {
            $pesanan->update([
                'status_pesanan' => 'Menunggu Pengembalian'
            ]);
        }
    }
}
