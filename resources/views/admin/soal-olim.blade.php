@extends('dashboard.navbar')

@section('content')
    <a href="{{ route('add-soal') }}">Tambah Soal</a>
    <table class="table">
        {{-- NAMBAH TOMBOL FILTER --}}
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Soal</th>
                <th scope="col">Jawaban</th>
                <th scope="col">Gambar Soal</th>
                <th scope="col">Tombol Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($soals as $soal)
                <tr>
                    <th scope="row">{{ $loop->iteration - 1 }}</th>
                    <td><a href="{{ route('edit-soal', [$soal->id]) }}">{{ $soal->soal }}</a></td>
                    <td>{{ $soal->jawaban($soal->id) }}</td>
                    <td>
                        <img style="width:50px; height:50px;"src="{{ asset('storage/gambar_soal/' . $soal->gambar_soal) }}">
                    </td>
                    <td>
                        <form action="{{ route('delete-soal', [$soal->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
