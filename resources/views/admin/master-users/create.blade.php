@extends('layouts.admin-app')

@section('title', 'Tambah Users')

@section('content')
<h3 class="text-bold">Tambah Users</h3>
<div class="col-xl">
                  <div class="card">
                    
                    <div class="card-body">
                      <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                          <label class="form-label" for="name">Nama</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"
                              ><i class="icon-base bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="name"
                              name="name"
                              placeholder="Masukkan Nama Anda"
                              />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="nohp">No. HP</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"
                              ><i class="icon-base bx bx-phone"></i
                            ></span>
                            <input
                              type="number"
                              id="nohp"
                              class="form-control"
                              name="nohp"
                              placeholder="Masukkan No. HP"
                              />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="role">Role</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"
                              ><i class="icon-base bx bx-shield-quarter"></i
                            ></span>
                            <select
                              class="form-select"
                              id="role"
                              name="role"
                              >
                                <option value="" disabled selected>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="email">Email</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                            <input
                              type="text"
                              id="email"
                              name="email"
                              class="form-control"
                              placeholder="Masukkan Email Anda"
                              />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="password">Password</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"
                              ><i class="icon-base bx bx-key"></i
                            ></span>
                            <input
                              type="password"
                              id="password"
                              name="password"
                              class="form-control"
                              placeholder="Masukkan Password Anda"
                             />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-icon-default-message">Konfirmasi Password</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"
                              ><i class="icon-base bx bx-key"></i
                            ></span>
                           <input
                              type="password"
                              id="password_confirmation"
                              name="password_confirmation"
                              class="form-control"
                              placeholder="Masukkan Konfirmasi Password Anda"
                             />
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                          <div class="input-group input-group-merge">
                            <span  class="input-group-text"
                              ><i class="icon-base bx bx-male-female"></i
                            ></span>
                            <select
                              class="form-select"
                              id="jenis_kelamin"
                              name="jenis_kelamin"
                              >
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="status">Status</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"
                              ><i class="icon-base bx bx-toggle-left"></i
                            ></span>
                            <select
                              class="form-select"
                              id="status"
                              name="status"
                              >
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="ACTIVE">Active</option>
                                <option value="INACTIVE">Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="alamat">Alamat</label>
                              <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="provinsi">Provinsi</label>
                              <input class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan provinsi Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="kota">Kota</label>
                              <input class="form-control" id="kota" name="kota" placeholder="Masukkan kota Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="kecamatan">Kecamatan</label>
                              <input class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukkan kecamatan Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="kelurahan">Kelurahan</label>
                              <input class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan kelurahan Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="RT">RT</label>
                              <input class="form-control" id="RT" name="RT" placeholder="Masukkan RT Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="RW">RW</label>
                              <input class="form-control" id="RW" name="RW" placeholder="Masukkan RW Anda"/>
                            </div>
                            <div class="col-md-6 mb-6">
                              <label class="form-label" for="kode_pos">Kode Pos</label>
                              <input class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan kode_pos Anda"/>
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="foto_profil" class="form-label">Input Foto Profile</label>
                            <input class="form-control" type="file" id="foto_profil" name="foto_profil"/>
                        </div>
                        <div style="text-align: center; margin-top: 50px;">
                            <button type="submit" class="btn btn-submit">Submit</button>
                        </div>
                      </form>
                        <div style="text-align: center; margin-top: 10px;">
                            <a href="{{'/admin/users'}}"><button class="btn btn-batal" >Batal</button></a>
                        </div>
                    </div>
                  </div>
                </div>
@endsection

