<form action="{{ route('submitA',[$namaTim]) }}" method="POST">
    @csrf
    @method('put')

    <input type="text" name="submission" id="submission">
    <button type="submit">submit</button>

</form>
