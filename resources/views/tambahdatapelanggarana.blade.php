@extends('layout.admin')

@section('content')

<body>
<br>
<br>
    <h1 class="text-center mb-5 mt-5">Tambah Data Pelanggaran</h1>

    <div class="container mb-5">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdatapelanggarana" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> -->
                            
                            
                

                            <!-- <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">ID Yayasan</label>
                                <input type="text" name="idyayasan" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('idyayasan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div> -->

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Santri</label>
                                <select class="form-control" name="user_id" aria-label="Default select example">
                                    <option selected>Pilih Santri</option>
                                    @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pelanggaran</label>
                                <input type="text" name="pelanggaran" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('pelanggaran')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Pelanggaran</label>
                                <select class="form-select" name="jenispelanggaran" aria-label="Default select example">
                                    <option selected>Pilih Jenis Pelanggaran</option>
                                    <option value="Ringan">Ringan</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Berat">Berat</option>
                                    

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hukuman</label>
                                <input type="text" name="hukuman" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                    @error('hukuman')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                                <input type="file" name="foto" class="form-control" >
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

@endsection