@extends('layouts.app')

@section('title')
  Privacy & Policy
@endsection

@section('meta')
  <meta name="title" content="Privacy & Policy - NU CARE">
  <meta name="description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="Privacy & Policy - NU CARE">
  <meta property="og:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="og:image" content="{{ asset('img/meta-image.jpeg') }}">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="{{ Request::url() }}">
  <meta property="twitter:title" content="Privacy & Policy - NU CARE">
  <meta property="twitter:description" content="NU CARE-LAZISNU adalah situs resmi Lembaga Amil Zakat, Infaq dan Shadaqah Nahdlatul Ulama yang dikelola oleh PC NU Care-LAZISNU Kabupaten Mukomuko">
  <meta property="twitter:image" content="{{ asset('img/favicon.png') }}">
@endsection

@section('css')
<style>
    [data-custom-class='body'],
    [data-custom-class='body'] * {
        background: transparent !important;
    }

    [data-custom-class='title'],
    [data-custom-class='title'] * {
        font-family: Arial !important;
        font-size: 26px !important;
        color: #000000 !important;
    }

    [data-custom-class='subtitle'],
    [data-custom-class='subtitle'] * {
        font-family: Arial !important;
        color: #595959 !important;
        font-size: 14px !important;
    }

    [data-custom-class='heading_1'],
    [data-custom-class='heading_1'] * {
        font-family: Arial !important;
        font-size: 19px !important;
        color: #000000 !important;
    }

    [data-custom-class='heading_2'],
    [data-custom-class='heading_2'] * {
        font-family: Arial !important;
        font-size: 17px !important;
        color: #000000 !important;
    }

    [data-custom-class='body_text'],
    [data-custom-class='body_text'] * {
        color: #595959 !important;
        font-size: 14px !important;
        font-family: Arial !important;
    }

    [data-custom-class='link'],
    [data-custom-class='link'] * {
        color: #3030F1 !important;
        font-size: 14px !important;
        font-family: Arial !important;
        word-break: break-word !important;
    }
</style>
<style>
    ul {
        list-style-type: square;
    }

    ul>li>ul {
        list-style-type: circle;
    }

    ul>li>ul>li>ul {
        list-style-type: square;
    }

    ol li {
        font-family: Arial;
    }
</style>
@endsection

@section('content')
<div class="about-page">
    <div class="container">
        <div class="cus-breadcrumb">
            <span>Beranda</span> / <span>Tentang</span> / <span class="current">Privasi dan Kebijakan</span>
        </div>
        <div class="row">
            <section class="col-12">
                <div class="wrapper-boxtext">
                    <div class="box-detail">

                        <div data-custom-class="body">
                            <header>
                                <h2>Kebijakan Privasi Aplikasi Koin NU</h2>
                            </header>
                            <hr>
                            <section>
                                <h4>1. Pendahuluan</h4>
                                <p>Koin NU adalah aplikasi yang dikembangkan oleh NU Care LAZISNU Mukomuko, Bengkulu, Indonesia. Kami berkomitmen untuk melindungi dan menghargai privasi Anda. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data pribadi Anda saat menggunakan aplikasi kami. Dengan mengunduh, menginstal, atau menggunakan Koin NU, Anda menyetujui ketentuan yang diuraikan dalam kebijakan ini.</p>
                            </section>

                            <section>
                                <h4>2. Data yang Kami Kumpulkan</h4>
                                <p>Kami mengumpulkan berbagai jenis informasi untuk meningkatkan kualitas layanan aplikasi Koin NU:</p>
                                <ul>
                                    <li><strong>Informasi Pribadi</strong>: Nama, alamat email, nomor telepon, dan informasi kontak lainnya yang Anda berikan saat mendaftar atau menggunakan aplikasi.</li>
                                    <li><strong>Data Donasi</strong>: Informasi terkait aktivitas donasi Anda, termasuk jumlah, metode pembayaran, dan detail terkait lainnya.</li>
                                    <li><strong>Informasi Perangkat</strong>: Jenis perangkat, sistem operasi, alamat IP, dan informasi teknis lainnya untuk memastikan fungsionalitas aplikasi dan keperluan analitik.</li>
                                    <li><strong>Data Lokasi</strong>: Jika Anda memberikan izin, kami dapat mengumpulkan informasi lokasi Anda untuk mengoptimalkan fitur tertentu, seperti memberikan rekomendasi titik donasi terdekat.</li>
                                </ul>
                            </section>

                            <section>
                                <h4>3. Bagaimana Kami Menggunakan Data Anda</h4>
                                <p>Kami menggunakan data yang dikumpulkan untuk tujuan berikut:</p>
                                <ul>
                                    <li>Mengelola akun Anda dan memproses donasi.</li>
                                    <li>Meningkatkan pengalaman pengguna dengan menganalisis kinerja aplikasi.</li>
                                    <li>Berkomunikasi dengan Anda terkait donasi atau layanan (misalnya, notifikasi atau penawaran promosi).</li>
                                    <li>Memenuhi kewajiban hukum dan menyelesaikan perselisihan jika diperlukan.</li>
                                </ul>
                                <p>Kami tidak akan menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga. Data Anda hanya dibagikan dengan mitra tepercaya untuk tujuan terkait pengelolaan dan pemrosesan donasi atau layanan aplikasi.</p>
                            </section>

                            <section>
                                <h4>4. Penyimpanan dan Retensi Data</h4>
                                <p>Data pribadi Anda akan disimpan dengan aman di server kami dan/atau penyedia layanan kami. Kami menyimpan data Anda selama diperlukan untuk memenuhi tujuan yang dijelaskan dalam Kebijakan Privasi ini atau sesuai dengan ketentuan hukum.</p>
                            </section>

                            <section>
                                <h4>5. Keamanan Informasi Anda</h4>
                                <p>Kami memprioritaskan keamanan data Anda. Kami menerapkan langkah-langkah keamanan standar industri (seperti enkripsi) untuk melindungi informasi pribadi Anda dari akses yang tidak sah, pengungkapan, atau kehilangan. Namun, tidak ada metode transmisi data melalui internet atau penyimpanan elektronik yang 100% aman, dan kami tidak dapat menjamin keamanan absolut.</p>
                            </section>

                            <section>
                                <h4>6. Hak Anda atas Data Pribadi</h4>
                                <p>Sebagai pengguna, Anda memiliki hak-hak berikut terkait data pribadi Anda:</p>
                                <ul>
                                    <li><strong>Akses</strong>: Anda dapat meminta akses terhadap data pribadi yang kami miliki tentang Anda.</li>
                                    <li><strong>Perbaikan</strong>: Anda dapat meminta kami memperbaiki data yang tidak akurat atau tidak lengkap.</li>
                                    <li><strong>Penghapusan</strong>: Anda dapat meminta penghapusan data pribadi Anda, kecuali jika ada ketentuan hukum yang mengharuskan kami menyimpannya.</li>
                                    <li><strong>Portabilitas Data</strong>: Anda dapat meminta salinan data Anda dalam format yang terstruktur dan mudah dibaca oleh mesin.</li>
                                </ul>
                                <p>Untuk menggunakan hak-hak ini, silakan hubungi kami melalui informasi kontak yang disediakan di bawah ini.</p>
                            </section>

                            <section>
                                <h4>7. Tautan dan Layanan Pihak Ketiga</h4>
                                <p>Koin NU dapat menyertakan tautan ke situs web atau layanan pihak ketiga. Kami tidak bertanggung jawab atas praktik privasi atau konten pihak ketiga tersebut. Kami menyarankan Anda untuk meninjau kebijakan privasi mereka sebelum berinteraksi.</p>
                            </section>

                            <section>
                                <h4>8. Privasi Anak-anak</h4>
                                <p>Layanan kami tidak ditujukan untuk anak-anak di bawah usia 13 tahun, dan kami tidak secara sengaja mengumpulkan data pribadi dari anak-anak. Jika kami mengetahui bahwa kami telah secara tidak sengaja mengumpulkan data dari anak-anak, kami akan mengambil langkah-langkah untuk menghapus data tersebut.</p>
                            </section>

                            <section>
                                <h4>9. Perubahan pada Kebijakan Privasi Ini</h4>
                                <p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Ketika kami melakukan pembaruan, kami akan memberi tahu Anda melalui aplikasi atau saluran lain yang sesuai. Penggunaan aplikasi yang terus berlanjut setelah pembaruan berarti Anda menyetujui kebijakan yang telah diperbarui.</p>
                            </section>

                            {{-- <section>
                                <h4>10. Hubungi Kami</h4>
                                <p>Jika Anda memiliki pertanyaan atau kekhawatiran terkait Kebijakan Privasi ini atau data pribadi Anda, silakan hubungi kami:</p>
                                <p><strong>NU Care LAZISNU Mukomuko</strong><br>
                                [Masukkan Informasi Kontak: Alamat, Email, Telepon]</p>
                            </section> --}}

                            <section>
                                <h4>10. Persetujuan</h4>
                                <p>Dengan menggunakan aplikasi Koin NU, Anda menyetujui ketentuan yang dijelaskan dalam Kebijakan Privasi ini.</p>
                            </section>
                        </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection
