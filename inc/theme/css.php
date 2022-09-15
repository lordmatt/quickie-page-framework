<?php 
/**
 * This is an example of an injected theme file using the module system.
 */


M()->event('CSS');
  
?><style>
    body {
       background-image: url(https://example.com/media/mybackground.png);
       background-size: cover;
       background-repeat: no-repeat;
       background-position: center center;  
       background-attachment: fixed; 
    }
</style> 
