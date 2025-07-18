@extends('layouts.admin-app')

@section('title', 'Dashboard Admin')

@section('content')
<h3 class="text-bold">Dashboards</h3>
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="row gx-3 gy-2 align-items-center">
                      <div class="col-md-4">
                        <label class="form-label">Dari</label>
                        <input class="form-control" type="date" name="from" value="{{ request('from') }}">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Hingga</label>
                        <input class="form-control" type="date" name="to" value="{{ request('to') }}">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label d-block">&nbsp;</label>
                        <button class="btn btn-primary d-block">Terapkan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            <div class="row">
                <div class="col-md-6 col-lg-3 col-xl-3 order-0 mb-6 profile-report">
                      <div class="card h-80">
                        <div class="card-body">
                          <div
                            class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title mb-6">
                                <h5 class="text-nowrap mb-1 text-bold">Jumlah Users</h5>
                              </div>
                              <div class="mt-sm-auto">
                               
                                <h4 class="mb-0">{{$getCountUsers}}</h4>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 order-0 mb-6 profile-report">
                      <div class="card h-80">
                        <div class="card-body">
                          <div
                            class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title mb-6">
                                <h5 class="text-nowrap mb-1 text-bold">Jumlah Produk</h5>
                              </div>
                              <div class="mt-sm-auto">
                               
                                <h4 class="mb-0">{{$getCountProduk}}</h4>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 order-0 mb-6 profile-report">
                      <div class="card h-80">
                        <div class="card-body">
                          <div
                            class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title mb-6">
                                <h5 class="text-nowrap mb-1 text-bold">Jumlah Transaksi</h5>
                              </div>
                              <div class="mt-sm-auto">
                               
                                <h4 class="mb-0">{{$getCountTransaksi}}</h4>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-3 order-0 mb-6 profile-report">
                      <div class="card h-80">
                        <div class="card-body">
                          <div
                            class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title mb-6">
                                <h5 class="text-nowrap mb-1 text-bold">Saldo</h5>
                              </div>
                              <div class="mt-sm-auto">
                               
                                <h4 class="mb-0">Rp. {{$getCountSaldo}},-</h4>
                              </div>
                            </div>
                           
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 order-0 mb-6 expense-overview">
                  <div class="card h-100">
                    <div class="card-header nav-align-top">
                      <h5 class="card-title m-0 text-bold">Pemasukan</h5>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                         
                          <div id="getChartPemasukan"></div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 order-0 mb-6 expense-overview">
                  <div class="card h-100">
                    <div class="card-header nav-align-top">
                      <h5 class="card-title m-0 text-bold">Transaksi</h5>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                         
                          <div id="getChartTransaksi"></div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-12 order-0 mb-6 expense-overview">
                  <div class="card h-100">
                    <div class="card-header nav-align-top">
                      <h5 class="card-title m-0 text-bold">List Sewa</h5>
                    </div>
                    <div class="card-body">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                         <table id="tabelSewa" class="table table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Nama Pemesan</th>
                                <th>Produk</th>
                                <th>Layanan</th>
                                <th>Tanggal Acara</th>
                                <th>Batas Pengembalian</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($sewaPesanan as $pesanan)
                                @foreach ($pesanan->detailPesanan as $detail)
                                  @php
                                    $layanan = $detail->keranjang->layananHarga->layanan ?? '-';
                                    $produk = $detail->keranjang->produk->nama ?? '-';
                                  @endphp
                                  @if (in_array($layanan, ['Sewa + Jasa Hias', 'Sewa Box']))
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $pesanan->kode_invoice }}</td>
                                      <td>{{ $pesanan->pembeli->name ?? '-' }}</td>
                                      <td>{{ $produk }}</td>
                                      <td>{{ $layanan }}</td>
                                      <td>{{ $pesanan->tanggal_acara ? \Carbon\Carbon::parse($pesanan->tanggal_acara)->locale('id')->isoFormat('D MMMM YYYY') : '-' }}</td>
                                      <td class="tgl-pengembalian text-red" data-tanggal="{{ $pesanan->tanggal_acara }}"></td>
                                    </tr>
                                  @endif
                                @endforeach
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

@endsection
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var options = {
      chart: {
        type: 'line',
        height: 350
      },
      series: [{
        name: 'Total Pemasukan',
        data: @json($monthDataPemasukan)
      }],
      xaxis: {
        categories: @json($monthLabels)
      },
      yaxis: {
        labels: {
          formatter: function (value) {
            return 'Rp. ' + value.toLocaleString('id-ID');
          }
        }
      },
      tooltip: {
        y: {
          formatter: function (val) {
            return "Rp. " + val.toLocaleString('id-ID');
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#getChartPemasukan"), options);
    chart.render();
  });
</script>
<script>
  var transaksiOptions = {
    chart: { type: 'bar', height: 350 },
    series: [{
      name: 'Jumlah Transaksi',
      data: @json($monthDataTransaksi)
    }],
    xaxis: { categories: @json($monthLabels) },
    plotOptions: {
      bar: {
        columnWidth: '50%',
        distributed: true
      }
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + ' transaksi';
        }
      }
    }
  };
  new ApexCharts(document.querySelector("#getChartTransaksi"), transaksiOptions).render();
</script>
<script>
  $(document).ready(function () {
    $('#tabelSewa').DataTable();

    $('.tgl-pengembalian').each(function () {
      var tanggalAcara = $(this).data('tanggal');
      if (tanggalAcara) {
        var tgl = new Date(tanggalAcara);
        tgl.setDate(tgl.getDate() + 2);
        var formatted = tgl.toLocaleDateString('id-ID', {
          day: '2-digit', month: 'long', year: 'numeric'
        });
        $(this).text(formatted);
      } else {
        $(this).text('-');
      }
    });
  });
</script>

@endpush