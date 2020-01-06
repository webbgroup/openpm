<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

An uncaught Exception was encountered

Type: <?php echo get_class($exception); ?>
Message: <?php echo $message; ?>
Filename: <?php echo $exception->getFile(); ?>
Line Number: <?php echo $exception->getLine(); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === true) { ?>

Backtrace:
	<?php foreach ($exception->getTrace() as $error) { ?>
		<?php if (isset($error['file']) && 0 !== strpos($error['file'], realpath(BASEPATH))) { ?>

	File: <?php echo $error['file']; ?>
	Line: <?php echo $error['line']; ?>
	Function: <?php echo $error['function']; ?>

		<?php } ?>

	<?php } ?>
<?php } ?>