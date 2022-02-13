@extends('layouts.app')

@section('css')
@endsection

@section('content')
  <div class="rekening-page">
    <div class="container">
      <div class="row">
        <section class="col-12">
          <div class="wrapper-boxtext">
            <h1 class="box-title">Daftar Rekening</h1>
            <h4 class="clr-green mb-4">Zakat</h4>
            <div class="box-detail">
              <p>
                Zakat merupakan salah satu rukun Islam dan wajib ditunaikan jika sudah memenuhi ketentuan-ketentuannya. Para ulama mendefiniskan zakat sebagai berikut:<br>
                “Zakat adalah sebuah nama untuk menyebutkan kadar harta tertentu yang didistribusikan kepada kelompok tertentu pula dengan pelbagai syarat-syaratnya”. (Muhammad al-Khatib asy-Syarbini, Mughni al-Muhtaj ila Ma’rifati Alfazh al-Minhaj, Bairut-Dar al-Fikr, tt, juz, 1, h. 368).
              </p>
            </div>
            <h4 class="clr-green mb-4">Infaq</h4>
            <div class="box-detail">
              <p>
                Infak adalah menggunakan atau membelanjakan harta-benda untuk pelbagai kebaikan, seperti untuk pergi haji, umrah, menafkahi keluarga, menunaikan zakat, dan lain sebagainya. Oleh karena itu orang yang menghambur-hamburkan atau yang menyia-nyiakan harta bendanya tidak bisa disebut munfiq (orang yang berinfak). Pengertian Infak ini sebagaimana dikemukakan Imam Fakhruddin ar-Razi:<br>
                “Ketahuilah bahwa Infak adalah membelanjakan harta-benda untuk hal-hal yang mengandung kemaslahatan. Oleh karena itu orang yang menyia-nyiakan harta bendanya tidak bisa disebut sebagai munfiq (orang yang berInfak). (Fakhruddin ar-Razi, Mafatih al-Ghaib, Bairut-Daru Ihya` at-Turats al-‘Arabi, tt, juz, 5, h. 293).
              </p>
            </div>
            <h4 class="clr-green mb-4">Shadaqah</h4>
            <div class="box-detail">
              <p>
                Selanjutnya shadaqah, menurut ar-Raghib al-Ishfani adalah harta benda yang dikeluarkan orang dengan tujuan untuk mendekatkan diri kepada Allah. “Shadaqah adalah harta-benda yang dikeluarkan orang dengan tujuan untuk mendekatkan diri kepada Allah swt. Namun pada dasarnya shadaqah itu digunakan untuk sesuatu yang disunnahkan, sedang zakat untuk sesuatu yang diwajibkan”. (Abdurra’uf am-Manawi, at-Tauqif fi Muhimmat at-Ta’arif, Bairut-Dar al-Fikr, cet ke-1, 1410 H, h. 453) Dari penjelasan di atas setidaknya dapat ditarik kesimpulan bahwa Infak itu lebih umum karena mencakup juga shadaqah dan zakat. Sedangkan shadaqah adalah apa yang diberikan oleh seseorang dengan tujuan untuk mendekatkan diri kepada Allah swt, dan tercakup di dalamnya adalah zakat. Bedanya, zakat itu merupakan shadaqah wajib yang diambil dari harta yang tertentu seperti emas, perak (atau harta simpanan), dan binatang ternak. Disamping itu zakat diberikan kepada kalangan tertentu yang jumlahnya delapan (al-ashnaf ats-tsamaniyah), dan pada waktu tertentu juga. Di sisi lain, shadaqah itu ada dua. Pertama adalah shadaqah wajib yang disebut zakat. Kedua adalah shadaqah tathawwu` atau shadaqah sunnah. Shadaqah tathawwu` tidak harus diberikan ke delapan golongan yang wajib menerima zakat. Namun kata shadaqah kemudian lebih digunakan untuk shadaqah tathawwu` untuk membedakan dengan istilah zakat. Hal lain yang juga membedakan shadaqah tathawwu` adalah shadaqah tathawwu` lebih utama diberikan secara diam-diam, sedangkan zakat lebih utama diberikan secara terbuka, agar bisa menjadi taulan bagi yang lainnya. “Imam ath-Thabari dan ulama lainnya telah menukil ijma’ bahwa diam-diam dalam memberikan shadaqah tathawwu` itu lebih utama, dan memperlihatkan dalam memberikan shadaqah wajib (zakat) itu lebih utama”. (Wizarah al-Awqaf wa asy-Syu`un al-Islamiyah Kuwait, al-Mausuah al-Fiqhiyyah al-Kuwaitiyyah, Bairut-Dar as-Salasil, cet ke-2, 1404 H, juz, 2, h. 287).
              </p>
            </div>
            <h4 class="clr-green mb-4">Wakaf</h4>
            <div class="box-detail">
              <p>
                Wakaf adalah menahan harta yang bisa diambil manfaaatnya dengan tetap kekalnya dzat harta itu sendiri dan mantasharrufkan kemanfaatannya di jalan kebaikan dengan tujuan mendekatkan diri kepada Allah swt. Konsekuensi dari hal ini adalah dzat harta-benda yang diwakafkan tidak boleh ditasharrufkan. Sebab yang ditasharrufkan adalah manfaatnya. Hal ini sebagaimana dikemukakan oleh penulis kitab Kifayah al-Akhyar sebagai berikut; “Definisi wakaf menurut syara’ adalah menahan harta-benda yang memungkinkan untuk mengambil manfaatnya beserta kekalnya dzat harta-benda itu sendiri, dilarang untuk mentasaharrufkan dzatnya. Sedang mentasharrufkan kemanfaatannya itu dalam hal kebaikan dengan tujuan mendekatkan diri kepada Allah swt” (Taqiyyuddin Abi Bakr bin Muhammad al-Husaini al-Hishni ad-Dimasyqi asy-Syafi’i, Kifayah al-Akhyar fi Halli Ghayah al-Ikhtishar, Surabaya-Dar al-‘Ilm, tt, juz, 1, h. 256). Persoalannya bagaimana dengan wakaf uang? Dalam kasus ini setidaknya para ulama terbelah menjadi dua pendapat. Pendapat pertama menyatakan bahwa bahwa wakaf uang (waqf an-nuqud) secara mutlak tidak diperbolehkan. “Adapun wakaf sesuatu yang tidak bisa diambil manfaatnya kecuali dengan melenyapkannya seperti emas, perak, makanan, dan minuman maka tidak boleh menurut mayoritas fuqaha. Yang dimaksud dengan emas dan perak adalah dinar dan dirham dan yang bukan dijadikan perhiasan”. (Syaikh Nizham dan para ulama India, al-Fatawa al-Hindiyah, Bairut-Dar al-Fikr, tt, juz, 2, h. 362) Sedang pendapat kedua menyatakan bahwa wakaf uang diperbolehkan. Hal sebagaimana pandangan Ibnu Syihab az-Zuhri yang memperbolehkan wakaf dinar sebagaimana dinukil al-Bukhari. “Telah dinisbatkan pendapat yang mensahkan wakaf dinar kepada Ibnu Syihab az-Zuhri dalam riwayat yang telah dinukil Imam Muhammad bin Isma’il al-Bukhari dalam kitab Shahihnya. Ia berkata, Ibnu Syihab az-Zuhri berkata mengenai seseorang yang menjadikan seribu dinar di jalan Allah (mewakafkan). Ia pun memberikan uang tersebut kepada budak laki-lakinya yang menjadi pedagang. Maka si budak pun mengelola uang tersebut untuk berdagang dan menjadikan keuntungannya sebagai sedekah kepada orang-orang miskin dan kerabat dekatnya. Lantas, apakah lelaki tersebut boleh memakan dari keuntungan seribu dinar tersebut jika ia tidak menjadikan keuntungannya sebagai sedekah kepada orang-orang miksin? Ibnu Syihab az-Zuhri berkata, ia tidak boleh memakan keuntungan dari seribu dinar tersebut” (Abu Su’ud Muhammad bin Muhammad Mushthafa al-‘Imadi al-Afandi al-Hanafi, Risalah fi Jawazi Waqf an-Nuqud, Bairut-Dar Ibn Hazm, cet ke-1, 1417 H/1997 M, h. 20-21). Dengan mengacu kepada pendapat Ibnu Syihab az-Zuhri ini maka cara atau teknik mewakafkan uang adalah dengan menjadikannya sebagai modal usaha. Dan keuntungan yang diperoleh diberikan kepada mauquf ‘alaih atau pihak yang menerima manfaat dari harta wakaf. Dari penjelasan singkat ini dapat dipahami bahwa wakaf uang termasuk bagian dari infak. Sebab, infak —sebagaimana telah dijelaskan— adalah menggunakan atau membelanjakan harta-benda untuk pelbagai kebaikan, seperti untuk pergi haji, umrah, menafkahi keluarga, menunaikan zakat, dan lain sebagainya. Termasuk di dalamnya adalah wakaf dengan pelbagai macamnya. Sedang mengenai perbedaannya dengan zakat dan shadaqah hemat kami sudah sangat jelas sehingga tidak perlu diterangkan. Demikian penjelasan singkat ini semoga bermanfaat. Mohon maaf atas keterlambatan jawaban yang kami berikan. Dan jika anda punya harta-benda berlebih, segeralah diwakafkan karena itu termasuk shadaqah yang pahalanya selalu mengalir. (Mahbub Ma’afi Ramdlan)
              </p>
            </div>
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