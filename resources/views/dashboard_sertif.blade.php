@foreach($anggota as $member)
<tr>
    <td>{{ $member->nama }}-</td>
    @if ($member->ketua ==1)
        <td>Ketua</td>
        @if (! $member->sertifikat)
        <td>YHA BLM DAPET SERTIF</td><br>
        @else
        <form method="get" action="{{ route('download.sertif',['namaTim'=>$namaTim,'id'=>$member->id]) }}">
            <button>Download</button>
        </form>
        @endif
    @else
        @if (! $member->sertifikat)
        <td>YHA BLM DAPET SERTIF</td><br>
        @else
        <form method="get" action="{{ route('download.sertif',['namaTim'=>$namaTim,'id'=>$member->id]) }}">
            <button>Download</button>
        </form>
        @endif
    @endif
    <td>;</td>
</tr>
@endforeach