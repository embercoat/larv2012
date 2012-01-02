<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_counter extends Model
{
    function record(){
        $browser = new Browser();
        $insert = DB::insert('visitor', array('ip', 'url', 'browser', 'version', 'platform', 'mobile', 'timestamp'))
            ->values(array(
                $_SERVER['REMOTE_ADDR'],
                $_SERVER['REQUEST_URI'],
                $browser->getBrowser(),
                $browser->getVersion(),
                $browser->getPlatform(),
                $browser->isMobile(),
                time()
            ));
        $insert->execute();
    }
}