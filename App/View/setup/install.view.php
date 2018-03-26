<?php if($data['success'] === true): ?>
Your instalation finished successfully!

<?php elseif(count($data['success'] > 0)):?>
There was an error in your installation.<br />
The following tables failed: <?= join(', ', $data['success'])?>

<?php endif;?>