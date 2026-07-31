<?php

class Veta_EndorsementsViewDetail extends ViewDetail
{
    public function display()
    {

        if ($this->bean->region_c) {
            $regions = explode(",", $this->bean->region_c);
            $regionstr = [];
            foreach ($regions as $region) {
                
                $regionstr[] = BeanFactory::getBean("Util_Region", str_replace("^", "", $region))->name;
            }
            $this->bean->region_c = implode(", ", $regionstr);
        }

        return parent::display();
    }
}
