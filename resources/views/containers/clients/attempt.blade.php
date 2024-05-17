@extends('components.template.client')

@section('title')
    ISAC Olympiad No. {{ $no }}
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/attempt.css') }}">
@endsection

{{-- SEO --}}
@section('seo-desc', '')
@section('seo-img', '')

@section('contentclass', '')
@section('content')
    <form action="{{ route('answer', ['namaTim' => $namaTim, 'no' => $no]) }}" method="POST" class="attempt">
        <div class="number-question-section">
            <section class="number-section">
                <div class="number-text">
                    Soal No. <span>{{ $no }}</span>
                </div>
                <input type="checkbox" name="flag" {{ $attempt->flag ? 'checked' : '' }} id="flag" class="hidden">
                <label for="flag" class="flag{{ $attempt->flag ? ' hovering-flag' : '' }}">
                    <img src="/assets/img/flag.svg" alt="flag" class="flag-svg"><span>Flag question</span>
                </label>
            </section>
            <section class="question-section">
                <div class="form-question">
                    @csrf
                    @method('put')
                    <input type="hidden" name="soal_id" value="{{ $question->id }}">
                    <p>{!! nl2br($question->soal) !!}</p>
                    @if ($question->gambar_soal)
                        <img class="gambar" src="{{ asset('storage/gambar_soal/' . $question->gambar_soal) }}">
                    @endif

                    @foreach ($options as $option)
                        <div class="form-radio">
                            <input type="radio" class="hidden" name="option_id" id="{{ $option->id }}"
                                value="{{ $option->id }}" {{ $option->id == $attempt->option_id ? 'checked' : '' }}>
                            <label for="{{ $option->id }}"><span></span>
                                {{ $option->isi_option }}
                            </label>
                            @if ($option->gambar_option)
                                <img class="gambar" src="{{ asset('storage/gambar_option/' . $option->gambar_option) }}">
                            @endif
                        </div>
                    @endforeach
                    <div class="form-radio">
                        <input type="radio" class="hidden" name="option_id" id="reset"
                            value = "">
                        <label for="reset">
                            Batalkan Pilihan
                        </label>
                        {{-- @if ($option->gambar_option)
                            <img class="gambar" src="{{ asset('storage/gambar_option/' . $option->gambar_option) }}">
                        @endif --}}
                    </div>
                    {{-- <input type="reset" value="Batalkan pilihan" class="reset" name ='option_id'> --}}

                </div>
                <p class="contact">*bila ada kesalahan atau error harap menghubungi: Rishad (<a
                        href="http://wa.me/+6285967061693" target="_blank" rel="noopener noreferrer">085967061693</a>)</p>
                <div class="btn-navigation">
                    <button {{ $no <= 1 ? 'disabled' : '' }} type="submit" name="action" value="previous"
                        class="btn-secondary">HALAMAN SEBELUMNYA</button>
                    <button type="submit" name="action" value="{{ $no == $total_question ? 'selesai' : 'next' }}"
                        class="btn-secondary">
                        {{ $no == $total_question ? 'SELESAI' : 'HALAMAN SELANJUTNYA' }}
                    </button>
                </div>
            </section>
        </div>

        <section class="question-list-section">
            <div class="nav-text">
                <h4>Navigasi</h4>
            </div>
            <div class="question-list">
                @for ($i = 1; $i <= $total_question; $i++)
                    <button type="submit" name="action" value="{{ 'moveTo-' . $i }}"
                        class="question-card{{ $i == $no ? ' clicked-question-card' : '' }}{{ $summaries[$i - 1]->flag ? ' flagged-question-card' : '' }}">
                        <div class="number-card">{{ $i }}</div>
                    </button>
                @endfor
            </div>
            <div class="time-submit">
                <p id="end_time" class="hidden">{{ $end_time }}</p>
                <p id="countdown"></p>
                <button type="submit" name="action" value="selesai" class="btn-secondary">Selesai</button>
            </div>
        </section>
    </form>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('/assets/js/x.js') }}"></script> --}}
    <script>
        $(document).on('click', '.question-list .question-card', function() {
            $(this).addClass('clicked-question-card').siblings().removeClass('clicked-question-card');
        })

        const flag = document.getElementsByClassName('flag')[0];
        const flagSVG = document.getElementsByClassName('flag-svg')[0];
        const spanFlag = document.querySelector('.flag span');
        flag.addEventListener('click', function() {
            flagSVG.classList.toggle('hovering-flag');
            spanFlag.classList.toggle('hovering-flag');
        })

        // countdown
        let endtime = $('#end_time')[0].innerText;

        let countdown = () => {
            let now = new Date().toLocaleString("en-US", {
                timeZone: "Asia/Jakarta"
            });
            now_seconds = new Date(now).getTime() / 1000;

            let duration = endtime - now_seconds;

            let result = new Date(duration * 1000).toISOString().slice(11, 19);
            $('#countdown')[0].innerText = result;
        }

        countdown();
        setInterval(() => {
            countdown()
        }, 1000);
    </script>
@endsection
