<body>
    <div class="jumbotron halaman2">
        <h1 class="display-4">Temukan<span style="color:#ffc857;"> Freelancer </span><br>Terbaikmu</h1>
    </div>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <br />
                <br />
                <br />
                <!-- <div class="list-group">
                    <h3>Price</h3>
                    <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div> -->
                <div class="list-group">
                    <h3>Brand</h3>
                    <?php
                    foreach ($skill->result_array() as $row) {
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
                    <h3>RAM</h3>
                    <?php
                    foreach ($kota->result_array() as $row) {
                        ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector kota"
                                value="<?php echo $row['nama_kota']; ?>">
                            <?php echo $row['nama_kota']; ?>
                            GB</label>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="list-group">
                    <h3>Internal Storage</h3>
                    <?php
                    foreach ($tipe->result_array() as $row) {
                        ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector tipe"
                                value="<?php echo $row['tipe_freelancer']; ?>"> <?php echo $row['tipe_freelancer']; ?>
                            GB</label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-9">
                <h2 align="center">Product Filters in Codeigniter using Ajax</h2>
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


    <script>
    $(document).ready(function() {

        filter_data(1);

        function filter_data(page) {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var skill = get_filter('skill');
            var kota = get_filter('kota');
            var tipe = get_filter('tipe');
            $.ajax({
                url: "<?php echo base_url(); ?>freelancer_filter/fetch_data/" + page,
                method: "POST",
                dataType: "JSON",
                data: {
                    action: action,
                    skill: skill,
                    kota: kota,
                    tipe: tipe
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

</body>