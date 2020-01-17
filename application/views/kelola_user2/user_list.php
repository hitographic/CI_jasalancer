
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">

            <body>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <!-- <h2 style="margin-top:0px">Kelola User</h2> -->
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <?php echo anchor(site_url('kelola_user/create'), 'Create', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('kelola_user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                        <?php echo anchor(site_url('kelola_user/word'), 'Word', 'class="btn btn-primary"'); ?>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role Id</th>
                            <th>Is Active</th>
                            <th width="200px">Aksi</th>
                        </tr>
                    </thead>

                </table>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
                        return {
                            "iStart": oSettings._iDisplayStart,
                            "iEnd": oSettings.fnDisplayEnd(),
                            "iLength": oSettings._iDisplayLength,
                            "iTotal": oSettings.fnRecordsTotal(),
                            "iFilteredTotal": oSettings.fnRecordsDisplay(),
                            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings
                                ._iDisplayLength)
                        };
                    };

                    var t = $("#mytable").dataTable({
                        initComplete: function() {
                            var api = this.api();
                            $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                                    }
                                });
                        },
                        oLanguage: {
                            sProcessing: "Tunggu..."
                        },
                        processing: true,
                        serverSide: true,
                        ajax: {
                            "url": "kelola_user/json",
                            "type": "POST"
                        },
                        columns: [{
                                "data": "id",
                                "orderable": false
                            }, {
                                "data": "name"
                            }, {
                                "data": "email"
                            }, {
                                "data": "role_id"
                            }, {
                                "data": "is_active"
                            },
                            {
                                "data": "action",
                                "orderable": false,
                                "className": "text-center"
                            }
                        ],
                        order: [
                            [0, 'desc']
                        ],
                        rowCallback: function(row, data, iDisplayIndex) {
                            var info = this.fnPagingInfo();
                            var page = info.iPage;
                            var length = info.iLength;
                            var index = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                        }
                    });
                });
                </script>
            </body>
        </div>
    </div>
</div>

