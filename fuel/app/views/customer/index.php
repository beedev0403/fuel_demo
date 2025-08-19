<h2>Listing Customers</h2>
<br>
<?php echo Html::anchor('customers/create', 'Add new Customer', array('class' => 'btn btn-success')); ?>
<br><br>

<?php if ($customers): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>

                <tr>
                    <td><?php echo $customer->id; ?></td>
                    <td><?php echo $customer->name; ?></td>
                    <td><?php echo $customer->email; ?></td>
                    <td>
                        <?php echo Html::anchor('customers/view/' . $customer->id, 'View'); ?> |
                        <?php echo Html::anchor('customers/edit/' . $customer->id, 'Edit'); ?> |
                        <?php echo Html::anchor('customers/delete/' . $customer->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
                        <br>
                        <?php if (!empty($customer->posts)): ?>
                            <strong>Posts:</strong>
                            <ul style="margin-bottom:0;">
                                <?php foreach ($customer->posts as $post): ?>
                                    <li>
                                        <?php echo Html::anchor('posts/view/' . $post->id, $post->title); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <em>No posts</em>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No customers found.</p>
<?php endif; ?>