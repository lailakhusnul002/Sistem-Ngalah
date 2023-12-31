@extends('layout.admin')
@push('css')
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pelanggaran Santri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid ">
        <a href="/tambahpelanggarana" class="btn btn-success">Tambah +</a>
        {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2 mb-2">
            <!-- <div class="col-auto">
                <form action="/pelanggarana" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline">
                </form>
            </div> -->

            <!-- <div class="col-auto">
                <a href="/exportpdfpelanggarana" class="btn btn-info">Export PDF</a>
            </div> -->
            <!-- <div class="col-auto">
                <a href="/exportexcelpelanggarana" class="btn btn-success">Export Excel</a>
            </div> -->

            <!-- <div class="col-auto"> -->
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </button>
            </div> -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>




        </div>
        <div class="col-auto">
            <!-- <div class="card">
                <div class="card-body"> -->
    
                    <div class="row">
                        {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif --}}
                        
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="row">No</th>
                                    <th>ID Yayasan</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pelanggaran</th>
                                    <th>Jenis Pelanggaran</th>
                                    <th>Hukuman</th>
                                    <th>Dibuat</th>
                                    <th>Kirim Notifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($datapelanggarana as $index => $row)
                                <tr>
                                    <th scope="row">{{ $index + $datapelanggarana->firstItem() }}</th>
                                    <td>{{$row->user->id_yayasan}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>
                                        <img src="{{ asset($row->foto) }}" alt="" style="width: 40px;">
                                    </td>
                                    <td>{{ $row->jeniskelamin }}</td>
                                    <td>{{ $row->pelanggaran }}</td>
                                    <td>{{ $row->jenispelanggaran }}</td>
                                    <td>{{ $row->hukuman }}</td>
                                   
                                    <td>{{ $row->created_at->format('d F Y') }}</td>
                                    <!-- <td><a href="https://api.whatsapp.com/send?phone={{$row->user->whatsapp}}" target="_blank">{{$row->user->whatsapp}}</a></td> -->
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone={{$row->user->whatsapp}}&text=Assalamualaikum%2C%20Kami%20dari%20pengurus%20keamanan%20Pondok%20Pesantren%20Ngalah%20Menginformasikan%20bahwa%20santri%20yang%20bernama%20-{{$row->user->name}}-%20telah%20melakukan%20pelanggaran.%20Silakan%20cek%20di%20aplikasi%20monitoring%20terkait%20detail%20pelanggarannya" target="_blank" class="btn btn-warning btn-sm mb-2">
                                         WhatsApp
                                         </a>
                                    </td>



            
                                    <td class="row">
                                        <a href="/tampilkandatapelanggarana/{{ $row->id }}" class="btn btn-info btn-sm mb-2">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}"
                                            data-nama="{{ $row->nama }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
            
            
                            </tbody>
                        </table>
                        {{ $datapelanggarana->links() }}
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </div>

</div>

 
@endsection

@push('scripts')
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
<script>
    $('.delete').click(function () {
        var pelanggaranaid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus data pelanggaran santri dengan nama " + nama + " ",
            icon: "warning", 
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletepelanggarana/" + pelanggaranaid + ""
                    swal("Data berhasil dihapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
</script>
<script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('template/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



@endpush