<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

A PHP Error was encountered

Severity: <?php echo $severity; ?>
Message:  <?php echo $message; ?>
Filename: <?php echo $filepath; ?>
Line Number: <?php echo $line; ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === true) { ?>

Backtrace:
	<?php foreach (debug_backtrace() as $error) { ?>
		<?php if (isset($error['file']) && 0 !== strpos($error['file'], realpath(BASEPATH))) { ?>

	File: <?php echo $error['file']; ?>
	Line: <?php echo $error['line']; ?>
	Function: <?php echo $error['function']; ?>

		<?php } ?>

	<?php } ?>
<?php } ?>