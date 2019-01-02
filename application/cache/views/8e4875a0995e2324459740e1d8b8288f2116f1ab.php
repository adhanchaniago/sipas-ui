<?php $__env->startSection('content'); ?>
  <div id="body">
    <p>The page you are looking at is using Blade Tempate Engine</p>

    <p>If you would like to edit this page you'll find it located at:</p>
    <code>application/views/welcome_message.php</code>

    <p>The corresponding controller for this page is found at:</p>
    <code>application/controllers/Welcome.php</code>

    <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>