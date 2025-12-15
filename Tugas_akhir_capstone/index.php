<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Desa Wisata Bantaragung - informasi paket wisata, galeri, dan video promosi. Kunjungi untuk pengalaman alam dan budaya di Majalengka.">
    <title>Desa Wisata Bantaragung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="theme-color" content="#1e4620">
    <style>
        /* tiny inline fallback to avoid FOIT while font loads */
        .site-font{font-family: Poppins, Arial, sans-serif;}
    </style>
</head>
<body class="site-font">
    <header class="header">
        <div class="container header-inner">
            <div>
                <a href="#home" class="brand-link" aria-label="Beranda Desa Wisata Bantaragung">
                    <img src="images/logo.png" alt="Logo Desa Wisata Bantaragung" class="site-logo">
                <span class="brand-text">Desa Wisata Bantaragung</span>
</a>
                <p class="tagline">Kecamatan Sindangwangi, Kabupaten Majalengka</p>
            </div>
            <nav class="navbar" aria-label="Main navigation">
                <button class="nav-toggle" aria-expanded="false" aria-controls="nav-list">☰</button>
                <ul id="nav-list">
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#objek">Objek Wisata</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#fasilitas">Fasilitas</a></li>
                    <li><a href="#paket">Paket</a></li>
                    <li><a href="#video">Video</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="hero-carousel" aria-hidden="false">
                <div class="carousel-track">
                    <img src="images/Pemandangan Bantaragung 1.png" alt="Pemandangan Bantaragung 1">
                    <img src="images/Pemandangan Bantaragung 2.png" alt="Pemandangan Bantaragung 2">
                    <img src="images/Pemandangan Bantaragung 3.png" alt="Pemandangan Bantaragung 3">
                </div>
                <div class="hero-overlay">
                    <h2>Rasakan Alam & Budaya</h2>
                    <p>Petualangan dan kenyamanan menunggu Anda di Desa Wisata Bantaragung.</p>
                    <a class="btn primary" href="#paket">Jelajahi Paket</a>
                </div>
            </div>
        </section>

        <section id="objek" class="objek-wisata container">
            <h2>Objek Wisata</h2>
            <p class="lead">Temukan destinasi unggulan Desa Wisata Bantaragung — pemandangan alam, air terjun, ekowisata, dan area perkemahan yang siap memberi pengalaman tak terlupakan.</p>

            <div class="objek-grid">
                <article class="objek-card">
                    <div class="objek-media" data-src="images/ciboer-pass.jpg" data-caption="Ciboer Pass — Terasering persawahan & tubing">
                        <img src="images/ciboer.jpg" alt="Ciboer Pass">
                    </div>
                    <div class="objek-body">
                        <h3>Ciboer Pass</h3>
                        <p>Terasering persawahan yang indah dengan aliran sungai; populer untuk tubing dan menikmati pemandangan.</p>
                    </div>
                </article>

                <article class="objek-card">
                    <div class="objek-media" data-src="images/curug-cipeuteuy.jpg" data-caption="Curug Cipeuteuy — Air terjun yang dikelola koperasi lokal">
                        <img src="images/curug.jpg" alt="Curug Cipeuteuy">
                    </div>
                    <div class="objek-body">
                        <h3>Curug Cipeuteuy</h3>
                        <p>Air terjun yang tertata dan dikelola oleh koperasi masyarakat — area cocok untuk edukasi konservasi dan rekreasi.</p>
                        </div>
                </article>

                <article class="objek-card">
                    <div class="objek-media" data-src="images/batu-asahan.jpg" data-caption="Batu Asahan — Destinasi ekologi">
                        <img src="images/batu asahan.jpg" alt="Batu Asahan">
                    </div>
                    <div class="objek-body">
                        <h3>Batu Asahan</h3>
                        <p>Destinasi ekologi dengan karakteristik alam yang khas — cocok untuk pengamatan alam dan fotografi.</p>
                        </div>
                </article>

                <article class="objek-card">
                    <div class="objek-media" data-src="images/buper-awilega.jpg" data-caption="Buper Awilega — Bumi perkemahan hutan pinus">
                        <img src="images/buper.jpg" alt="Buper Awilega">
                    </div>
                    <div class="objek-body">
                        <h3>Buper Awilega</h3>
                        <p>Bumi perkemahan bernuansa hutan pinus dengan kapasitas besar untuk kemah, outbound, dan acara komunitas.</p>
                    </div>
                </article>

                <article class="objek-card">
                    <div class="objek-media" data-src="images/bukit-batu-semar.jpg" data-caption="Bukit Batu Semar — Panorama puncak bukit">
                        <img src="images/bukit.jpg" alt="Bukit Batu Semar">
                    </div>
                    <div class="objek-body">
                        <h3>Bukit Batu Semar</h3>
                        <p>Puncak bukit dengan panorama alam yang menawan — tempat favorit untuk menikmati matahari terbit dan fotografi landscape.</p>
                    </div>
                </article>
            </div>
        </section>

        <section id="tentang" class="tentang container">
            <h2>Tentang Desa Wisata Bantaragung</h2>
            <p>
                Sebagai salah satu upaya memajukan perekonomian masyarakat Desa Bantaragung, program desa wisata ini juga difokuskan untuk membangun sumber daya manusia (SDM) agar masyarakat menjadi sadar wisata. Pembangunan desa wisata merupakan langkah strategis untuk meningkatkan kesejahteraan karena semua warga dapat dilibatkan secara partisipatif dalam setiap pengembangan—mulai dari pengelolaan alam hingga pemanfaatan sumber daya manusia setempat.
            </p>

            <p>
                Dengan adanya desa wisata, masyarakat dapat memperoleh penghasilan melalui kegiatan ekonomi lokal: produksi home industry (makanan, minuman, suvenir), layanan pemandu (guide), pertunjukan kesenian tradisional, serta penyediaan penginapan homestay bagi wisatawan. Beberapa program prioritas telah dirancang untuk membangun produk unggulan dan mengintegrasikan destinasi menjadi paket wisata yang kami namakan "Balik Kalembur" (Pulang Kampung) — termasuk paket bermalam di hutan yang disebut "Ngendong di Leuweng".
            </p>

            <h3>Potensi Wilayah</h3>
            <h4>Potensi Fisik</h4>
            <p>
                Desa Bantaragung terletak di kaki Gunung Ciremai dan memiliki akses jalan yang baik, kontur tanah yang mendukung, pemandangan alam yang indah, serta lima objek wisata utama yang sudah dikembangkan oleh komunitas lokal. Kondisi fisik ini sangat mendukung pengembangan atraksi alam dan kegiatan wisata luar ruang.
            </p>

            <h4>Potensi Non-Fisik</h4>
            <p>
                Potensi non-fisik meliputi karakter masyarakat dan budaya setempat yang menjadi nilai tambah bagi pariwisata: mayoritas mata pencaharian petani, kuatnya kebiasaan gotong royong, pelestarian tradisi dan adat, serta keramahtamahan warga.
            </p>

            <h3>Kegiatan Desa & Kearifan Lokal</h3>
            <p>Kegiatan rutin dan kearifan lokal dapat dikemas menjadi paket wisata pengalaman (experiential tourism). Contoh kegiatan yang telah dan dapat dikembangkan menjadi atraksi wisata:</p>
            <ul>
                <li>Ritual budaya: Nyura (pembuatan bubur syura), Safar (pembuatan apem bersama), dan Seba (tradisi kepada Keraton Cirebon).</li>
                <li>Kegiatan pertanian: kesempatan ikut bertani, panen, dan belajar teknik tani tradisional.</li>
                <li>Industri rumah tangga: produksi makanan khas, olahan, dan suvenir.</li>
                <li>Suguhan budaya: pertunjukan pencak silat, jaipongan, dan musik tradisional.</li>
                <li>Event komunitas: perayaan desa (HUT), festival layang-layang, dan festival panen durian.</li>
            </ul>

            <h3>Destinasi Unggulan</h3>
            <p>Beberapa destinasi yang telah berjalan dan menjadi andalan Desa Wisata Bantaragung:</p>
            <ol>
                <li><strong>Ciboer Pass</strong> — Terasering persawahan yang indah dengan aliran sungai; populer untuk tubing dan menikmati pemandangan.</li>
                <li><strong>Curug Cipeuteuy</strong> — Air terjun yang tertata dan dikelola oleh koperasi masyarakat.</li>
                <li><strong>Batu Asahan</strong> — Destinasi ekologi dengan karakteristik alam yang khas.</li>
                <li><strong>Buper Awilega</strong> — Bumi perkemahan bernuansa hutan pinus dengan kapasitas besar untuk acara kemah dan outbound.</li>
                <li><strong>Bukit Batu Semar</strong> — Puncak bukit dengan panorama alam yang menawan.</li>
            </ol>

            <h3>Prestasi</h3>
            <p>Beberapa pengakuan dan prestasi yang pernah diraih desa/destinasi:</p>
            <ul>
                <li>Perlombaan Wana Lestari (Curug Cipeuteuy) — 2016</li>
                <li>Anugerah Pesona Indonesia — Juara 3 kategori 'Surga Tersembunyi Terpopuler' (2017)</li>
                <li>Peringkat 1 Desa Binaan Konservasi Terbaik — 2018</li>
                <li>ADWI 2023 — Penghargaan pada kategori digital dan kreatif</li>
            </ul>

            <h3>Keunggulan & Pengalaman Pengunjung</h3>
            <p>
                Desa Wisata Bantaragung menawarkan kombinasi keindahan alam, budaya lokal yang kaya, dan keramahan masyarakat. Aktivitas populer meliputi trekking, camping, bersepeda, serta pengalaman bertani dan mempelajari kearifan lokal. Wisatawan juga dapat menikmati kuliner tradisional seperti nasi liwet dan berbagai olahan lokal.
            </p>

            <p>
                Saat mengunjungi Desa Wisata Bantaragung, pengunjung disarankan untuk berinteraksi dengan komunitas lokal, menghormati tradisi setempat, dan memilih produk-produk lokal untuk mendukung perekonomian masyarakat.
            </p>
        </section>

        <section id="paket" class="paket-wisata container">
            <h2>Paket Wisata</h2>
            <div class="paket-container">
                <article class="paket-card">
                    <img src="images/paket1.jpg" alt="Paket Eduwisata Bantaragung">
                    <div class="paket-body">
                        <h3>Paket Eduwisata Bantaragung</h3>
                        <p>Belajar budaya dan alam lokal khas Desa Bantaragung serta fungame</p>
                        <span class="harga"> Mulai dari Rp 85.000</span>
                        <a href="pemesanan.php" class="btn primary">Pesan Sekarang</a>
                    </div>
                </article>

                <article class="paket-card">
                    <img src="images/paket2.jpg" alt="Paket Camping Batu Lawang">
                    <div class="paket-body">
                        <h3>Paket Camping Curug Cipeuteuy</h3>
                        <p>Include tenda & konsumsi — pengalaman malam di alam terbuka.</p>
                        <span class="harga">Mulai dari Rp 350.000</span>
                        <a href="pemesanan.php" class="btn primary">Pesan Sekarang</a>
                    </div>
                </article>
                </article>

                <article class="paket-card">
                    <img src="images/paket3.jpg" alt="Paket Desa Wisata Bantaragung">
                    <div class="paket-body">
                        <h3>Paket Desa Wisata Bantaragung</h3>
                        <p>Tersedia berbagaimacam paket edukasi, budaya dan alam terbuka.</p>
                        <span class="harga">Mulai dari Rp 100.000</span>
                        <a href="pemesanan.php" class="btn primary">Pesan Sekarang</a>
                    </div>
                </article>

                <article class="paket-card">
                    <img src="images/paket4.jpg" alt="Paket Camping Batu Lawang">
                    <div class="paket-body">
                        <h3>Paket Live in desa Bantaragung</h3>
                        <p>Dua hari dua malam di Bantaragung dengan fasilitas nyaman.</p>
                        <span class="harga">Rp 750.000 per paket</span>
                        <a href="pemesanan.php" class="btn primary">Pesan Sekarang</a>
                    </div>
                </article>
            </div>
        </section>

        <section id="fasilitas" class="fasilitas container">
            <h2>Fasilitas</h2>
            <p class="lead">Berbagai fasilitas lengkap tersedia untuk kenyamanan dan kemudahan pengunjung selama berkunjung ke Desa Wisata Bantaragung.</p>

            <div class="fasilitas-grid">
                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🏠</div>
                    <h3>Akomodasi</h3>
                    <p>Homestay dan penginapan nyaman dengan fasilitas modern dan layanan ramah dari masyarakat lokal.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🚗</div>
                    <h3>Transportasi</h3>
                    <p>Akses jalan yang baik dan layanan transportasi memudahkan pengunjung dari berbagai daerah.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🍽️</div>
                    <h3>Kuliner</h3>
                    <p>Warung makan dan restoran lokal menyajikan makanan tradisional khas Desa Bantaragung.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🚻</div>
                    <h3>Sanitasi</h3>
                    <p>Toilet dan fasilitas kebersihan terjaga di berbagai lokasi wisata dan area publik.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">👨‍💼</div>
                    <h3>Pemandu Wisata</h3>
                    <p>Pemandu lokal berpengalaman siap membimbing Anda mengeksplorasi potensi alam dan budaya desa.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">📱</div>
                    <h3>Konektivitas</h3>
                    <p>Jaringan komunikasi dan internet tersedia untuk memudahkan Anda tetap terhubung.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🏥</div>
                    <h3>Kesehatan</h3>
                    <p>Fasilitas kesehatan dasar dan akses cepat ke layanan medis untuk keamanan pengunjung.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🛍️</div>
                    <h3>Toko Suvenir</h3>
                    <p>Berbagai suvenir dan produk lokal berkualitas yang dapat dibawa pulang sebagai kenang-kenangan.</p>
                </article>

                <article class="fasilitas-card">
                    <div class="fasilitas-icon">⛺</div>
                    <h3>Perkemahan</h3>
                    <p>Area camping dan perkemahan lengkap dengan peralatan yang dapat disewa untuk aktivitas outdoor.</p>
                </article>

                                <article class="fasilitas-card">
                    <div class="fasilitas-icon">🅿️</div>
                    <h3>Parkiran</h3>
                    <p>Area parkiran motor dan mobil  yang luas dan aman anti maling.</p>
                </article>
            </div>
        </section>

<section id="video" class="video container">
    <h2>Video Promosi</h2>

    <div class="video-list">
        <div class="video-media">
            <iframe src="https://www.youtube.com/embed/yb9ibNZLbxs"
                title="Video Desa Wisata Bantaragung 1" allowfullscreen></iframe>
        </div>

        <div class="video-media">
            <iframe src="https://www.youtube.com/embed/QY1VUiMJbUg?si=MRTh_109FLVOD2Du"
                title="Video Desa Wisata Bantaragung 2" allowfullscreen></iframe>
        </div>

        <div class="video-media">
            <iframe src="https://www.youtube.com/embed/53t7OQ3KM4s?si=NyaCgkhh0oP2oSEj"
                title="Video Desa Wisata Bantaragung 3" allowfullscreen></iframe>
        </div>
    </div>
</section>


       


        <section id="galeri" class="galeri container">
            <h2>Galeri</h2>
            <p class="lead">Koleksi foto memukau dari keindahan alam, budaya, dan aktivitas di Desa Wisata Bantaragung.</p>

            <div class="gallery-grid">
                <div class="gallery-item" data-src="images/galery1.jpg" data-caption="Pemandangan alam Bantaragung">
                    <img src="images/galery1.jpg" alt="Pemandangan alam Bantaragung">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>

                <div class="gallery-item" data-src="images/galery2.jpg" data-caption="Keindahan sawah & sungai">
                    <img src="images/galery2.jpg" alt="Keindahan sawah & sungai">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>

                <div class="gallery-item" data-src="images/galery3.jpg" data-caption="Budaya dan aktivitas lokal">
                    <img src="images/galery3.jpg" alt="Budaya dan aktivitas lokal">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>

                <div class="gallery-item" data-src="images/galery1.jpg" data-caption="Destinasi wisata Ciremai">
                    <img src="images/galery4.jpg" alt="Destinasi wisata Ciremai">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>

                <div class="gallery-item" data-src="images/galery2.jpg" data-caption="Aktivitas outdoor menarik">
                    <img src="images/galery5.jpg" alt="Aktivitas outdoor menarik">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>

                <div class="gallery-item" data-src="images/galery3.jpg" data-caption="Pengalaman petualangan alam">
                    <img src="images/galery6.jpg" alt="Pengalaman petualangan alam">
                    <div class="gallery-overlay">
                        <div class="gallery-icon">🔍</div>
                    </div>
                </div>
            </div>
        </section>
    </main>


     <footer class="footer">
    <div class="container">
        <p>&copy; 2025 Desa Wisata Bantaragung — Majalengka</p>
        <p class="small">Dikelola oleh komunitas lokal • <a href="#">Hubungi</a></p>

        <div class="contact-info">
            <p><strong>Contact Person:</strong> Wawan Hermawanto</p>
            <p><strong>Email:</strong> <a href="mailto:desawisatabantaragung@gmail.com">
                desawisatabantaragung@gmail.com</a></p>
            <p><strong>Instagram:</strong> 
                <a href="https://instagram.com/desawisata_bantaragung" target="_blank">
                    @desawisata_bantaragung
                </a>
            </p>
        </div>
    </div>
</footer>

    <script src="script.js"></script>
</body>
</html>