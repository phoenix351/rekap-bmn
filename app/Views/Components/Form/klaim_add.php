<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="main_form">

            <div class="tab-pane active" role="tabpanel" id="step1">
                <h4 class="text-center">Pilih Item Anggaran</h4>
                <div class="form-group">
                    <div class="input-icon">

                        <label for="item">Item</label>
                        <select class="form-control" id="item" name="item">
                            <option value="" selected disabled>----Pilih item----</option>

                            <?php foreach($items as $item):?>
                            <option value=<?= $item['id'] ?>><?=$item['identitas']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-6">
                        <label for="tanggal">Tanggal Nota</label>
                        <input type="date" class="form-control" id="tanggal" name='tanggal' value="">
                    </div>
                    <div class="col-md-6">
                        <div class="input-icon">
                            <label for="tahun">Tahun Anggaran</label>
                            <select class="form-control w-100" id="tahun" name="tahun">
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Jenis Barang</label>
                    <div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis" value="Kendaraan Dinas Roda 4" class="selectgroup-input">
                            <span class="selectgroup-button">Kendaraan Dinas Roda 4</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis" value="Kendaraan Dinas Roda 2" class="selectgroup-input">
                            <span class="selectgroup-button">Kendaraan Dinas Roda 2</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis" value="Generator Set" class="selectgroup-input">
                            <span class="selectgroup-button">Generator Set</span>
                        </label>
                    </div>
                </div>

                <ul class="list-inline pull-right">
                    <li><button type="button" class="btn btn-primary btn-round ml-auto next-step">Next</button></li>
                </ul>

            </div>

            <div class="tab-pane" role="tabpanel" id="step2">
                <h4 class="text-center">Input Klaim</h4>
                <div class="row form-group">
                    <div class="col-md-8">
                        <label for="pertamax_harga">Jumlah Harga Pertamax</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="pertamax_harga"
                                id="pertamax_harga" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="pertamax_volume">Volume</label>

                        <div class="input-group mb-3">


                            <input type="number" class="form-control text-right" name="pertamax_volume"
                                id="pertamax_volume" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Liter</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-md-8">
                        <label for="pertalite_harga">Jumlah Harga Pertalite</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="pertalite_harga"
                                id="pertalite_harga" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="pertalite_volume">Volume</label>

                        <div class="input-group mb-3">


                            <input type="number" class="form-control text-right" name="pertalite_volume"
                                id="pertalite_volume" aria-label="Amount (to the nearest dollar)" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Liter</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-md-8">
                        <label for="dexlite_harga">Jumlah Harga Dexlite</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="dexlite_harga"
                                id="dexlite_harga" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="dexlite_volume">Volume</label>

                        <div class="input-group mb-3">


                            <input type="number" class="form-control text-right" name="dexlite_volume"
                                id="dexlite_volume" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Liter</span>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-sm-12">
                        <label for="maintenance">Maintenance</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="maintenance"
                                id="maintenance" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <label for="ongkos_kerja">Ongkos Kerja</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="ongkos_kerja"
                                id="ongkos_kerja" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12">
                        <label for="bea_materai">Bea Materai</label>

                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control text-right klaim-price" name="bea_materai"
                                id="bea_materai" aria-label="Amount (to the nearest dollar)" value="" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pagu_sisa">Pagu Sisa (Sebelum pengurangan)</label>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control text-right klaim-price non-edit" name="pagu_sisa"
                            id="pagu_sisa" aria-label="Amount (to the nearest dollar)" value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total_klaim">Total Klaim (dihitung otomatis)</label>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control text-right klaim-price non-edit" name="total_klaim"
                            id="total_klaim" aria-label="Amount (to the nearest dollar)" value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <input type="text" class="d-none" name="id_anggaran" id="id_anggaran">
                <input type="text" class="d-none" name="pagu_anggaran" id="pagu_anggaran">

                <div class="form-group">
                    <label for="pagu_sisa_after">Pagu Sisa (Setelah pengurangan)</label>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control text-right klaim-price non-edit" name="pagu_sisa_after"
                            id="pagu_sisa_after" aria-label="Amount (to the nearest dollar)" value="0">
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>

                <div class="form-group d-flex justify-content-end">
                    <div class="p-2"><button type="button"
                            class="btn btn-focus  btn-round ml-auto prev-step">Back</button></div>
                    <div class="p-2"><input type="submit" class="btn btn-primary btn-round ml-auto submit" value="Add">
                    </div>

                </div>

                </ul>
            </div>
        </div>
    </div>

</div>