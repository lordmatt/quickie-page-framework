<?php

M()->register_callback('post_head', 'module_css');

function module_css(){
    M()->theme('css');
}