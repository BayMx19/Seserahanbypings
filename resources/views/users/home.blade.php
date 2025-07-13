@extends('layouts.users-app')
@section('title', 'Home')
@section('content')

                <section class="section main-section">
                    <div class="container">
                        <div class="row">
                            <div class="col col_7 col_desktop-12 order-desktop-2">
                                <div class="photo-list main-photo">
                                    <div class="main-photo__fon">
                                    
                                    </div>
                                    <div class="photo-item main-photo-item main-photo-item-1">
                                        <div class="photo-img">
                                            <div class="photo-img__block">
                                                <img src="{{ asset('assets/img/1.jpg')}}" alt="main-page-1">
                                            </div>
                                        </div>
                                        <div class="photo-info wysiwyg"></div>
                                    </div>
                                    <div class="photo-item main-photo-item main-photo-item-2">
                                        <div class="photo-img">
                                            <div class="photo-img__block">
                                                <img src="{{ asset('assets/img/2.jpg')}}" alt="main-page-2">
                                            </div>
                                        </div>
                                        <div class="photo-info wysiwyg"><p>Seserahan byPings</p></div>

                                    </div>

                                </div>
                            </div>
                            <div class="col col_5 col_desktop-12 order-desktop-1">
                                <div class="main-container">
                                    <h1 class="h1 main-title">Bingkisan Istimewa<br><span class="round-border round-border-3">Seserahan byPings</span></h1>
                                    <div class="wysiwyg main-description">Hadirkan kesan elegan di hari spesialmu dengan seserahan handmade penuh cinta. Cocok untuk lamaran, tunangan, hingga pernikahan.</div>
                                    <a href="#products" style="text-decoration: none !important;" type="button" class="btn button-landing">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="advantage" class="section">
                    <div class="container">
                        
                            <div class="col text-center" style="margin-bottom: 50px;">
                                <h2 class="h2 title fw-bold" style="margin: 0 !important;">Kenapa Memilih <span class="text-primary text-bold text-blue">Seserahan byPings?</span></h2>
                                <p class="text-muted mb-5">Kami hadir untuk menjadikan momen spesialmu lebih berkesan.</p>
                            </div>
                        
                        <div class="row">
                            <div class="dignity-item col col_4 col_mob-12">
                                <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <img src="{{ asset('assets/users/images/icons/custom.png') }}" alt="Desain Custom" class="img-icon">
                                    </div>
                                    <h3 class="fw-bold mt-5" style="margin-top: 20px;">Desain Custom</h3>
                                    <p class="text-muted">Bisa request tema, warna, dan isi seserahan sesuai keinginan kamu.</p>
                                </div>
                            </div>
                            <div class="dignity-item col col_4 col_mob-12">
                                <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <img src="{{ asset('assets/users/images/icons/fast-delivery.png') }}" alt="Desain Custom" class="img-icon">
                                    </div>
                                    <h3 class="fw-bold mt-5" style="margin-top: 20px;">Pengiriman Cepat</h3>
                                    <p class="text-muted">Proses cepat dan pengiriman tepat waktu ke seluruh Indonesia.</p>
                                </div>
                            </div>
                            <div class="dignity-item col col_4 col_mob-12">
                                <div class="dignity-block text-center p-4 shadow rounded bg-white h-100">
                                    <div class="icon-wrapper mx-auto mb-3">
                                        <img src="{{ asset('assets/users/images/icons/variant.png') }}" alt="Desain Custom" class="img-icon">
                                    </div>
                                    <h3 class="fw-bold mt-5" style="margin-top: 20px;">Pilihan Beragam</h3>
                                    <p class="text-muted">Tersedia berbagai paket seserahan, dari yang minimalis hingga mewah.</p>
                                </div>
                            </div>


                            
                        </div>
                    </div>
                </section>

                <section id="experiences" class="section">
                    <div class="container">
                        <div class="row">
                            <!-- Foto Emosional -->
                            <div class="col col_6 col_desktop-12">
                                <div class="photo-list emotional-photo">
                                    <div class="photo-item emotional-photo__item emotional-photo__item-1">
                                        <div class="photo-img">
                                            <div class="photo-img__block">
                                                <img src="{{ asset('assets/img/3.jpg')}}" alt="moment-1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="photo-item emotional-photo__item emotional-photo__item-2">
                                        <div class="photo-img">
                                            <div class="photo-img__block">
                                                <img src="{{ asset('assets/img/4.jpg')}}" alt="moment-2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="photo-item emotional-photo__item emotional-photo__item-3">
                                        <div class="photo-img">
                                            <div class="photo-img__block">
                                                <img src="{{ asset('assets/img/5.jpg')}}" alt="moment-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Konten Deskripsi -->
                            <div class="col col_6 col_desktop-12">
                                <h2 class="h2 emotional-title mb-4 text-bold">Seserahan Bukan Sekadar Hadiah, Tapi Simbol Kasih & Doa</h2>

                                <div class="emotional-list">
                                    <div class="emotional-item mb-4">
                                        <div class="emotional-block d-flex">
                                            <div class="emotional-icon me-3">
                                                <img src="{{ asset('assets/img/6.jpg') }}" alt="Makna" width="40">
                                            </div>
                                            <div class="emotional-info">
                                                <h4 class="h4 text-bold emotional-subtitle">Makna dalam Setiap Item</h4>
                                                <p class="text-muted">Setiap isi seserahan punya simbol dan harapan tersendiri untuk pasangan.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="emotional-item mb-4">
                                        <div class="emotional-block d-flex">
                                            <div class="emotional-icon me-3">
                                                <img src="{{ asset('assets/img/7.jpg') }}" alt="Kenangan" width="40">
                                            </div>
                                            <div class="emotional-info">
                                                <h4 class="h4  text-bold emotional-subtitle">Menjadi Bagian dari Momen Spesial</h4>
                                                <p class="text-muted">Kami percaya, visual yang indah menciptakan kenangan yang abadi.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="emotional-item">
                                        <div class="emotional-block d-flex">
                                            <div class="emotional-icon me-3">
                                                <img src="{{ asset('assets/img/8.png') }}" alt="Kustom" width="40">
                                            </div>
                                            <div class="emotional-info">
                                                <h4 class="h4 text-bold emotional-subtitle">Tersedia Paket Kustom & Premium</h4>
                                                <p class="text-muted">Dari konsep hingga eksekusi, kami bantu wujudkan seserahan impianmu.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="about-us" class="section">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Kolom Kiri: Teks Tentang Kami -->
                            <div class="col col_6 col_desktop-12">
                                <div class="description-container">
                                    <div class="wysiwyg">
                                        <h3 class="h3 title fw-bold mb-4">Tentang <span class="text-primary text-bold text-blue">Seserahan byPings</span></h3>
                                        <p><b class="text-blue">Seserahan byPings</b> hadir untuk membantu kamu menyiapkan seserahan yang elegan, penuh makna, dan sesuai dengan harapan. Kami percaya bahwa setiap seserahan bukan hanya sekadar hadiah, tapi bentuk cinta dan doa terbaik untuk pasangan.</p>
                                        <p>Dengan desain yang bisa dikustom, pilihan paket lengkap, dan pelayanan profesional, kami siap menemani setiap momen spesialmu menjadi lebih berkesan.</p>
                                        <p><i class="fa-solid fa-check"></i> Desain bisa request tema, warna, dan isi</p>
                                            <p><i class="fa-solid fa-check"></i> Pengemasan rapi dan estetik</p>
                                            <p><i class="fa-solid fa-check"></i> Layanan cepat & ramah</p>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Gambar & Ornamen -->
                            <div class="col col_1 col_desktop-12"></div>
                            <div class="col col_5 col_desktop-12">
                                <div class="description-photo">
                                    <div class="description-photo-item">
                                        
                                        <div class="photo-item description-photo-item-1">
                                            <div class="photo-img">
                                                <div class="photo-img__block rounded shadow">
                                                    <img src="{{ asset('assets/logo/logo.png') }}" alt="Seserahan byPings" class="img-fluid rounded">
                                                </div>
                                            </div>
                                            <div class="photo-info wysiwyg">
                                                <p class="text-muted small mt-2">"Karena momen spesial pantas mendapatkan kemasan yang istimewa."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="products" class="section section-main__post">
                    <div class="container">
                        <div class="row" >
                            
                            <div class="col col_12 col_desktop-12">
                                <div class="post-description text-center text-mob-left">
                                    <h2 class="h2 title fw-bold" style="margin: 0 !important;">Produk Kami</span></h2>
                                    <div class="wysiwyg">
                                        <p>Temukan berbagai pilihan Seserahan, Mahar, dan Box eksklusif untuk hari spesialmu.</p>
                                    </div>.
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="post-slider slider" style="margin-bottom: 50px">
                            <div class="swiper-container post-slider__container">
                                <div class="swiper-wrapper post-slider__wrapper">
                                    @foreach($produk as $item)
                                    <div class="swiper-slide slider-item post-slider__item">
                                        <div class="post-slider__image">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}">
                                        </div>
                                        <div class="post-slider__info">
                                            <h3 class="h3 title mt-5 text-bold">{{ $item->nama_produk }}</h3>
                                            <div class="wysiwyg">
                                                <p>{{ Str::limit($item->deskripsi, 100) }} </p>
                                            </div>
                                        <div class="display-flex justify-between align-center flex-wrap">
                                                <button 
                                                    type="button" 
                                                    class="btn btn-list-product mb-2 openModal"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalDetailProduk"
                                                    data-image="{{ asset('storage/' . $item->gambar) }}"
                                                    data-title="{{ $item->nama_produk }}"
                                                    data-description="{{ $item->deskripsi }}"
                                                    data-prices='@json($item->harga)'
                                                    >
                                                    Lihat Selengkapnya
                                                    </button>                           
                                        </div>
                                        </div>
                                        <div class="slider-next post-slider__next">
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M12.2828 2.76273C12.4781 2.56747 12.7947 2.56747 12.9899 2.76273L21.9192 11.692C22.1145 11.8873 22.1145 12.2039 21.9192 12.3991L12.9899 21.3284C12.7947 21.5237 12.4781 21.5237 12.2828 21.3284L11.7172 20.7627C11.5219 20.5675 11.5219 20.2509 11.7172 20.0556L17.9737 13.7991C18.2886 13.4841 18.0656 12.9456 17.6201 12.9456H3.5C3.22386 12.9456 3 12.7217 3 12.4456V11.6456C3 11.3694 3.22386 11.1456 3.5 11.1456H17.6201C18.0656 11.1456 18.2886 10.607 17.9737 10.292L11.7172 4.03553C11.5219 3.84026 11.5219 3.52368 11.7172 3.32842L12.2828 2.76273Z"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9419 1.85355C11.1372 1.65829 11.4538 1.65829 11.649 1.85355L20.7374 10.9419C20.9327 11.1372 20.9327 11.4538 20.7374 11.649L11.649 20.7374C11.4538 20.9327 11.1372 20.9327 10.9419 20.7374L10.0581 19.8536C9.8628 19.6583 9.86279 19.3417 10.0581 19.1464L15.9305 13.274C16.2454 12.9591 16.0224 12.4205 15.5769 12.4205H2C1.72386 12.4205 1.5 12.1966 1.5 11.9205V10.6705C1.5 10.3944 1.72386 10.1705 2 10.1705H15.5769C16.0224 10.1705 16.2454 9.63192 15.9305 9.31694L10.0581 3.44454C9.86279 3.24928 9.8628 2.9327 10.0581 2.73744L10.9419 1.85355Z"/> </svg>
                                        </div>
                                        <div class="slider-prev post-slider__prev">
                                            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M11.7172 2.76273C11.5219 2.56747 11.2053 2.56747 11.0101 2.76273L2.08076 11.692C1.8855 11.8873 1.8855 12.2039 2.08076 12.3991L11.0101 21.3284C11.2053 21.5237 11.5219 21.5237 11.7172 21.3284L12.2828 20.7627C12.4781 20.5675 12.4781 20.2509 12.2828 20.0556L6.02634 13.7991C5.71136 13.4841 5.93445 12.9456 6.3799 12.9456H20.5C20.7761 12.9456 21 12.7217 21 12.4456V11.6456C21 11.3694 20.7761 11.1456 20.5 11.1456H6.3799C5.93445 11.1456 5.71136 10.607 6.02634 10.292L12.2828 4.03553C12.4781 3.84026 12.4781 3.52368 12.2828 3.32842L11.7172 2.76273Z"/> <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0581 1.85355C12.8628 1.65829 12.5462 1.65829 12.351 1.85355L3.26257 10.9419C3.0673 11.1372 3.0673 11.4538 3.26256 11.649L12.351 20.7374C12.5462 20.9327 12.8628 20.9327 13.0581 20.7374L13.9419 19.8536C14.1372 19.6583 14.1372 19.3417 13.9419 19.1464L8.06954 13.274C7.75456 12.9591 7.97765 12.4205 8.4231 12.4205H22C22.2761 12.4205 22.5 12.1966 22.5 11.9205V10.6705C22.5 10.3944 22.2761 10.1705 22 10.1705H8.4231C7.97765 10.1705 7.75456 9.63192 8.06954 9.31694L13.9419 3.44454C14.1372 3.24928 14.1372 2.9327 13.9419 2.73744L13.0581 1.85355Z"/> </svg>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination slider-pagination  post-slider__pagination"></div>
                            </div>
                        </div>

                    </div>
                </section>
                
                <section id="kontak" class="section kontak-section" >
                    <div class="container" >
                        <div class="post-description text-center text-mob-left">
                        <h2 class="h2 title fw-bold" style="margin: 0 !important;">Temukan Kami</h2>
                        <div class="wysiwyg">
                            <p>Kunjungi workshop kami atau hubungi langsung untuk konsultasi dan pemesanan seserahan terbaikmu.</p>
                        </div>
                        </div>
                        <div class="row" style="justify-content: center !important; align-items:center !important;">

                                    <div class=" temukan-kami-map">
                                        <div class="col-12" style="width: 100%; align-item: center !important;">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2346.7442489700748!2d114.27550098043753!3d-8.427404453796097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMjUnMzMuMyJTIDExNMKwMTYnMzguMyJF!5e0!3m2!1sen!2sid!4v1751963900461!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </section>

<!-- Modal Produk -->
<div class="modal fade" id="modalDetailProduk" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <div class="row">
        <div class="col-md-5 text-center">
          <img id="modalImage" src="" alt="Gambar Produk" class="img-fluid rounded">
        </div>
        <div class="col-md-7">
          <h5 class="fw-bold mb-2" id="modalTitle">Nama Produk</h5>

          <p id="modalDescription" class="mb-3">Deskripsi produk akan muncul di sini.</p>

          <div class="mb-3">
            <label class="form-label">Pilih Layanan</label>
               <select class="form-select select-layanan" id="modalSelectLayanan">
                    <option disabled selected>Pilih kategori layanan</option>
                </select>
            </div>

          <h4 id="modalHarga" class="text-primary fw-bold">Rp -</h4>

          <button class="btn btn-primary w-100 mt-3" id="btnTambahKeranjang">Tambahkan ke Keranjang</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalDetailProduk');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        const modalHarga = document.getElementById('modalHarga');
        const modalSelect = document.getElementById('modalSelectLayanan');

        document.querySelectorAll('.openModal').forEach(button => {
            button.addEventListener('click', function () {
                const image = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                const description = this.getAttribute('data-description');
                const prices = JSON.parse(this.getAttribute('data-prices'));
                modalImage.src = image;
                modalTitle.textContent = title;
                modalDescription.textContent = description;
                modalSelect.innerHTML = '<option disabled selected>Pilih kategori layanan</option>';
                prices.forEach(price => {
                    const option = document.createElement('option');
                    option.value = price.harga;
                    option.textContent = price.kategori;
                    modalSelect.appendChild(option);
                });

                modalHarga.textContent = 'Rp -';
            });
        });

        modalSelect.addEventListener('change', function () {
            const selectedPrice = this.value;
            modalHarga.textContent = 'Rp ' + parseInt(selectedPrice).toLocaleString('id-ID');
        });
    });
    document.getElementById('btnTambahKeranjang').addEventListener('click', function () {
        const isAuthenticated = @json(Auth::check());

        if (!isAuthenticated) {
            window.location.href = "{{ route('login') }}";
        } else {
            console.log('User sudah login, tunggu instruksi lanjutan...');
        }
    });
</script>




@endsection
