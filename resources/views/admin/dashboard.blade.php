@extends('layouts.admin-app')

@section('title', 'Dashboard Admin')

@section('content')
<h3 class="text-bold">Dashboard</h3>
            <div class="card mb-6">
               
                <div class="card-body">
                  <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-4">
                      <label class="form-label" for="selectTypeOpt">Dari</label>
                      <input class="form-control" type="date" id="html5-date-input">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="selectPlacement">Hingga</label>
                      <input class="form-control" type="date" id="html5-date-input">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label" for="showToastPlacement">&nbsp;</label>
                      <button class="btn btn-primary d-block">Terapkan</button>
                    </div>
                  </div>
                </div>
              </div>
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
                               
                                <h4 class="mb-0">$84,686k</h4>
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
                               
                                <h4 class="mb-0">$84,686k</h4>
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
                               
                                <h4 class="mb-0">$84,686k</h4>
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
                               
                                <h4 class="mb-0">$84,686k</h4>
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
                         
                          <div id="incomeChart"></div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 order-0 mb-6 total-revenue">
                  <div class="card h-100">
                    <div class="row row-bordered g-0">
                      <div class="col-lg-8">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <div class="card-title mb-0">
                            <h5 class="m-0 me-2 text-bold">Transaksi</h5>
                          </div>
                          
                        </div>
                        <div id="totalRevenueChart" class="px-3"></div>
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
                         
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

@endsection
