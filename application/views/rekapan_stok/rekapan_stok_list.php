<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan Stok Menu</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <!-- <?php echo anchor(site_url('rekapan_stok/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?> -->
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('rekapan_stok/printdoc_filter'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <?php if ($sampai) : ?>
                                <input type="hidden" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal" value="<?= $sampai; ?>">
                            <?php endif ?>
                            <?php if ($dari) : ?>
                                <input type="hidden" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal" value="<?= $dari; ?>">
                            <?php endif ?>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i>Print</button>
                        </form>
                        <?php echo anchor(site_url('rekapan_stok/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                        <?php echo anchor(site_url('rekapan_stok/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); ?>
                        <form action="<?php echo site_url('rekapan_stok/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <?php if ($sampai) : ?>
                                <input type="hidden" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal" value="<?= $sampai; ?>">
                            <?php endif ?>
                            <?php if ($dari) : ?>
                                <input type="hidden" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal" value="<?= $dari; ?>">
                            <?php endif ?>
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('rekapan_stok'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;margin-left:10px">
                    <form action="<?php echo base_url('rekapan_stok'); ?>" class="form-inline" method="post">
                        <div class="col input-group">
                            <!-- <label><b>Filter :</b></label> -->
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-calendar"></i></button></span>
                            <?php if ($dari) : ?>
                                <input type="text" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal" value="<?= $dari; ?>">
                            <?php else : ?>
                                <input type="text" class="form-control formdate" name="dari" id="DariTanggal" required="true" placeholder="Dari Tanggal">
                            <?php endif ?>
                        </div>
                        <div class="col input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                                <i class="fas fa-chevron-right"></i></span>
                            <?php if ($sampai) : ?>
                                <input type="text" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal" value="<?= $sampai; ?>">
                            <?php else : ?>
                                <input type="text" class="form-control formdate" name="sampai" id="SampaiTanggal" required="true" placeholder="Sampai Tanggal">
                            <?php endif ?>
                        </div>
                        <div class="col input-group">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-check-circle"></i> Submit</button>
                        </div>
                    </form>
                </div>
                <form method="post" action="<?= site_url('rekapan_stok/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <!-- <th style="width: 10px;"><input type="checkbox" name="selectall" /></th> -->
                            <th>No</th>
                            <th>Nama Menu</th>
                            <!-- <th>Tanggal Penjualan</th> -->
                            <th>Stok Terjual</th>
                            <!-- <th>Stok Sisa</th> -->
                            <!-- <th>Action</th> -->
                        </tr><?php
                                foreach ($rekapan_stok_data as $rekapan_stok) {
                                ?>
                            <tr>

                                <!-- <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $rekapan_stok->id_rekapan_stok; ?>" />&nbsp;</td> -->

                                <td width="80px"><?php echo ++$start ?></td>

                                <td><?php echo $rekapan_stok->nama_menu ?></td>
                                <!-- <td><?php echo $rekapan_stok->tanggal_penjualan ?></td> -->
                                <td><?php echo $rekapan_stok->stok_terjual ?></td>
                                <!-- <td><?php echo $rekapan_stok->stok_sisa ?></td> -->

                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function() {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function() {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function() {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function() {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function(closeEvent) {

                $.ajax({
                    url: "rekapan_stok/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
</script>