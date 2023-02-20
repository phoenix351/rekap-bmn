<?= $this->extend('Templates/main')?>

<?= $this->section('content')?>
<p>Item</p>
<div class="card-body">
    <?php 
    function search($array, $key, $value)
    {
        $results = array();
        
    
        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }
    
            foreach ($array as $subarray) {
                $results = array_merge($results, search($subarray, $key, $value));
            }
        }
    
        return $results;
    }
    ?>
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
                                <form action="<?=base_url()?>/item" method="POST">
                                    <?= $this->include('Components/Form/item_add')?>
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
                <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <form action="<?=base_url()?>/item/update" method="POST">
                                    <?= $this->include('Components/Form/item_update')?>
                            </div>
                            <div class="modal-footer no-bd">
                                <input type="submit" id="addRowButton" class="btn btn-primary" value="Save"></input>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Pemegang</th>
                                <th>Jenis</th>
                                <th>Peruntukan</th>
                                <th>Identitas</th>
                                <th>Jenis Identitas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Pemegang</th>
                                <th>Jenis</th>
                                <th>Peruntukan</th>
                                <th>Identitas</th>
                                <th>Jenis Identitas</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($item_users as $item):?>
                            <tr>

                                <td><?= $item["nama"] ?></td>
                                <td><?= $item["jenis"] ?></td>
                                <td><?= $item["jabatan"] ?></td>
                                <td><?= $item["identitas"] ?></td>
                                <td><?= $item["jenis_id"] ?></td>
                                <td>
                                    <div class="form-button-action">
                                        <!-- <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" id="editItemButton" data-original-title="Edit Task" data-toggle="modal" data-target="#editItemModal"> -->
                                        <button class="btn btn-link btn-primary btn-lg update" data-toggle="tooltip"
                                            title="" data-original-title="Edit Task" value="<?=$item['id']?>">

                                            <i class="fa fa-edit"></i>

                                        </button>
                                        <button type="button" data-toggle="tooltip" title=""
                                            class="btn btn-link btn-danger delete" data-original-title="Remove"
                                            value="<?=$item['id']?>">
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
    // $("#peruntukan").select2(
    // {dropdownParent: $('#addRowModal'),
    // theme: "bootstrap",
    // width: '100%' // need to override the changed default

    // }
    // );


    $('.update').click(function(e) {
        // console.log(e.target.value);
        $.ajax({
            url: `<?=base_url()?>/item/get-item`,
            dataType: 'json',
            method: 'get',
            data: {
                'id': e.currentTarget.value
            },
        }).done(function(data) {
            console.log(data);
            $('#pemegang_update').val(data.pengguna_id)
            $('#jabatan_update').val(data.jabatan)
            $('#item_id_update').val(data.id)
            $("input[name=jenis_update]").val([data.jenis]);
            $("input[name=jenis_id_update]").val([data.jenis_id]);

            // $("input[name=jenis_update][value=" + data.jenis + "]").prop('checked', true);
            // $("input[name=jenis_id_update][value=" + data.jenis_id + "]").prop('checked', true);
            $('#identitas_update').val(data.identitas);

        }).then(() => {
            $('#editItemModal').modal('show');

            // window.location.reload();

        });
    });




    $('.delete').click(function(e) {
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
                // console.log(id_deleted);
                $.ajax({
                    url: `<?=base_url()?>/item/delete`,
                    dataType: 'json',
                    method: 'post',
                    data: {
                        'id': id_deleted
                    },
                }).done(function(data) {
                    swal(`Poof! Item has been deleted!`, {
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
                swal("Your imaginary file is safe!", {
                    buttons: {
                        confirm: {
                            className: 'btn btn-success'
                        }
                    }
                });
            }
        });
    });

    $("#pemegang").select2({
        dropdownParent: $('#addRowModal'),
        theme: "bootstrap",
        width: '100%' // need to override the changed default

    });

    $("#pemegang_update").select2({
        dropdownParent: $('#editItemModal'),
        theme: "bootstrap",
        width: '100%' // need to override the changed default

    });

    // membuat fungsi onchange
    $('#pemegang').change(() => {
        $('#jabatan').empty();
        let selected_id = $('#pemegang').val();
        console.log(selected_id);
        $('#id').val(selected_id);

        $.ajax({
            url: `<?=base_url()?>/item/get_user_by_id?id=${selected_id}`,
            dataType: 'json',

        }).done(function(data) {
            console.log(data)
            $('#jabatan').val(data.jabatan)
        });
        //hapus peruntukkan
        $('#jabatan').val('');

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

    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action =
        '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';


});
</script>


<?= $this->endSection()?>