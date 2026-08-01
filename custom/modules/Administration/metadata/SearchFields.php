<?php
// created: 2023-03-29 16:06:48
$searchFields['Administration'] = array (
  'user_name' => 
  array (
    'query_type' => 'default',
    'operator' => 'subquery',
    'subquery' => 'SELECT users.id FROM users WHERE users.deleted=0 and users.user_name LIKE',
    'db_field' => 
    array (
      0 => 'user_id',
    ),
  ),
);