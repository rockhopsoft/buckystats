<?php
/**
  * BuckyStatsAdminMenu is responsible for building the menu inside the
  * dashboard area for all user types.
  *
  * BuckyStats.org
  * @package  rockhopsoft/buckystats
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since v0.0.1
  */
namespace RockHopSoft\BuckyStats\Controllers;

use Auth;
use RockHopSoft\Survloop\Controllers\Admin\AdminMenu;

class BuckyStatsAdminMenu extends AdminMenu
{
    public function loadAdmMenu($currUser = null, $currPage = '')
    {
        $this->currUser = $currUser;
        $this->currPage = $currPage;
        $treeMenu = [];
        if (isset($this->currUser)) {
            $published = $flagged = 0;
            if ($this->currUser->hasRole('administrator|staff|databaser|brancher|partner')) {

                return $this->loadAdmMenuAdmin($currUser);

            } elseif ($this->currUser->hasRole('volunteer')) {

            }
        }
        return $treeMenu;
    }

    protected function loadAdmMenuAdmin($currUser = null)
    {
        $treeMenu = [];
        //$treeMenu[] = $this->addAdmMenuHome();
        $treeMenu[] = $this->admMenuLnk(
            '/dash/population-datasets',
            'Compile Datasets',
            '<i class="fa fa-diamond" aria-hidden="true"></i>'
        );
        return $this->addAdmMenuBasics($treeMenu);
    }


}