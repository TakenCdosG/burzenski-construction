<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 $num = rand(0,9);
 ?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
	<?php if($id==$num){ ?>
		<div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
			<?php print $row; ?>
		</div>
	<?php } ?>
<?php endforeach; ?>