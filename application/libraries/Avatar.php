<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
use YoHang88\LetterAvatar\LetterAvatar;

class Avatar
{
    protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }

        function avatar($memberName){
            $avatarImage = new LetterAvatar($memberName, 'circle', 64);
            return $avatarImage;
        }

}
