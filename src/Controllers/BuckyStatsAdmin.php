<?php
namespace RockHopSoft\BuckyStats\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\SLDefinitions;

//use RockHopSoft\BuckyStats\Controllers\BuckyStatsReport;
use RockHopSoft\Survloop\Controllers\Admin\AdminSubsController;

class BuckyStatsAdmin extends AdminSubsController
{
    public $classExtension = 'BuckyStatsAdmin';
    public $treeID         = 1;

    public function initPowerUser($uID = -3)
    {
        if (!$this->v["user"] || intVal($this->v["user"]->id) <= 0
            || !$this->v["user"]->hasRole('administrator|staff|databaser|brancher|volunteer')) {
            return redirect('/');
        }
        return [];
    }

    protected function initExtra(Request $request)
    {
        //$this->custReport = new BuckyStatsReport($request);


        return true;
    }

    public function loadAdmMenu()
    {
        $treeMenu = [];
        if ($this->v["user"]->hasRole('administrator|staff|databaser|brancher|volunteer')) {
            $treeMenu[] = $this->admMenuLnk('javascript:;', 'BuckyStats Links',
                '<i class="fa fa-building-o" aria-hidden="true"></i>', 1, [
                $this->admMenuLnk('javascript:;', 'All Links'),
                $this->admMenuLnk('javascript:;', 'Manage Tags')
                ]);
            if (!$this->v["user"]->hasRole('volunteer')) {
                return $this->addAdmMenuBasics($treeMenu);
            }
        }
        return $treeMenu;
    }

}
