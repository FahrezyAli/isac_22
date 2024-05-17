@extends('components.template.client')

@section('title', 'Selamat Datang! - ISAC 2022')

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/landing.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <div class="headline">
        <h1 class="greeting">WELCOME TO</h1>
        <img src="{{ url('assets/img/logo.png') }}" alt="">
    </div>

    <div class="head-content" id="about">
        <div class="above">
            <h1>WHAT IS ISAC?</h1>
            <P>ISAC merupakan kompetisi tahunan yang diselenggarakan oleh HIMSI UNAIR</P>
        </div>
        <div class="explain">
            <img src="{{ url('assets/img/logo-circle.png') }}" alt="" class="circle-logo">
            <div class="caption">
                <div>Tahun ini ISAC datang dengan dua jenis kompetisi yaitu OLYMPIAD dan UI/UX.</div>
                <div><span class="ungu">ISAC Olympiad</span> akan menguji kemampuan logika, pemrograman dasar, serta ilmu
                    sistem informasi dasar kamu. Sedangkan <span class="biru">ISAC UI/UX Competition</span> akan menguji
                    kemampuan peserta dalam analisa dan kreativitas peserta dalam menghadirkan sebuah informasi yang
                    memberikan kenyamanan dan kemudahan untuk pengguna dalam bentuk desain website.</div>
            </div>
        </div>

        <div class="values">
            <div class="val-item">
                <h2 class="blue">INNOVATIVE</h2>
                <img src="{{ url('assets/img/gear.png') }}" alt="" class="val-icon">
                <p class="blue">Initiate an unexplored solution to help solving a problem</p>
            </div>
            <div class="val-item">
                <h2 class="grey">SUSTAINABLE</h2>
                <img src="{{ url('assets/img/graph.png') }}" alt="" class="val-icon">
                <p class="grey">Able to be maintained at a certain rate or level.</p>
            </div>
            <div class="val-item">
                <h2 class="purple">INSPIRE</h2>
                <img src="{{ url('assets/img/lamp.png') }}" alt="" class="val-icon">
                <p class="purple">Fill with the urge or ability to do something creative</p>
            </div>
        </div>
    </div>

    <div class="competition">
        <div class="competition-title">
            <h1 class="">COMPETITION</h1>
            <h4>Segera ikuti kompetisinya, dan dapatkan hadiah hingga <span class="blue">Rp7.000.000++</span></h4>
        </div>
        <div class="comp-list left">
            <h3 class="blue">ISAC OLYMPIAD</h3>
            <p>ISAC Olympiad adalah kompetisi yang menguji kemampuan logika, pemrograman dasar, dan ilmu sistem informasi
                dasar. Kompetisi ini bertujuan untuk mengasah kemampuan logika dan pemrograman peserta serta memperkenalkan
                ilmu sistem informasi dasar tepatnya dalam ranah jaringan, bisnis, dan sistem. ISAC Olympiad diselenggarakan
                secara online dengan skala nasional untuk seluruh siswa SMA atau sederajat.</p>
            <a href="https://bit.ly/GuidebookOlympiad" target="_blank" rel="noopener noreferrer" class="comp-guidebook">
                <img src="{{ url('assets/img/icon-guidebook-blue.svg') }}" alt="">
                <h5 class="blue">GUIDEBOOK</h5>
            </a>
        </div>
        <div class="comp-list right">
            <h3 class="purple">ISAC UI/UX COMPETITION</h3>
            <P>ISAC UI/UX Competition adalah kompetisi yang menguji analisa dan kreativitas peserta dalam menghadirkan
                sebuah informasi yang memberikan kenyamanan dan kemudahan untuk pengguna dalam bentuk desain website.
                Kompetisi ini bertujuan untuk mengasah kemampuan peserta dalam menyelesaikan sebuah masalah dan memberikan
                informasi dalam wujud desain website. Dalam ISAC UI/UX Competition, Pada babak penyisihan peserta akan
                membuat proposal mengenai website yang akan didesain ulang. Pada babak final, peserta akan diberikan studi
                kasus tambahan yang nantinya akan dipresentasikan di depan juri.</P>
            <a href="https://bit.ly/GuidebookUIUXDesign" target="_blank" rel="noopener noreferrer" class="comp-guidebook">
                <img src="{{ url('assets/img/icon-guidebook-purple.svg') }}" alt="">
                <h5 class="purple">GUIDEBOOK</h5>
            </a>
        </div>
    </div>

    <div class="timeline" id="timeline">
        <div class="head">
            <h1>TIMELINE</h1>
            <h3>JULI 2022 - SEPTEMBER 2022</h3>
        </div>

        <div class="tl-container">
            <div class="agenda">
                <div class="date">
                    <h2>1</h2>
                    <p>Juli</p>
                </div>
            </div>
            <div class="tl-content">
                <div class="desc-wrap">
                    <h1>Pendaftaran ISAC 2022</h1>
                    <p>Pendaftaran dan pelengkapan data tiap kelompok</p>
                </div>
                {{-- <a href="{{ route('regist') }}" class="button btn-secondary">Registrasi</a>
                <a href="https://drive.google.com/file/d/1cGaydQDSnNCf3UlmSrnzhhPl86Rl2UUl/view?usp=drivesdk"
                    target="_blank" rel="noopener noreferrer">Tutorial Registrasi</a> --}}
            </div>
            <img src="{{ url('assets/img/planet-1.svg') }}" alt="">
            <p>
                Gelombang 1 : 1 Juli - 22 Juli<br>
                Gelombang 2 : 29 Juli - 19 Agustus
            </p>

            <div class="agenda">
                <div class="date">
                    <h2>3</h2>
                    <p>September</p>
                </div>
            </div>
            <div class="tl-content">
                <div class="desc-wrap">
                    <h1>Kompetisi dimulai!</h1>
                    <p>Kompetisi diadakan sesuai dengan timeline masing-masing dan akan berlangsung hingga final pada
                        tanggal 24 September 2022.</p>
                </div>
                {{-- <button class="btn-secondary">Watch</button> --}}
            </div>
            <p>
                Penyisihan Olympiad : 3 September <br>
                Semifinal Olympiad : 10 September <br>
                Pengumpulan UI/UX Competition : 14 September <br>
                Final Olympiad & UI/UX Competition : 24 September
            </p>
            <img src="{{ url('assets/img/planet-2.svg') }}" alt="">

            <div class="agenda">
                <div class="date">
                    <h2>17</h2>
                    <p>September</p>
                </div>
            </div>
            <div class="tl-content">
                <div class="desc-wrap">
                    <h1>Bootcamp</h1>
                    <p>"Infin-IT & Beyond: Driving Inovation for Future Generation"</p>
                </div>
                {{-- <button class="btn-secondary">Soon</button> --}}
            </div>
            <img src="{{ url('assets/img/planet-3.svg') }}" alt="">
            <p>
                Bootcamp Hari ke-1 : 17 September <br>
                Bootcamp Hari ke-2 : 18 September
            </p>

            <div class="agenda">
                <div class="date">
                    <h2>25</h2>
                    <p>September</p>
                </div>
            </div>
            <div class="tl-content">
                <div class="desc-wrap">
                    <h1>Talkshow dan Awarding</h1>
                    <p>"101 BIT : Level Up Your Knowledge for Your Future Career Development"</p>
                </div>
                {{-- <button class="btn-secondary">Soon</button> --}}
            </div>
            <p>Talkshow merupakan kegiatan terakhir rangkaian ISAC 2022, yang kemudian ditutup dengan awarding.</p>
            <img src="{{ url('assets/img/planet-4.svg') }}" alt="">

        </div>
    </div>

    <div class="sponsor-container">
        <div class="sponsor">
            <h2>SPONSOR</h2>
            <div class="sponsor-logos">
                <img src="{{ url('assets/img/codepolitan.jpg') }}" alt="" class="sponsor-logo">
                <img src="{{ url('assets/img/dicoding.png') }}" alt="" class="sponsor-logo">
                <img src="{{ url('assets/img/niomic.png') }}" alt="" class="sponsor-logo">
                <img src="{{ url('assets/img/reddoorz.jpg') }}" alt="" class="sponsor-logo">
            </div>
        </div>
    </div>
@endsection

@section('template-admin-needs')
    <footer class="footer">
        <img src="{{ url('assets/img/line.png') }}" alt="" class="line">
        <h1>CONTACT US</h1>
        <div class="contact-menu">
            <div class="contact">
                <h2>RISHAD</h2>
                <h3>Kontak Olympiad</h3>
                <p>Telegram : <a href="http://t.me/+6285967061693" target="_blank"
                        rel="noopener noreferrer">085967061693</a>
                </p>
                <p>WhatsApp : <a href="http://wa.me/+6285967061693" target="_blank"
                        rel="noopener noreferrer">085967061693</a>
                </p>
                <p>Line : <a href="http://line.me/ti/p/~safranatha5" target="_blank"
                        rel="noopener noreferrer">safranatha5</a>
                </p>

            </div>
            <div class="contact">
                <h2>VABELA</h2>
                <h3>Kontak UI/UX</h3>
                <p>Telegram : <a href="http://t.me/+6285806502913" target="_blank"
                        rel="noopener noreferrer">085806502913</a>
                </p>
                <p>WhatsApp : <a href="http://wa.me/+6285806502913" target="_blank"
                        rel="noopener noreferrer">085806502913</a>
                </p>
                <p>Line : <a href="http://line.me/ti/p/~Seravabelaa3" target="_blank"
                        rel="noopener noreferrer">Seravabelaa3</a>
                </p>

            </div>
        </div>
        <img src="{{ url('assets/img/under-mars.png') }}" alt="" class="mars">
        <img src="{{ url('assets/img/under-saturn.png') }}" alt="" class="saturn">
    </footer>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
@endsection
