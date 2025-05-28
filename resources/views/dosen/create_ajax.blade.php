@extends('layouts.template')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>{{ $page->title }}</h6>
            </div>
            <div class="card-body pt-1 p-3">
                <div class="row">
                    <div class="col">
                        <a href="javascript:void(0)" onclick="modalAction('{{ url('dosen/create_ajax') }}')" class="btn btn-primary float-end me-3">Tambah Data Dosen</a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table_dosen">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>Nomor Induk Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
var dataDosen;

function modalAction(url = '') {
    $('#myModal').load(url, function() {
        $('#myModal').modal('show');
    });
}

$(document).ready(function() {
    // dataDosen = $('#table_dosen').DataTable({
    //     serverSide: true,
    //     processing: true, 
    //     ajax: {
    //         url: "{{ url('dosen/list') }}",
    //         type: "POST",
    //         data: {
    //             _token: "{{ csrf_token() }}"
    //         },
    //         error: function(xhr) {j
    //             console.log('Error:', xhr.responseText);
    //         }
    //     },
    //     columns: [
    //         { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
    //         { data: "name" },
    //         { data: "nip" },
    //         { data: "kriteria" },
    //         { data: "aksi", orderable: false, searchable: false }
    //     ]
    // });

    dataDosen = $('#table_dosen').DataTable({
        serverSide: true,
        processing: true, 
        ajax: {
            url: "{{ url('dosen/list') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama'},
            { data: 'nip'},
            { data: 'aksi', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush