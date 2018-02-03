@extends('layouts.master') @section('content')
<style type="text/css">
body{background-color:#fff8a0;background-image:url(/image/hto-bg.png),url(/image/hto-bg-2.png);background-position:center left,bottom right;background-repeat:no-repeat;height:auto}.navbar-white{background:#fff8a0}.hto-title{background-color:#79c6cc;background-image:url(/image/hto-bg-title.png);background-repeat:no-repeat;background-size:contain;color:#fff;font-weight:700;font-size:2rem;padding:3rem 2rem;border-radius:.75rem;line-height:2rem;margin:0 2rem}.hto-desc{font-size:.85rem;margin:.75rem auto 1.75rem;max-width:80%;font-weight:700;text-transform:uppercase}.blue-circle,.red-circle{width:5rem;height:5rem;align-items:center;justify-content:center;display:flex;margin:auto;border-radius:50%}.red-circle{background:#f17c88}.blue-circle{background:#75c8ce}.baiza-cart,.baiza-checked,.baiza-delivery,.baiza-hourglass,.baiza-key,.baiza-pay,.baiza-search,.baiza-sushi,.baiza-sushi-essential,.baiza-sushi-sauce,.baiza-sushi-special,.baiza-sushi-sprinkle,.baiza-wallet{display:inline-block;background:url(/image/hto_sprite.png) no-repeat;overflow:hidden;text-indent:-9999px;text-align:left}.baiza-delivery{background-position:-1px 0;width:54px;height:32px}.baiza-sushi-sauce{background-position:-1px -33px;width:51px;height:51px}.baiza-checked{background-position:-1px -85px;width:49px;height:37px}.baiza-cart{background-position:-1px -123px;width:47px;height:47px}.baiza-sushi-sprinkle{background-position:-1px -171px;width:47px;height:45px}.baiza-pay{background-position:-1px -217px;width:46px;height:44px}.baiza-sushi-essential{background-position:-1px -262px;width:43px;height:43px}.baiza-sushi{background-position:-1px -306px;width:43px;height:33px}.baiza-wallet{background-position:-1px -340px;width:42px;height:42px}.baiza-key{background-position:-1px -383px;width:40px;height:40px}.baiza-search{background-position:-1px -424px;width:39px;height:39px}.baiza-hourglass{background-position:-1px -464px;width:38px;height:42px}.baiza-sushi-special{background-position:-1px -507px;width:32px;height:52px}@media only screen and (max-width:768px){body{background-image:none}.hto-title{margin:0;font-size:1rem;line-height:1rem;text-align:center}.hto-desc{max-width:100%;font-size:.65rem;font-weight:600}}
</style>
<div class="container full-container">
    <div class="row mx-0">
        <div class="col-md-8 col-12 mx-auto mt-5 px-0">
            <div class="hto-title">
                <div class="col-md-8 col-12 px-0 ml-auto">
                    PILIH KATEGORI SUSHI KESUKAAN KAMU
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-0 mt-5">
        <div class="col-md-4 ml-auto col-6 align-items-end text-center">
            <img src="image/hto-myos.png" alt="" class="img-fluid">
            <div class="hto-desc">SUSHI DENGAN NETA YANG BISA KAMU PILIH SESUAI DENGAN KESUKAANMU :)</div>
            <div class="red-circle">
                <div class="baiza-sushi"></div>
            </div>
            <div class="hto-desc">
                Pilih ukuran sushi kamu.
            </div>
            <div class="red-circle">
                <div class="baiza-sushi-essential"></div>
            </div>
            <div class="hto-desc">
                Pilih Essentials Menu isian sushi kamu.
            </div>
            <div class="red-circle">
                <div class="baiza-sushi-special"></div>
            </div>
            <div class="hto-desc">
                Pilih Special Menu isian sushi kamu. ( Khusus untuk ukuran besar ).
            </div>
            <div class="red-circle">
                <div class="baiza-sushi-sprinkle"></div>
            </div>
            <div class="hto-desc">
                Pilih Sprinkle Menu isian sushi kamu.
            </div>
            <div class="red-circle">
                <div class="baiza-sushi-sauce"></div>
            </div>
            <div class="hto-desc">
                Pilih sauce favorit kamu.
            </div>
            <div class="red-circle">
                <div class="baiza-search"></div>
            </div>
            <div class="hto-desc">
                Klik "Detail Order"
            </div>
            <div class="red-circle">
                <div class="baiza-cart"></div>
            </div>
            <div class="hto-desc">
                Klik "Add To Cart"
            </div>
            <div class="red-circle">
                <div class="baiza-key"></div>
            </div>
            <div class="hto-desc">
                Silahkan Log in menggunakan akun Facebook atau Google kamu.
            </div>
            <div class="red-circle">
                <div class="baiza-checked"></div>
            </div>
            <div class="hto-desc">
                Klik "Check Out"
            </div>
            <div class="red-circle">
                <div class="baiza-pay"></div>
            </div>
            <div class="hto-desc">
                Klik "Detail Pembayaran"
            </div>
            <div class="red-circle">
                <div class="baiza-wallet"></div>
            </div>
            <div class="hto-desc">
                Silahkan lakukan pembayaran ke rekening yang tertera.
            </div>
            <div class="red-circle">
                <div class="baiza-hourglass"></div>
            </div>
            <div class="hto-desc">
                Silahkan tunggu konfirmasi pemesanan.
            </div>
            <div class="red-circle">
                <div class="baiza-delivery"></div>
            </div>
            <div class="hto-desc">
                Pesananmu siap diantar.
            </div>
        </div>
        <div class="col-md-4 mr-auto col-6 align-items-end text-center">
            <img src="image/hto-rtos.png" alt="" class="img-fluid">
            <div class="hto-desc">Special sushi menu dari baiza yang mempunyai cita rasa khas baiza sushi</div>
            <div class="blue-circle">
                <div class="baiza-sushi"></div>
            </div>
            <div class="hto-desc">
                Pilih sushi favorit kamu.
            </div>
            <div class="blue-circle">
                <div class="baiza-search"></div>
            </div>
            <div class="hto-desc">
                Klik "Detail Order"
            </div>
            <div class="blue-circle">
                <div class="baiza-cart"></div>
            </div>
            <div class="hto-desc">
                Klik "Add To Cart"
            </div>
            <div class="blue-circle">
                <div class="baiza-key"></div>
            </div>
            <div class="hto-desc">
                Silahkan Log in menggunakan akun Facebook atau Google kamu.
            </div>
            <div class="blue-circle">
                <div class="baiza-checked"></div>
            </div>
            <div class="hto-desc">
                Klik "Check Out"
            </div>
            <div class="blue-circle">
                <div class="baiza-pay"></div>
            </div>
            <div class="hto-desc">
                Klik "Detail Pembayaran"
            </div>
            <div class="blue-circle">
                <div class="baiza-wallet"></div>
            </div>
            <div class="hto-desc">
                Silahkan lakukan pembayaran ke rekening yang tertera.
            </div>
            <div class="blue-circle">
                <div class="baiza-hourglass"></div>
            </div>
            <div class="hto-desc">
                Silahkan tunggu konfirmasi pemesanan.
            </div>
            <div class="blue-circle">
                <div class="baiza-delivery"></div>
            </div>
            <div class="hto-desc">
                Pesananmu siap diantar.
            </div>
        </div>
    </div>
    <div class="text-center col-md-3 col-12 mx-auto mt-5">
        <a href="/product" class="btn btn-blue btn-lg mt-4 btn-block">Buy Sushi</a>
    </div>
</div>
@stop