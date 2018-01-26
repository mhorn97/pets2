<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1>Order a Pet</h1>

<form method="post" action="">
    Pet Name<input type="text" name="name">

    Pet Type <input type="text" name="type">
    <br>
    <!-- color -->
    <label class="col-sm-1 control-label"
           for="pet-color">Pet Color</label>
    <div class="col-sm-3"></div>
    <?php if ($errors['color']): ?>
        <p><?= ($errors['color']) ?></p>
    <?php endif; ?>
    <select class="form-control" name="pet-color" id="pet-color">
        <option>--Select--</option>
        <?php foreach (($colors?:[]) as $colorOption): ?>
            <option>
                <?php if ($colorOption == $color): ?>selected<?php endif; ?>
                <?= ($colorOption)."
" ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="submit" value="Submit">SUBMIT</button>
</form>

<!-- if submission was successful, display a confirmation -->
<?php if ($success): ?>
    <h2>Thank you for your order for a <?= ($color) ?> <?= ($type) ?> with the name <?= ($name) ?>!</h2>
<?php endif; ?>

</body>
</html>