<?php
namespace RockHopSoft\BuckyStats\Controllers;

class BuckyEmbed
{
    public $id    = 1;
    public $url   = '';
    public $delay = 500;

    public function __construct($id = 1, $url = '', $delay = 500)
    {
        $this->id    = $id;
        $this->url   = $url;
        $this->delay = $delay;
    }
}
