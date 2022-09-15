<?php
    require_once('boot.php');
    
    // M() is the shortcut function to access the MANAGER class
    
    M()->title('My Title');
    M()->theme('head'); 
    M()->theme('body'); 
?>

<h1>Your content goes here</h1>
<p>You can put whatever you want on your page.</p>

<?php M()->theme('footer'); ?>