<div class="container">

    <?php
    foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

    <?php endforeach; ?>



    <div>
        <?php echo $output; ?>

    </div>

    <?php foreach ($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

</div>
</div>