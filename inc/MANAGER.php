<?php
/**
 * The factory object MANAGER is designed to negotiate common actions and allow
 * special tampering with normal page display.
 * 
 * MANAGER can also be used to set arbitrary values as if they were public 
 * variables. This is not a great idea but it is possible.
 * 
 * Most methods are chainable.
 *
 * @author LordMatt <@lordmatt>
 */
class MANAGER {

    private static $instance = null;

    private $callback = array();
    private $title = 'A page in a book';
    
    private $data=array();
    
    private $options = array();
    
    private function __construct(){
        // nothing to see here
    }

    /**
     * 
     * @return MANAGER
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new MANAGER();
        }
        return self::$instance;
    }
    /**
     * 
     * @return MANAGER
     */
    public function register_callback($event,$callable){
        $this->callback[$event][] = $callable;
        return $this;
    }
    /**
     * 
     * @return MANAGER
     */
    public function event($event){
        if(isset($this->callback[$event]) && count($this->callback[$event])>0){
            foreach($this->callback[$event] as $call){
                if(is_callable($call)){
                    call_user_func($call);
                }else{
                    echo "CANNOT CALL '{$call}'";
                }
            }
        }
        return $this;
    }
    /**
     * 
     * @return MANAGER
     */
    public function theme($part){
        $this->event('pre_'.$part);
        include(_INC_PATH_.'theme/'.$part.'.php');
        $this->event('post_'.$part);
        return $this;
    }
    /**
     * set page title
     * @return MANAGER
     */
    public function title($title){
        $this->title = $title;
        $this->event('set_the_title');
        return $this;
    }
    /**
     * Echo the title
     * @return MANAGER
     */
    public function the_title(){
        echo $this->title;
        return $this;
    }
    
    public function __set($name, $value) {
        $this->data[$name]=$value;
        $this->event('set_'.$name);
    }    
    public function __get($name) {
        if(!isset($this->data[$name])){
            $this->event('not_set_'.$name);
            return null;
        }
        return $this->data[$name];
    }
    public function __unset($name) {
        unset($this->data[$name]);
    }
    public function __isset($name) {
        return isset($this->data[$name]);
    }
    

    /**
     * 
     * @return MANAGER
     */
    public function module($module){
        require_once _INC_PATH_.'modules/'.$module.'.php';
        return $this;
    }
    
}

/**
 * 
 * @return MANAGER
 */
function M(){
    return MANAGER::getInstance();
}