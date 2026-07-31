<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class Veta_EndorsementsHooks
{
    function process($bean)
    {
        $endorsements = BeanFactory::getBean("Veta_Endorsements", $bean->id);
        $years = [1, 2, 3, 4, 5];
        foreach ($years as $year) {
            $used = $endorsements->{"positions_used_$year"} ? $endorsements->{"positions_used_$year"} : 0;
            $available = $endorsements->{"positions_year_$year"};
            if ($available)
                $bean->{"positions_year_$year"} = "$used / $available";
        }
    }
}
