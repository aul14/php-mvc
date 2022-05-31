$(function() {
    $(".btn-ubah").click(function(e) {
        e.preventDefault();
        $('#formModal').modal('show');
        let id = $(this).data('id');
        let action = $(this).attr('href');

        $(".modal-body form").attr("action", action);

        $("#judulModal").html("Ubah Data Mahasiswa");

        $.ajax({
            type: "post",
            url: "http://localhost/phpmvc/public/mahasiswa/getUbahData",
            data: {
                id: id
            },
            dataType: "json",
            success: function(res) {
                $("input[name=nama]").val(res.nama);
                $("input[name=email]").val(res.email);
                $("input[name=nrp]").val(res.nrp);
                $("input[name=id]").val(res.id);
                $("select[name=jurusan]").val(res.jurusan).change();
            }
        });
    });
    $(".btn-tambah").click(function(e) {
        e.preventDefault();
        $('#formModal').modal('show');
        let action2 = $(this).attr('href');

        $(".modal-body form").attr("action", action2);

        $("#judulModal").html("Tambah Data Mahasiswa");
    });
});