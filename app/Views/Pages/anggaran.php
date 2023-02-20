<?= $this->extend('Templates/main')?>

<?= $this->section('content')?>
<?php function format_rupiah($num)
{
    $ret = '<td><div class="d-flex justify-content-between"><span>Rp</span><span>'.number_format($num, 2, ",", ".").'</span></div></td>';
    return $ret;
}
?>
<p>Item</p>
<div class="card-body">
    <?php setlocale(LC_MONETARY,"in_ID");?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus mr-1"></i>


                        Tambah Anggaran
                    </button>

                    <button class="btn btn-primary btn-round mx-2" data-toggle="modal"
                        data-target="#generate-anggaran-modal">
                        <i class="fas fa-wallet mr-1"></i>
                        Generate Anggaran
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Modal -->
                <!-- Modal Add -->
                <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        New</span>
                                    <span class="fw-light">
                                        Item
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url()?>/anggaran/insert" method="POST" id="anggaran">
                                    <?= $this->include('Components/Form/anggaran_add')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="generate-submit-button" class="btn btn-primary"
                                    value="Add"></input>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Add Modal -->

                <!-- Edit Modal -->
                <div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Edit</span>
                                    <span class="fw-light">
                                        Item
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url()?>/anggaran/update" method="POST" id="anggaran_update">
                                    <?= $this->include('Components/Form/anggaran_update')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="addRowButton" class="btn btn-primary" value="Save"></input>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Edit Modal -->

                <!-- Generate Anggaran Modal -->
                <div class="modal fade" id="generate-anggaran-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header no-bd">
                                <h5 class="modal-title">
                                    <span class="fw-mediumbold">
                                        Edit</span>
                                    <span class="fw-light">
                                        Item
                                    </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="py-4 w-100 text-center" id='loading-generate'>
                                    <div class="ant-empty-image">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            style="margin: auto; background: none; display: block; shape-rendering: auto;"
                                            width="100px" height="100px" viewBox="0 0 100 100"
                                            preserveAspectRatio="xMidYMid">
                                            <path d="M18 50A32 32 0 0 0 82 50A32 36 0 0 1 18 50" fill="#007bff"
                                                stroke="none">
                                                <animateTransform attributeName="transform" type="rotate"
                                                    dur="0.33898305084745767s" repeatCount="indefinite" keyTimes="0;1"
                                                    values="0 50 52;360 50 52" />
                                            </path>
                                            <!-- [ldio] generated by https://loading.io/ -->
                                        </svg>
                                        Generating

                                    </div>
                                </div>
                                <form action="<?=base_url()?>/anggaran/generate" method="POST" id="anggaran-generate">
                                    <?= $this->include('Components/Form/generate_anggaran')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="generate-button" class="btn btn-primary" value="Save"></input>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Generate Anggaran Modal -->
                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Identitas Item</th>
                                <th>Jenis Item</th>
                                <th>Tahun Anggaran</th>
                                <th>Pagu Anggaran</th>
                                <th>Pagu Realisasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Identitas Item</th>
                                <th>Jenis Item</th>
                                <th>Tahun Anggaran</th>
                                <th>Pagu Anggaran</th>
                                <th>Pagu Realisasi</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($item_anggaran as $item):?>
                            <tr>
                                <td><?= $item["identitas"] ?></td>
                                <td><?= $item["jenis"] ?></td>
                                <td><?= $item["tahun"] ?></td>
                                <?= format_rupiah($item['pagu_anggaran'])?>
                                <?= format_rupiah($item['pagu_realisasi'])?>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-primary btn-lg update"
                                            data-original-title="Edit Task" value="<?=$item['id']?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger delete" data-original-title="Remove"
                                            value="<?=$item['anggaran_id']?>">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<?= $this->section('js')?>

<script>
$(document).ready(function() {

    $('#item_update').prop('disabled', true);

    $('#item').change(() => {
        // $("input[name=jenis]").val("");
        let selected_id = $('#item').val();
        console.log(selected_id);
        $('#id').val(selected_id);

        $.ajax({
            url: `<?=base_url()?>/item/get-item?id=${selected_id}`,
            dataType: 'json',

        }).done(function(data) {
            console.log(data.jenis)
            $("input[name=jenis]").val([data.jenis]);

        }).then(() => {
            $('input[name=jenis]').prop('disabled', true);

        });
        //hapus peruntukkan
    });

    $('.update').click(function(e) {
        // console.log(e.target.value);
        $.ajax({
            url: `<?=base_url()?>/anggaran/get-anggaran`,
            dataType: 'json',
            method: 'get',
            data: {
                'id': e.currentTarget.value
            },
        }).done(function(data) {
            console.log(data.jenis);
            $('#item_update').val(data.id);
            $('#tahun_update').val(String(data.tahun));
            $('#id_anggaran_update').val(String(data.anggaran_id));

            $('#pagu_anggaran_update').val(Number(data.pagu_anggaran).toLocaleString());

            // $('#item_id_update').val(data.id)
            $("input[name=jenis_update]").val([data.jenis]);
            $("input[name=jenis_update]").prop('disabled', true)


            // $("input[name=jenis_update][value=" + data.jenis + "]").prop('checked', true);
            // $("input[name=jenis_id_update][value=" + data.jenis_id + "]").prop('checked', true);
            $('#identitas_update').val(data.identitas);

        }).then(() => {
            $('#editRowModal').modal('show');

            // window.location.reload();

        });
    });

    $('.delete').click(function(e) {
        let id_deleted = String(e.currentTarget.value)
        console.log(id_deleted)
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons: {
                cancel: {
                    visible: true,
                    text: 'No, cancel!',
                    className: 'btn btn-danger'
                },
                confirm: {
                    text: 'Yes, delete it!',
                    className: 'btn btn-success'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                let id_deleted = String(e.target.value)
                console.log(id_deleted)
                // console.log(id_deleted);
                $.ajax({
                    url: `<?=base_url()?>/anggaran/delete`,
                    dataType: 'json',
                    method: 'post',
                    data: {
                        'id': id_deleted
                    },
                }).done(function(data) {
                    swal(`Poof! Anggaran has been deleted!`, {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }

                    }).then(() => {
                        window.location.reload();

                    });


                });


            } else {
                swal("Your Anggaran is safe!", {
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            }
        });
    });

    $('#anggaran_update').on('submit', function() {
        $('#item_update').prop('disabled', false);
    });

    $("#item").select2({
        dropdownParent: $('#addRowModal'),
        theme: "bootstrap",
        width: '100%' // need to override the changed default

    });

    $("#item_update").select2({
        dropdownParent: $('#editRowModal'),
        theme: "bootstrap",
        width: '100%' // need to override the changed default

    });

    $('#pagu_anggaran').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#pagu_anggaran_update').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#basic-datatables').DataTable({});

    $('#multi-filter-select').DataTable({
        "pageLength": 5,
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $(
                        '<select class="form-control"><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });

    const anggaran = document.getElementById("pagu_anggaran");
    const anggaranForm = document.getElementById("anggaran");

    anggaranForm.addEventListener("submit", (event) => {
        // if the email field is valid, we let the form submit
        anggaran_validity = Number(anggaran.value.toString().replace(/\D/g, "")) > 100000;
        // event.preventDefault();

        if (!anggaran_validity) {
            // If it isn't, we display an appropriate error message
            // console.log('masuk');
            event.preventDefault();

            anggaran.setCustomValidity("Besar anggaran minimal adalah Rp 100,000.00 !");

            anggaranForm.reportValidity();

            // anggaranError.textContent = "Besar anggaran minimal adalah Rp 100,000.00 !";

            // Then we prevent the form from being sent by canceling the event

        }
    });

    const anggaranUpdate = document.getElementById("pagu_anggaran_update");
    const anggaranUpdateForm = document.getElementById("anggaran_update");

    anggaranUpdateForm.addEventListener("submit", (event) => {
        // if the email field is valid, we let the form submit
        anggaranUpdate_validity = Number(anggaranUpdate.value.toString().replace(/\D/g, "")) > 100000;
        // console.log(anggaranUpdate_validity);

        if (!anggaranUpdate_validity) {
            // If it isn't, we display an appropriate error message
            // console.log('masuk');
            event.preventDefault();

            anggaranUpdate.setCustomValidity("Besar anggaran minimal adalah Rp 100,000.00 !");

            anggaranUpdateForm.reportValidity();

            // anggaranError.textContent = "Besar anggaran minimal adalah Rp 100,000.00 !";

            // Then we prevent the form from being sent by canceling the event

        }
    });




    // anggaran.addEventListener("input", (event) => {
    //     console.log(anggaran.value);
    //     anggaran_validity = Number(anggaran.value.toString().replace(/\D/g, "")) > 100000;
    //     if (!anggaran_validity) {
    //         anggaran.setCustomValidity("Besar anggaran minimal adalah Rp 100,000.00 !");
    //     } else {
    //         anggaran.setCustomValidity("");
    //     }
    // });


    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action =
        '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';
    // set state for generate
    $('#loading-generate').hide();
    $('#anggaran-generate').show();

    $("#anggaran-generate").submit(function(e) {
        e.preventDefault();
        let tahun = $('#tahun-generate').val();
        $.ajax({
            url: `<?=base_url()?>/anggaran/generate`,
            dataType: 'json',
            method: 'post',
            data: {
                'tahun': tahun
            },
            beforeSend: () => {
                $('#loading-generate').show();
                $('#anggaran-generate').hide();
            },

        }).done(function(data) {
            // console.log(data);
            if (data) {
                $("#generate-anggaran-modal").modal('hide');
                swal(`Poof! Anggaran has been generated!`, {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                }).then(() => {
                    window.location.reload();

                });
            } else {
                $("#generate-anggaran-modal").modal('hide');
                swal(`Poof! Nothing changes`, {
                    icon: "success",
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                }).then(() => {
                    window.location.reload();

                });
            }

        })


    });



});
</script>


<?= $this->endSection()?>