This system is not meant to do everything. It is meant to do one thing efficiently.

quickie-page-framework exists to make generating pages easier by taking care of
everything that is not the content. That said, this can be extended easily.

quickie-page-framework is event driven so modules can subscribe to events. To add
a module, simple add its root file to your boot.php. Like this

`    M()->module('mymodule');`

by default, modules are searched for in `inc/modules/`. The module name is the
module file name less the `.php`.

Subscribe a module to events like this:

         <?php
        
        M()->register_callback('post_head', 'my_function');

        function my_function(){
            // your code here
        }


or this:

  
        <?php
        
        M()->register_callback('post_head', array('my_class','my_function'));
        
        class my_class {
            public function my_function(){
                // your code here
            }
        }

Standard events

* set_the_title - just after the title is set

* pre_[themefilename]
* post_[themefilename]

Fires before and after a theme file is called. The first two are liekly to be 
`pre_head` and `post_head`.

* head

The head event fires when the header is loaded. Ideal for adding meta tags, CSS, 
and the like.

* body - when the theme body loads
* body_main - inside the `<main>` tag
* script - after the HTML where well behaved script should go
* end - after `</html>`

Folder structure:
        |
        +-[inc]
        |   |
        |   +-[modules]
        |   +-[theme]
        +-[public_html]
            |
            +-[media]

Media is where the framework expects the style.css file to be. It is also a good
place to put images, JS, and so forth. An empty index.html might be an idea too.
