<?= $this->extend('Templates/main')?>

<?= $this->section('content')?>
<div class="card-body">
    <?php setlocale(LC_MONETARY,"in_ID");?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title"> Cetak Rekap</h4>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?= $this->include('Components/Form/cetak_rekap')?>


                    <?= $this->include('Components/Form/cetak_rekap_summary')?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->section('js')?>

<script>
const NAME_SERVER = "http://localhost";

function sumKlaim(klaim) {
    // hitung bbm
    let jumlah_total = 0;
    let jumlah_jasa = 0;
    let jumlah_bbm = 0;
    let jumlah_sparepart = 0;
    klaim.forEach((item) => {

        jumlah_total = jumlah_total + Number(item.total_klaim);
        jumlah_sparepart = jumlah_sparepart + Number(item.maintenance);
        jumlah_jasa = jumlah_jasa + Number(item.ongkos_kerja) + Number(item.bea_materai);
        jumlah_bbm = jumlah_bbm + Number(item.pertamax_harga) + Number(item.pertalite_harga) + Number(item
            .dexlite_harga);

    });

    return {

        'jumlah_bbm': jumlah_bbm,
        'jumlah_sparepart': jumlah_sparepart,
        'jumlah_jasa': jumlah_jasa,
        'jumlah_total': jumlah_total,
    }
}

$('#bulan_anggaran').prop('disabled', true);
$('#search-rekap-btn').prop('disabled', true);

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
            url: `${NAME_SERVER}/item/get-item-by-userid?user_id=${selected_id}`,
            dataType: "json",
        })
        .done(function(data) {
            // set tahun anggaran
            $("#item").html(``);
            $("#tahun").html(``);
            $('#search-rekap-btn').prop('disabled', true);
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
            url: `${NAME_SERVER}/anggaran/get-anggaran-by-itemid?item_id=${selected_id}`,
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
                $('#search-rekap-btn').prop('disabled', true);
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

$('#search-rekap-btn').click(() => {
    $.ajax({
            url: `${NAME_SERVER}/klaim/get-summary-cetak`,
            dataType: "json",
            data: {
                'item_id': $('#item').val(),
                'pengguna_id': $('#pemegang').val(),
                'tahun': $('#tahun').val(),
                'bulan': $('#bulan_anggaran').val()
            }
        })
        .done(function(data) {
            console.log(data);
            $('#nama_pemegang').val(data.user.nama);
            $('#jabatan').val(data.user.jabatan);
            $('#identitas').val(data.item.identitas);
            $('#tahun_cetak').val(data.tahun);
            $('#bulan_cetak').val(data.bulan);
            $('#jenis').val(data.item.jenis);
            console.log({
                data: data.klaim
            })
            summaryKlaim = sumKlaim(data.klaim);

            $('#klaim_bbm').val(summaryKlaim.jumlah_bbm);
            $('#klaim_sparepart').val(summaryKlaim.jumlah_sparepart);
            $('#klaim_jasa').val(summaryKlaim.jumlah_jasa);
            $('#klaim_total').val(summaryKlaim.jumlah_total);


        })
        .then(() => {});
});
</script>
<?= $this->endSection(); ?>
<?= $this->endSection(); ?>