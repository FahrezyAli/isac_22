<form action="{{ route('auth.regist') }}" method="post">
    @csrf
    <div class="container">
        <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
        <hr>
            <label for="namaTim"><b>Nama Tim</b></label>
            <input type="text" placeholder="Enter Team Name" name="namaTim" id="namaTim" required>

            <label for="email"><b>Email Tim</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
        
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="psw" required>

            <label for="provSekolah"><b>Provinsi Asal Sekolah</b></label>
            <select name="provSekolah" id="provSekolah">
                @foreach ($listProv as $prov){
                    <option value="{!! array_search($prov,$listProv,true) !!}">{{ $prov }}</option>
                }
                @endforeach
            </select>

            <label for="kotaSekolah" id="kota"><b>Kabupaten/kota Asal Sekolah</b></label>
            <select id="kotaSekolah" name="kotaSekolah"></select>  

            <label for="sekolah"><b>Asal Sekolah</b></label>
            <input type="text" placeholder="Enter School Name" name="asalSekolah" id="sekolah" required>

        <hr>

        <button type="submit" class="registerbtn">Register</button>
    </div>
  
    <div class="container signin">
      <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
    </div>

</form>

<script>
    let selectProv = document.querySelector('#provSekolah');
    selectProv.addEventListener('change', function(e){
        fetch('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+e.target.value).
        then(x=>x.json()).then(y=>{
            let kota = document.querySelector('#kotaSekolah');
            kota.innerHTML = '';
            for (let i=0; i<y['kota_kabupaten'].length;i++){
                let dropDownOption = document.createElement('option');
                dropDownOption.innerText = y['kota_kabupaten'][i]['nama'];
                dropDownOption.setAttribute('value',y['kota_kabupaten'][i]['nama']);
                kota.appendChild(dropDownOption);
            }
        });
    })
</script>