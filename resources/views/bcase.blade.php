<!DOCTYPE html>
<html>
    <head>
        @component("components.meta", ["title" => "Business-IT Case"])
        @endcomponent
    </head>
    <body>
        <div class="container-2 content-top bg-event">
            @component("components.navbar")
            @endcomponent
            @component("components.navbar-mobile", ['event' => ['register' => '/register/1'], 'template' => 'event-details'])
            @endcomponent
            <div class="margin-2 text-center content-divider">
                <h3>COMPETITION</h3>
                <h1 class="gradient-text display-2 font-800">Mobile Application Development</h1>
                <a class="button button-gradient" href="/register/1">REGISTER</a>
                <a class="button button-white" href="#rules">RULES</a>
            </div>
        </div>
        <div class="container-1">
            <img class="container-clip" src="/img/backgrounds/2.png">
            <div class="about-container margin-2 after-container-clip">
                <div>
                    <h2 class="partial-underline custom">
                        <img src="/img/icons/Events - Business-IT Case.png" class="about-image"><br>
                        about this<br><span>competition.</span>
                        <div class="guide"><span>competition</span></div>
                    </h2>
                </div>
                <div>
                    <p class="h5">
                        Business-IT Case Competition COMPUTERUN merupakan ajang kompetisi Business Case berskala nasional yang diselenggarakan untuk seluruh mahasiswa S1 dari seluruh perguruan tinggi di Indonesia.
                    </p>
                    <p class="h5">
                        Lomba ini dapat mengasah kemampuan mahasiswa untuk berkerja dan bersinergi dalam satu tim dan menyelesaikan sebuah kasus nyata yang terjadi dalam sebuah perusahaan, dan juga untuk mengembangkan sikap solutif agar para mahasiswa terlatih untuk menghadapi masalah dalam dunia bisnis dan TI di masa mendatang serta dapat menciptakan solusi kreatif yang efektif secara bersama-sama sehingga masalah dapat terselesaikan dengan baik.
                    </p>
                </div>
            </div>
            <div class="with-computerun-background">
                <h1>prizes</h1>
            </div>
        </div>
        <div class="container-0">
            <img class="container-clip" src="/img/backgrounds/5.png">
            <div class="icons-container items-3 after-container-clip">
                <div>
                    <img src="/img/icons/1st.png"><br>
                    <span class="h5">Winner</span><br>
                    <span class="h3">IDR 3.500.000</span>
                </div>
                <div>
                    <img src="/img/icons/2nd.png"><br>
                    <span class="h5">First Runner Up</span><br>
                    <span class="h3">IDR 2.500.000</span>
                </div>
                <div>
                    <img src="/img/icons/3rd.png"><br>
                    <span class="h5">Second Runner Up</span><br>
                    <span class="h3">IDR 1.500.000</span>
                </div>
            </div>
            <h1 class="full-underline after-icons-container">general FAQ</h1>
            <div class="margin-2 h5">
                <p>Q: Bagaimana cara untuk mengikuti kompetisi yang diadakan?<br>
                    <b>A: Setelah mengunjungi web <i><a href="/">www.computerun.id</a></i>, kamu dapat memilih menu "Register" yang terdapat di setiap laman cabang kompetisi yang ingin kamu ikuti.</b>
                </p>
                <p>Q: Apakah saya bisa mendaftar untuk 2-3 kompetisi sekaligus?<br>
                    <b>A: Ya, tentu saja. Asalkan kamu tetap memenuhi persyaratan yang ada.</b>
                </p>
                <p>Q: Apa saja persyaratan yang dibutuhkan untuk mengikuti kompetisi Computerun?<br>
                    <b>A: Silahkan unduh panduan syarat dan ketentuan kompetisi Computerun <a href="#">di sini</a>.</b>
                </p>
                <p>Q: Keuntungan apa yang akan saya dapatkan apabila mengikuti kompetisi Computerun?<br>
                    <b>A: Partisipan akan mendapatkan e-sertifikat dan menambah pengalaman berkompetisi berskala nasional.</b>
                </p>
                <p>Q: Setelah mendaftar bagaimana saya mendapatkan informasi lebih lanjut untuk kompetisi?<br>
                    <b>A: Setelah mendaftar, kamu akan menerima e-mail resmi dari Computerun dan akan mendapat seluruh informasi mengenai kompetisi melalui e-mail.</b>
                </p>
            </div>
            <h1 class="full-underline content-divider">for more details</h1>
            <div class="margin-1 content-divider h5 text-center">
                Please contact us via our LINE Official Account: <a class="font-800" href="https://line.me/R/ti/p/@995bowex" target="_blank">@995bowex</a>
            </div>
            @component ('components.sponsors')
            @endcomponent
            <img class="container-clip for-footer" src="/img/backgrounds/7.png">
        </div>
        @component('components.footer')
        @endcomponent
    </body>
</html>
