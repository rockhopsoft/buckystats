<?php
namespace RockHopSoft\BuckyStats\Controllers;

use App\Models\BSPopulationUs;
use App\Models\BSMortDailyUs;
use App\Models\BSMortWeeklyUs;
use RockHopSoft\BuckyStats\Controllers\BuckyDatasetInterface;

class BuckyDatasetCompareDataLines extends BuckyDatasetInterface
{

    public function wwdGraphAllLines($type = 'vital', $states = ['US'], $style = 'line')
    {
        $this->wwdGraphLoadRequests();
        $this->initDatasetGraph();
        $this->v["allTypes"] = new BuckyDatasetInterfaceDataTypes;
        $this->v["allTypes"]->loadDataTypes($this->v["timescale"]);
        $this->v["charts"] = [];
        $cnt = 0;
        $embedUrl = '';
        if (sizeof($this->v["states"]) > 1) {
            $embedUrl = '/multi/US/' . $this->v["timescale"] . '?states='
                . implode(',', $this->v["states"]) . '&data=';
        } elseif (sizeof($this->v["states"]) == 1) {
            $embedUrl = '/one/US/' . $this->v["states"][0] . '/'
                . $this->v["timescale"] . '?data=';
        }
        foreach ($this->v["allTypes"]->v["dataTypes"]->typeGroups as $g => $group) {
            if (sizeof($group->types) > 0) {
                $this->v["charts"][$g] = [ $group->title, [] ];
                foreach ($group->types as $t => $type) {
                    if ($this->v["timescale"] != 'days'
                        || strpos($type->slug, 'life-expect') === false) {
                        $cnt++;
                        $url = $embedUrl . $type->slug;
                        $this->v["charts"][$g][1][] = [
                            $type->title,
                            new BuckyEmbed($cnt, $url, ($cnt*1000))
                        ];
                    }
                }
            }
        }
        return view(
            'vendor.buckystats.nodes.3122-all-graph-checks',
            $this->v
        )->render();
    }


}
