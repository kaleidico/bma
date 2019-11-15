<section class="module-horizontal-rule <?php the_sub_field('space_after'); ?>">
    <?php if (get_sub_field('rule_size') == 'Half') { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr class="divider-half">
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (get_sub_field('rule_size') == 'Full') { ?>
        <div class="container-full">
            <hr class="divider-full">
        </div>
    <?php } ?>
</section>