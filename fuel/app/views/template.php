<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .alert-success {
            background-color: #dff0d8;
            border: 1px solid #d6e9c6;
            padding: 15px;
            margin-bottom: 20px;
            color: #3c763d;
        }

        .alert-error {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            padding: 15px;
            margin-bottom: 20px;
            color: #a94442;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <hr>

        <?php // Hiển thị thông báo (flash message) nếu có ?>
        <?php if (Session::get_flash('success')): ?>
            <div class="alert-success">
                <p><?php echo Session::get_flash('success'); ?></p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert-error">
                <p><?php echo Session::get_flash('error'); ?></p>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php echo $content; ?>
        </div>
    </div>
</body>

</html>