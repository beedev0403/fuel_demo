<h2>Listing Posts</h2>
<br>

<?php if ($posts): ?>
    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Title</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Body</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Created At</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $item): ?>
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <?php echo $item->title; ?>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <?php echo Str::truncate($item->body, 150); ?>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <?php echo $item->get_created_at_formatted(); ?>
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <?php echo Html::anchor('posts/edit/' . $item->id, 'Edit'); ?> |
                        <?php echo Html::anchor('posts/delete/' . $item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Posts.</p>
<?php endif; ?>

<p>
    <br>
    <?php echo Html::anchor('posts/create', 'Add new Post'); ?>
</p>