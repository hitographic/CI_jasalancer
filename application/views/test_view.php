<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product Filters in Codeigniter using Ajax</title>

    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">

</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <br />
                <br />
                <br />
                <div class="list-group">
                    <h3>Brand</h3>
                    <?php
                    foreach($skill->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector skill"
                                value="<?php echo $row['skill']; ?>">
                            <?php echo $row['skill']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="list-group">
                    <h3>kota</h3>
                    <?php
                    foreach($kota->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector kota"
                                value="<?php echo $row['kota']; ?>"> <?php echo $row['kota']; ?>
                            GB</label>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="list-group">
                    <h3>Internal Storage</h3>
                    <?php
                    foreach($tipe_freelancer->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector tipe_freelancer"
                                value="<?php echo $row['tipe_freelancer']; ?>"> <?php echo $row['tipe_freelancer']; ?>
                            GB</label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-9">
                <h2 align="center">Freelancer</h2>
                <br />
                <div align="center" id="pagination_link">

                </div>
                <br />
                <br />
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
#loading {
    text-align: center;
    background: url('<?php echo base_url(); ?>asset/loader.gif') no-repeat center;
    height: 150px;
}
</style>

<script>
$(document).ready(function() {

    filter_data(1);

    function filter_data(page) {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var skill = get_filter('skill');
        var kota = get_filter('kota');
        var tipe_freelancer = get_filter('tipe_freelancer');
        $.ajax({
            url: "<?php echo base_url(); ?>test/fetch_data/" + page,
            method: "POST",
            dataType: "JSON",
            data: {
                action: action,
                skill: skill,
                kota: kota,
                tipe_freelancer: tipe_freelancer
            },
            success: function(data) {
                $('.filter_data').html(data.product_list);
                $('#pagination_link').html(data.pagination_link);
            }
        })
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $(document).on('click', '.pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        filter_data(page);
    });

    $('.common_selector').click(function() {
        filter_data(1);
    });


    // untuk slider jika ada
    // $('#price_range').slider({
    //     range: true,
    //     min: 1000,
    //     max: 65000,
    //     values: [1000, 65000],
    //     step: 500,
    //     stop: function(event, ui) {
    //         $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
    //         $('#hidden_minimum_price').val(ui.values[0]);
    //         $('#hidden_maximum_price').val(ui.values[1]);
    //         filter_data(1);
    //     }

    // });

});
</script>

</html>