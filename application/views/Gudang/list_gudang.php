<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST GUDANG
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addGudang' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableGudang" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Unit Kerja</th>
                            <th>Nama Gudang</th>
                            <th>Letak Gudang</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div class="modal fade" id="formGudang" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Gudang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gudang" id="id_gudang">
                    <div class="form-group">
                        <label class="control-label">Nama Unit Kerja</label>
                        <select class="form-control select2" style="width: 100%;" required name="id_uker" id="id_uker">
                            <option value="">Select Unit Kerja</option>
                            <?php foreach ($unitkerja as $uk) : ?>
                                <option value="<?php echo $uk->id_uker; ?>"><?php echo $uk->nama_uker; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Gudang</label>
                        <input type='text' name="nama" id="nama" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Letak Gudang</label>
                        <input type='text' name="letak" id="letak" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for ADD ends-->

<script>
    const urlGudang = '<?= site_url("Gudang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableGudang')) {
            table = $('#tableGudang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlGudang + "listGudang",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $(".select2").select2({
            dropdownParent: $('#formGudang'),
        });

        $('#addGudang').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_gudang').val("");
            $('#id_uker').val("").trigger('change');
            $('#formGudang').modal('show');
        });

    });

    function VGudang(id_gudang) {
        $.ajax({
            url: urlGudang + 'viewGudang/' + id_gudang,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_gudang').val(response[0].id_gudang);
                $('#id_uker').val(response[0].id_uker).trigger('change');
                $('#nama').val(response[0].nama_gudang);
                $('#letak').val(response[0].letak_gudang);
                $('#keterangan').val(response[0].ket_gudang);
                $('#formGudang').modal('show');
            }
        });
    }

    function deleteGudang(id_gudang) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: {
                        id_gudang: id_gudang
                    },
                    url: urlGudang + "deleteGudang",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire("Data gagal di delete!", "", "error");
                        }
                    },
                });
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlGudang + 'formGudang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_uker').val(0).trigger('change');
                    $('#formGudang').modal('hide');
                });
            },
        });
    });
</script>