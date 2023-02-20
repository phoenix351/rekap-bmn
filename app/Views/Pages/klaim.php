<?= $this->extend('Templates/main')?>

<?= $this->section('content')?>
<?php function format_rupiah($num)
{
    $ret = '<td><div class="d-flex justify-content-between"><span>Rp</span><span>'.number_format($num, 2, ",", ".").'</span></div></td>';
    return $ret;
}
?>
<p>Item</p>
<style>

</style>
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
                    <div class="modal-dialog modal-lg" role="document">
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
                                <div class="wizard">
                                    <div class="wizard-inner d-none">
                                        <div class="connecting-line"></div>
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#step1" data-toggle="tab" class="step" aria-controls="step1"
                                                    role="tab" aria-expanded="true"><span class="round-tab">1 </span>
                                                    <i>Step
                                                        1</i></a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step2" data-toggle="tab" class="step" aria-controls="step2"
                                                    role="tab" aria-expanded="false"><span class="round-tab">2</span>
                                                    <i>Step 2</i></a>
                                            </li>

                                        </ul>
                                    </div>

                                    <form action="<?=base_url()?>/klaim/insert" method="POST" id="klaim-add">
                                        <?= $this->include('Components/Form/klaim_add')?>


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
                                        <button type="button" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger" data-original-title="Remove">
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
<script src="<?= esc(base_url()); ?>/assets/js/klaim.js"></script>



<?= $this->endSection()?>