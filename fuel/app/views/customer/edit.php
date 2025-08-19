<h2>Editing Customer</h2>
<br>

<?php echo render('customer/_form'); ?>

<p>
    <?php echo Html::anchor('customers/view/'.$customer->id, 'View'); ?> |
    <?php echo Html::anchor('customers', 'Back'); ?></p>
