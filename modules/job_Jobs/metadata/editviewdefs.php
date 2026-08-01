<?php
$module_name = 'job_Jobs';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'company',
            'studio' => 'visible',
            'label' => 'LBL_COMPANY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'category',
            'studio' => 'visible',
            'label' => 'LBL_CATEGORY',
          ),
          1 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'type',
            'studio' => 'visible',
            'label' => 'LBL_TYPE',
          ),
          1 => 
          array (
            'name' => 'skills_required',
            'label' => 'LBL_SKILLS_REQUIRED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
          ),
          1 => 
          array (
            'name' => 'experience',
            'label' => 'LBL_EXPERIENCE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'salary_down',
            'label' => 'LBL_SALARY_DOWN',
          ),
          1 => 
          array (
            'name' => 'salary_up',
            'label' => 'LBL_SALARY_UP',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'expiration_date',
            'label' => 'LBL_EXPIRATION_DATE',
          ),
          1 => 
          array (
            'name' => 'positions',
            'label' => 'LBL_POSITIONS',
          ),
        ),
        6 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
