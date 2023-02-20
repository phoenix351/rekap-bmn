<?= $this->extend('Templates/main')?>

<?= $this->section('content')?>
<div class="card-body">
    <?php setlocale(LC_MONETARY,"in_ID");?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">REKAP BERDASARKAN TAHUN</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-start align-items-end">

                    <form action="#" method="get" id="rekap-tahun-form">

                        <div class="form-group">

                            <div class="input-icon">
                                <label for="tahun">Tahun Klaim</label>
                                <button type="button" class="btn btn-icon btn-sm btn-round btn-success" id="cek-tahun">
                                    <i class="fa fa-check"></i>
                                </button> <input type="number" name="tahun" id="tahun" class="form-control w-60">
                            </div>


                        </div>
                    </form>

                    <div class="form-group">
                        <button class="btn btn-secondary btn-focus btn-round ml-auto" id="search-rekap-tahun">
                            <span class="btn-label">
                                <i class="fas fa-sync"></i> Load Data
                        </button>
                    </div>
                </div>
                <hr>
                <table id="add-row" class="display table table-border table-striped table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Bulan</th>
                            <th class="text-center" colspan="2">Pertalite</th>
                            <th class="text-center" colspan="2">Pertamax</th>
                            <th class="text-center" colspan="2">dexlite</th>
                            <th rowspan="2">Maintenance</th>
                            <th rowspan="2">Ongkos Kerja</th>
                            <th rowspan="2">Bea Materai</th>
                            <th rowspan="2">Total Klaim</th>


                        </tr>
                        <tr>
                            <th>Harga</th>
                            <th>Volume</th>
                            <th>Harga</th>
                            <th>Volume</th>
                            <th>Harga</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
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
                    </tfoot> -->
                    <tbody>


                    </tbody>
                </table>
                <div class="py-4 w-100 text-center" id="no-data-rekap-1">
                    <div class="ant-empty-image"><svg width="64" height="41" viewBox="0 0 64 41"
                            xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 1)" fill="none" fillrule="evenodd">
                                <ellipse fill="#F5F5F5" cx="32" cy="33" rx="32" ry="7"></ellipse>
                                <g fillrule="nonzero" stroke="#D9D9D9">
                                    <path
                                        d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z">
                                    </path>
                                    <path
                                        d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z"
                                        fill="#FAFAFA"></path>
                                </g>
                            </g>
                        </svg></div>
                    <p class="text-center">No Data</p>
                </div>
                <div class="py-4 w-100 text-center" id="loading-data-rekap-1">
                    <div class="ant-empty-image">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100px"
                            height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <path d="M18 50A32 32 0 0 0 82 50A32 36 0 0 1 18 50" fill="#007bff" stroke="none">
                                <animateTransform attributeName="transform" type="rotate" dur="0.33898305084745767s"
                                    repeatCount="indefinite" keyTimes="0;1" values="0 50 52;360 50 52" />
                            </path>
                            <!-- [ldio] generated by https://loading.io/ -->
                        </svg>

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">REKAP BERDASARKAN ITEM DAN TAHUN</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">


                        <div class="form-group">

                            <div class="input-icon">

                                <label for="pemegang">Pemegang</label>
                                <select class="form-control w-100" id="pemegang" name="pemegang">
                                    <option value selected disabled>--- Pilih pengguna ---</option>

                                    <?php foreach($users as $user):?>
                                    <option value=<?= $user['id'] ?>><?=$user['nama']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="input-icon">

                                <label for="item">Item</label>
                                <select class="form-control" id="item" name="item">
                                </select>
                            </div>

                        </div>




                        <div class="form-group">

                            <div class="input-icon">
                                <label for="tahun_klaim">Tahun Klaim</label>
                                <button type="button" class="btn btn-icon btn-sm btn-round btn-success"
                                    id="cek-tahun-klaim">
                                    <i class="fa fa-check"></i>
                                </button> <input type="number" name="tahun_klaim" id="tahun_klaim"
                                    class="form-control w-60">
                            </div>



                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-secondary btn-focus  btn-round ml-auto" id="search-rekap-btn">
                                    <span class="btn-label">
                                        <i class="fas fa-sync"></i> Load Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr class="w-100">
                    <table id="rekap-tahun-item" class="display table table-border table-striped table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Bulan</th>
                                <th class="text-center" colspan="2">Pertalite</th>
                                <th class="text-center" colspan="2">Pertamax</th>
                                <th class="text-center" colspan="2">dexlite</th>
                                <th rowspan="2">Maintenance</th>
                                <th rowspan="2">Ongkos Kerja</th>
                                <th rowspan="2">Bea Materai</th>
                                <th rowspan="2">Total Klaim</th>


                            </tr>
                            <tr>
                                <th>Harga</th>
                                <th>Volume</th>
                                <th>Harga</th>
                                <th>Volume</th>
                                <th>Harga</th>
                                <th>Volume</th>
                            </tr>
                        </thead>

                        <tbody>



                        </tbody>
                    </table>

                    <div class="py-4 w-100 text-center" id="no-data-rekap-2">
                        <div class="ant-empty-image"><svg width="64" height="41" viewBox="0 0 64 41"
                                xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(0 1)" fill="none" fillrule="evenodd">
                                    <ellipse fill="#F5F5F5" cx="32" cy="33" rx="32" ry="7"></ellipse>
                                    <g fillrule="nonzero" stroke="#D9D9D9">
                                        <path
                                            d="M55 12.76L44.854 1.258C44.367.474 43.656 0 42.907 0H21.093c-.749 0-1.46.474-1.947 1.257L9 12.761V22h46v-9.24z">
                                        </path>
                                        <path
                                            d="M41.613 15.931c0-1.605.994-2.93 2.227-2.931H55v18.137C55 33.26 53.68 35 52.05 35h-40.1C10.32 35 9 33.259 9 31.137V13h11.16c1.233 0 2.227 1.323 2.227 2.928v.022c0 1.605 1.005 2.901 2.237 2.901h14.752c1.232 0 2.237-1.308 2.237-2.913v-.007z"
                                            fill="#FAFAFA"></path>
                                    </g>
                                </g>
                            </svg></div>
                        <p class="text-center">No Data</p>
                    </div>
                    <div class="py-4 w-100 text-center" id="loading-data-rekap-2">
                        <div class="ant-empty-image">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="margin: auto; background: none; display: block; shape-rendering: auto;"
                                width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <path d="M18 50A32 32 0 0 0 82 50A32 36 0 0 1 18 50" fill="#007bff" stroke="none">
                                    <animateTransform attributeName="transform" type="rotate" dur="0.33898305084745767s"
                                        repeatCount="indefinite" keyTimes="0;1" values="0 50 52;360 50 52" />
                                </path>
                                <!-- [ldio] generated by https://loading.io/ -->
                            </svg>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</div>
<?= $this->section('js')?>
<script>
$('#cek-tahun').hide();
$('#search-rekap-tahun').prop('disabled', true);
$('#loading-data-rekap-1').hide();
$('#loading-data-rekap-2').hide();
const generateDataP = (bulan) => {
    return {
        'bulan': bulan,
        'data': {
            'pertalite': 0,
            'pertalite_volume': 0,
            'pertamax': 0,
            'pertamax_volume': 0,
            'dexlite': 0,
            'dexlite_volume': 0,
            'maintenance': 0,
            'ongkos_kerja': 0,
            'bea_materai': 0,
            'total': 0
        }
    };
};
$('#tahun').keyup(() => {
    let tahun = Number($('#tahun').val());
    let tahun_input = document.getElementById('tahun');
    let form = document.getElementById('rekap-tahun-form');
    if (tahun > Number(new Date().getFullYear())) {
        tahun_input.setCustomValidity("Tahun tidak boleh melebihi dari tahun berjalan !");
        form.reportValidity();
        $('#cek-tahun').hide();
        $('#search-rekap-tahun').prop('disabled', true);

    } else if (tahun < (Number(new Date().getFullYear()) - 20)) {
        tahun_input.setCustomValidity("Tahun terlalu lama !");
        form.reportValidity();
        $('#cek-tahun').hide();
        $('#search-rekap-tahun').prop('disabled', true);

    } else {
        tahun_input.setCustomValidity("");
        $('#cek-tahun').show();
        $('#search-rekap-tahun').prop('disabled', false);

    }

    $('#search-rekap-tahun').click((e) => {
        $('#add-row tbody').html('');
        e.stopImmediatePropagation();
        $.ajax({
            url: `<?=base_url()?>/rekap/get-rekap-tahun`,
            dataType: 'json',
            method: 'get',
            data: {
                'tahun': $('#tahun').val()
            },
            beforeSend: () => {
                $('#loading-data-rekap-1').show();
                $('#no-data-rekap-1').hide();


            },
            complete: () => {
                $('#loading-data-rekap-1').hide();

            }
        }).done(function(data) {
            if (data.length < 1) {
                $('#loading-data-rekap-1').hide();
                $('#no-data-rekap-1').show();
                return 0;
            }

            let dataPreparation = [
                generateDataP('Januari'), generateDataP('Februari'), generateDataP(
                    'Maret'),
                generateDataP('April'), generateDataP('Mei'), generateDataP('Juni'),
                generateDataP('Juli'), generateDataP('Agustus'), generateDataP(
                    'September'),
                generateDataP('Oktober'), generateDataP('November'), generateDataP(
                    'Desember')
            ];
            data.forEach((item) => {
                dataPreparation[Number(item.bulan_no) - 1].data = item;
            });
            dataPreparation.forEach((item, index) => {

                let rowTobeAdded = `<tr>
                <td>${index+1}</td>
    <td>${item.bulan}</td>
    <td>${item.data.pertalite}</td>
    <td>${item.data.pertalite_volume}</td>
    <td>${item.data.pertamax}</td>
    <td>${item.data.pertamax_volume}</td>
    <td>${item.data.dexlite}</td>
    <td>${item.data.dexlite_volume}</td>
    <td>${item.data.maintenance}</td>
    <td>${item.data.ongkos_kerja}</td>
    <td>${item.data.bea_materai}</td>
    <td>${item.data.total}</td>
</tr>`;
                $('#add-row').append(rowTobeAdded);
            });
            $('#no-data-rekap-1').hide();


        }).then(() => {

        });
    });
});

$('#bulan_anggaran').prop('disabled', true);

$("#pemegang").select2({
    theme: "bootstrap",
    width: "100%", // need to override the changed default
});

$("#pemegang").change(() => {
    // $("input[name=jenis]").val("");
    let selected_id = $("#pemegang").val();
    console.log(selected_id);
    // $("#id").val(selected_id);

    $.ajax({
            url: `<?=base_url()?>/item/get-item-by-userid?user_id=${selected_id}`,
            dataType: "json",
        })
        .done(function(data) {
            // set tahun anggaran
            $("#item").html(``);
            $("#tahun").html(``);
            $('#bulan_anggaran').prop('disabled', true);
            if (data.length > 0) {



                $("#item").append(
                    `<option value selected disabled >--- Pilih Item ---</option>`
                );
                data.forEach((item) => {

                    $("#item").append(
                        `<option value="${item.id}" >${item.identitas}</option>`
                    );
                });
            } else {



                $("#item").html(
                    `<option value disabled selected>No Data Found !</option>`
                );
            }

        })
        .then(() => {});
    //hapus peruntukkan
});

$("#item").change(() => {
    // $("input[name=jenis]").val("");
    let selected_id = $("#item").val();
    console.log(selected_id);
    // $("#id").val(selected_id);

    $.ajax({
            url: `<?=base_url()?>/anggaran/get-anggaran-by-itemid?item_id=${selected_id}`,
            dataType: "json",
        })
        .done(function(data) {
            // set tahun anggaran
            if (data.length > 0) {
                $("#tahun").html(``);

                $("#tahun").append(
                    `<option value selected disabled >--- Pilih Item ---</option>`
                );
                data.forEach((item) => {

                    $("#tahun").append(
                        `<option value="${item.tahun}" >${item.tahun}</option>`
                    );
                });
            } else {
                $('#bulan_anggaran').prop('disabled', true);


                $("#tahun").html(
                    `<option value disabled selected>No Data Found !</option>`
                );
            }

        })
        .then(() => {
            $('#bulan_anggaran').prop('disabled', false);
        });
    //hapus peruntukkan
});

$('#tahun').change(() => {
    $('#search-rekap-btn').prop('disabled', false);
})
$('#search-rekap-btn').click((e) => {
    $('#rekap-tahun-item tbody').html('');
    e.stopImmediatePropagation();
    $.ajax({
        url: `<?=base_url()?>/rekap/get-rekap-tahun-item`,
        dataType: 'json',
        method: 'get',
        data: {
            'tahun': $('#tahun_klaim').val(),
            'item_id': $('#item').val()
        },
        beforeSend: () => {
            $('#loading-data-rekap-2').show();
            $('#no-data-rekap-2').hide();


        },
        complete: () => {
            $('#loading-data-rekap-2').hide();

        }
    }).done(function(data) {
        console.log(data)
        if (data.length < 1) {
            $('#loading-data-rekap-2').hide();
            $('#no-data-rekap-2').show();
            return 0;
        }
        let dataPreparation = [
            generateDataP('Januari'), generateDataP('Februari'), generateDataP(
                'Maret'),
            generateDataP('April'), generateDataP('Mei'), generateDataP('Juni'),
            generateDataP('Juli'), generateDataP('Agustus'), generateDataP(
                'September'),
            generateDataP('Oktober'), generateDataP('November'), generateDataP(
                'Desember')
        ];
        data.forEach((item) => {
            dataPreparation[Number(item.bulan_no) - 1].data = item;
        });
        dataPreparation.forEach((item, index) => {

            let rowTobeAdded = `<tr>
            <td>${index+1}</td>
            <td>${item.bulan}</td>
            <td>${item.data.pertalite}</td>
            <td>${item.data.pertalite_volume}</td>
            <td>${item.data.pertamax}</td>
            <td>${item.data.pertamax_volume}</td>
            <td>${item.data.dexlite}</td>
            <td>${item.data.dexlite_volume}</td>
            <td>${item.data.maintenance}</td>
            <td>${item.data.ongkos_kerja}</td>
            <td>${item.data.bea_materai}</td>
            <td>${item.data.total}</td>
            </tr>`;
            $('#rekap-tahun-item tbody').append(rowTobeAdded);
        });
        $('#no-data-rekap-2').hide();


    }).then(() => {

    });
});
</script>

<?= $this->endSection(); ?>
<?= $this->endSection(); ?>