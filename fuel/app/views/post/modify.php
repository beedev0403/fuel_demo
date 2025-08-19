<?php
// Kiểm tra xem biến $post có được truyền vào từ controller hay không.
// Nếu có, chúng ta đang ở chế độ "chỉnh sửa".
$is_edit = isset($post);
?>

<?php // Sử dụng Form helper của FuelPHP để tạo thẻ <form> ?>
<?php // Nó sẽ tự động thêm token CSRF để bảo mật ?>
<?php echo Form::open(array('class' => 'form-horizontal')); ?>

<fieldset>
    <legend><?php echo $is_edit ? 'Edit' : 'New'; ?> Post</legend>

    <div class="form-group" style="margin-bottom: 15px;">
        <?php echo Form::label('Title', 'title', array('class' => 'control-label')); ?>

        <?php
        // Input::post('title', ...) dùng để giữ lại giá trị đã nhập nếu form validation thất bại
        // Nếu là chế độ edit, giá trị mặc định là $post->title
        echo Form::input('title', Input::post('title', $is_edit ? $post->title : ''), array(
            'class' => 'form-control',
            'placeholder' => 'Post Title',
            'style' => 'width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;'
        ));
        ?>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <?php echo Form::label('Body', 'body', array('class' => 'control-label')); ?>

        <?php
        echo Form::textarea('body', Input::post('body', $is_edit ? $post->body : ''), array(
            'class' => 'form-control',
            'rows' => 8,
            'placeholder' => 'Post content',
            'style' => 'width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;'
        ));
        ?>
    </div>

    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save Post', array(
            'class' => 'btn btn-primary',
            'style' => 'padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;'
        )); ?>
    </div>
</fieldset>
<?php echo Form::close(); ?>

<br>
<?php echo Html::anchor('posts', 'Back to List'); ?>