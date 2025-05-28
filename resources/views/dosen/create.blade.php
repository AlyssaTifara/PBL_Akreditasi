{{-- views/dosen/create.blade.php --}}
<form action="{{ url('/dosen/store') }}" method="POST" id="form-tambah-dosen">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">{{ $page->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="nama">Nama Dosen</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
            <small id="error-nama" class="text-danger"></small>
        </div>
        <div class="form-group">
            <label for="NIP">Nomor Induk Pegawai (NIP)</label>
            <input type="text" name="NIP" id="NIP" class="form-control" required>
            <small id="error-NIP" class="text-danger"></small>
        </div>
        <div class="form-group">
            <label for="user_id">Pilih User Terkait</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->user_id }}">{{ $user->username }}</option> {{-- Asumsi UserModel punya username --}}
                @endforeach
            </select>
            <small id="error-user_id" class="text-danger"></small>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#form-tambah-dosen").validate({
            rules: {
                nama: { required: true, minlength: 3, maxlength: 100 },
                NIP: { required: true, number: true, minlength: 8, maxlength: 20 },
                user_id: { required: true }
            },
            messages: {
                nama: { required: "Nama dosen wajib diisi." },
                NIP: { required: "NIP wajib diisi.", number: "NIP harus angka.", minlength: "NIP minimal 8 digit.", maxlength: "NIP maksimal 20 digit." },
                user_id: { required: "User terkait wajib dipilih." }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire('Berhasil!', response.message, 'success');
                            dataDosen.ajax.reload(); // Reload DataTables
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire('Gagal!', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', 'Terjadi kesalahan server.', 'error');
                        console.log(xhr.responseText);
                    }
                });
                return false; 
            },
            errorElement: 'small',
            errorClass: 'text-danger',
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>