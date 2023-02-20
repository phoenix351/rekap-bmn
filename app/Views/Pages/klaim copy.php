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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Add Row</h4>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                        <i class="fa fa-plus"></i>
                        Add Row
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
                                <form action="<?=base_url()?>/klaim/insert" method="POST" id="klaim">
                                    <?= $this->include('Components/Form/klaim_add')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="addRowButton" class="btn btn-primary" value="Add"></input>
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
                                <form action="<?=base_url()?>/klaim/update" method="POST" id="klaim_update">
                                    <?= $this->include('Components/Form/klaim_update')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="addRowButton" class="btn btn-primary" value="Save"></input>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End Edit Modal -->
                    <div class="modal-footer no-bd">
                        <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tanggal Nota</th>
                            <th>Pertalite Harga</th>
                            <th>Pertalite Volume</th>
                            <th>Pertamax Harga</th>
                            <th>Pertamax Volume</th>
                            <th>Dexlite Harga</th>
                            <th>Dexlite Volume</th>
                            <th>Maintenance</th>
                            <th>Ongkos Kerja</th>
                            <th>Bea Materai</th>
                            <th>Total Klaim</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal Nota</th>
                            <th>Pertalite Harga</th>
                            <th>Pertalite Volume</th>
                            <th>Pertamax Harga</th>
                            <th>Pertamax Volume</th>
                            <th>Dexlite Harga</th>
                            <th>Dexlite Volume</th>
                            <th>Maintenance</th>
                            <th>Ongkos Kerja</th>
                            <th>Bea Materai</th>
                            <th>Total Klaim</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($claims as $claim):?>
                        <tr>
                            <td><?= $claim["tanggal_nota"] ?></td>
                            <?= format_rupiah($claim["pertamax_harga"]) ?>
                            <td><?= $claim["pertamax_volume"] ?></td><?= format_rupiah($claim["pertalite_harga"] )?>
                            <td><?= $claim["pertalite_volume"] ?></td>
                            <?= format_rupiah($claim["dexlite_harga"]) ?>
                            <td><?= $claim["dexlite_volume"] ?></td>
                            <?= format_rupiah($claim["maintenance"]) ?>
                            <?= format_rupiah($claim["ongkos_kerja"]) ?>
                            <?= format_rupiah($claim["bea_materai"]) ?>
                            <?= format_rupiah($claim["total_klaim"]) ?>

                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title=""
                                        class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger"
                                        data-original-title="Remove">
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
// CALCULATE PROGRESS BAR
stepProgress = function(currstep) {
    var percent = parseFloat(100 / $(".step").length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
        .css("width", percent + "%")
        .html(percent + "%");
};

// DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
hideButtons = function(step) {
    var limit = parseInt($(".step").length);
    $(".action").hide();
    if (step < limit) {
        $(".next").show();
    }
    if (step > 1) {
        $(".back").show();
    }
    if (step == limit) {
        $(".next").hide();
        $(".submit").show();
    }
};

function checkForm(val) {
    // CHECK IF ALL "REQUIRED" FIELD ALL FILLED IN
    var valid = true;
    $("#" + val + " input:required").each(function() {
        if ($(this).val() === "") {
            $(this).addClass("is-invalid");
            valid = false;
        } else {
            $(this).removeClass("is-invalid");
        }
    });
    return valid;
}

$(document).ready(function() {
    $('#basic-datatables').DataTable({});

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

    $('#item').change(() => {
        // $("input[name=jenis]").val("");
        let selected_id = $('#item').val();
        console.log(selected_id);
        $('#id').val(selected_id);

        $.ajax({
            url: `<?=base_url()?>/klaim/get-item?id=${selected_id}`,
            dataType: 'json',

        }).done(function(data) {
            // set tahun anggaran
            if (data.anggaran.length > 0) {

                data.anggaran.forEach((item) => {
                    $('#tahun').html(``)

                    $('#tahun').append(
                        `<option value="${item.tahun}" >${item.tahun}</option>`
                    )

                });
            } else {
                $('#tahun').html(`<option value="" disabled selected>No Data</option>`)
            }

            $("input[name=jenis]").val([data.item_user.jenis]);


        }).then(() => {
            $('input[name=jenis]').prop('disabled', true);

        });
        //hapus peruntukkan
    });


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

    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    $('#pertamax_harga').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });

    $('#pertalite_harga').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#dexlite_harga').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#maintenance').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#ongkos_kerja').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#bea_materai').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });
    $('#total_klaim').keyup((e) => {
        e.target.value = Number(e.target.value.toString().replace(/\D/g, "")).toLocaleString();
    });

});

var step = 1;
stepProgress(step);


$(".next").on("click", function() {
    var nextstep = false;
    if (step == 2) {
        nextstep = checkForm("userinfo");
    } else {
        nextstep = true;
    }
    if (nextstep == true) {
        if (step < $(".step").length) {
            $(".step").show();
            $(".step")
                .not(":eq(" + step++ + ")")
                .hide();
            stepProgress(step);
        }
        hideButtons(step);
    }
});

// ON CLICK BACK BUTTON
$(".back").on("click", function() {
    if (step > 1) {
        step = step - 2;
        $(".next").trigger("click");
    }
    hideButtons(step);
});
</script>


<?= $this->endSection()?>