<?php if($data['success'] === true): ?>
You successfully uninstalled the application!

<?php elseif(count($data['success'] > 0)):?>
There was an error while uninstalling.<br />
The following tables failed: <?= join(', ', $data['success'])?>

<?php endif;?>