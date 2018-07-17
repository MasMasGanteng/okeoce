@extends('layouts.master')
@section('content')
<style type="text/css">
    body{background:url(/image/terms-bg-1.png) top right no-repeat,url(/image/terms-bg-3.png) bottom right no-repeat #f17c89;height:auto;color:#fff}.container{padding:4em 15px}.container h4{margin-bottom:2em;font-weight:700}.container a,.paragraph .row p{margin-bottom:.5rem;font-size:.9rem}/@media only screen and (max-width:768px){body{background-image:none}}
</style>
<style type="text/css">
    
</style>
<div class="container">
    <h4 class="font-blue text-center">FREQUENTLY ASKED QUESTION</h4>
    @foreach($faq_list as $list)
    <div class="paragraph mb-4">
        <div class="row flex-row font-weight-bold mx-0">
            <p class="mr-2">Q :</p>{!! $list->question !!}
        </div>
        <div class="row flex-row mx-0">
            <p class="mr-2">A :</p>{!! $list->ask !!}
        </div>
    </div>
    @endforeach

    <p>Q : Saya pengguna baru dan belum pernah memesan sebelumnya di Baiza Sushi, bagaimana cara mendaftar?</p>
    <p>A : Klik "Sign Up" di bagian pojok kanan atas pada layar. Masukkan keterangan yang diperlukan dan setujui Syarat dan Ketentuan. Akun Anda akan segera siap digunakan.</p>
    <p>Q : Bagaimana cara saya menambah alamat baru pada akun saya?</p>
    <p>A : Mohon maaf untuk saat ini penambahan alamat baru belum dapat kami lakukan di website Baiza Sushi, namun anda bisa mengganti alamat pengiriman dengan mengirimkan pesan whatsapp ke nomor +628117112112</p>
    <p>Q : Apakah alamat email pada akun saya dapat diganti?</p>
    <p>A : Mohon maaf, saat ini hal tersebut belum dapat dilakukan. Silahkan daftarkan alamat email baru dan mulai melakukan pemesanan.</p>
    <p>Q : Apakah saya bisa minta Baiza Sushi untuk membantu saya mengganti alamat email pada akun saya?</p>
    <p>A : Demi keamanan, Baiza Sushi tidak dapat melakukan penggantian akun dan tidak dapat mengakses email Anda.</p>
    <p>Q : Saya lupa password akun saya, bagaimana cara menggantinya?</p>
    <p>A : Klik "Lupa Password" di bagian pojok kanan atas pada layar Anda. Masukkan alamat email yang Anda daftarkan dan intruksi lebih lanjut akan diemail kepada Anda.</p>
    <p>Q : Saya lupa/ tidak bisa login dengan alamat email yang saya daftarkan pada baizasushi.com. Apa yang harus saya lakukan?</p>
    <p>A : Daftar dengan akun baru dengan alamat email yang berbeda dan Anda dapat mulai lakukan pemesanan.</p>
    <p>Q : Apabila ada anggota keluarga saya yang melakukan pesanan secara online, bisakah kami menggunakan satu akun yang sama?</p>
    <p>A : Ya, Anda bisa menggunakan akun yang sama. Namun, agar lebih aman dan nyaman, kami sarankan agar setiap anggota memiliki akun yang berbeda.Tidak ada biaya untuk pembukaan akun baru.</p>
    <p>Q : Apakah McDelivery dapat melakukan pengantaran 24 jam sehari 7 hari seminggu?</p>
    <p>A : Tidak, demi mempertahankan kenikmatan sushi yang alami Baiza Sushi hanya mengantarkan maksimal pada pukul 17.00</p>
    <p>Q : Apakah ada jumlah minimal pesanan untuk pesan antar?</p>
    <p>A : Ya, minimal pemesanan adalah 2 paket sushi yang berisi 8 potong sushi. ( Tidak termasuk biaya pengiriman ).</p>
    <p>Q : Apakah ada biaya pengiriman?</p>
    <p>A : Ya, biaya pengantaran disesuaikan dengan alamat pengiriman dan jasa pengiriman yang dipilih (sudah termasuk pajak).</p>
    <p>Q : Apakah ada batas maksimal pemesanan melalui Baiza Sushi?</p>
    <p>A : Untuk pengiriman jumlah banyak diatas 30 paket, atau untuk keperluan acara mohon untuk mengkonfirmasi pesanan minimal 3 hari sebelum pengiriman.</p>
    <p>Q : Apakah menu Baiza Sushi sama dengan menu yang ada di restoran Baiza Sushi?</p>
    <p>A : Terkecuali menu yang tidak dapat diantar, sebagian besar menu yang disajikan di restoran tersedia melalui layanan Baiza Sushi. Anda dapat melihat menu Baiza Sushi kami dengan klik "Lihat Menu".</p>
    <p>Q : Apakah pemesanan dan pengiriman Baiza Sushi bisa mencakup seluruh Indonesia?</p>
    <p>A : Tidak dan mohon maaf, saat ini kami hanya bisa pengirman ke daerah Jakarta, Tangerang, Bekasi, &amp; Depok.</p>
    <p>Q : Metode pembayaran apa saja yang dapat dilakukan untuk pemesanan via web?</p>
    <p>A : Saat ini kami hanya bisa menerima pembayaran melalui transfer antar bank ke rekening pe rusahaan kami.</p>
    <p>Q : Bagaimana cara memulai pemesanan?</p>
    <p>A : Klik pada salah satu jenis sushi &ldquo; Make Your Own Sushi " atau &ldquo; Ready To Eat Sushi &ldquo; pada halaman utama atau pada halaman product. Perkiraan waktu pengantaran ke lokasi Anda akan terlihat. Mulailah menambahkan menu kepada daftar pesanan Anda. Apabila Anda belum login, Anda perlu login terlebih dahulu sebelumnya. Untuk mengakhiri, klik "Selesai" di bagian bawah daftar pesanan Anda.</p>
    <p>Q : Bagaimana saya mengganti/menghapus pesanan dari daftar pesanan saya?</p>
    <p>A : Anda dapat menghapus tanda ceklist pada pesanan anda.</p>
    <p>Q : Bagaimana saya mengetahui bahwa restoran telah menerima pesanan saya?</p>
    <p>A : Setelah Anda menyelesaikan pesanan Anda, kami akan mengirimkan email konfirmasi ke alamat email yang telah Anda daftarkan. Silahkan periksa folder "Spam" atau "Junk Email" untuk memastikan Anda menerima email kami. Apabila Anda masih kurang yakin, Anda dapat menghubungi +628117112112 untuk memeriksa status pesanan Anda.</p>
    <p>Q : Apa yang harus saya lakukan jika saya tidak menerima email konfirmasi setelah saya selesai memesan?</p>
    <p>A : Mohon periksa folder "Spam" atau "Junk" pada email Anda. Apabila belum diterima, mohon dapat menghubungi Baiza Sushi +628117112112.</p>
    <p>Q : Berapa waktu yang dibutuhkan untuk mengantar pesanan?</p>
    <p>A : Kami berusaha mengantar pesanan secepat mungkin.</p>
    <p>Q : Apakah saya dapat membatalkan pesanan saya?</p>
    <p>A : Ya, Anda dapat membatalkan pesanan Anda dengan menghubungi +628117112112, selama pesanan Anda belum diantar dari restoran.</p>
    <p>Q : Bagaimana jika saya telah selesai memesan dan saya mau mengubah/menambah pesanan?</p>
    <p>A : Hal ini dapat dilakukan dengan menghubungi Baiza Sushi Delivery +628117112112 dan meminta bantuan petugas kami untuk mengubah/menambahkan pesanan Anda. Apabila pesanan Anda sudah diantar dari restoran, Anda dapat membuat pesanan baru di <a href="/">baizasushi.com</a></p>
    <p>Q : Apabila ada kekurangan produk pada pesanan yang diantar, apa yang saya dapat lakukan?</p>
    <p>A : Silahkan hubungi Baiza Sushi Delivery +628117112112 dan sampaikan hal ini kepada operator kami. Kami akan mengkordinasikan pengantarannya kepada Anda.</p>
</div>
@stop
