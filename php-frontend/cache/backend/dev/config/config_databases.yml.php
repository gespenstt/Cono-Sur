<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2014/06/08 22:03:24

return array(
'propel' => new sfPropelDatabase(array (
  'classname' => 'DebugPDO',
  'dsn' => 'mysql:host=localhost;dbname=conosur',
  'username' => 'root',
  'password' => 'admin',
  'encoding' => 'utf8',
  'persistent' => true,
  'pooling' => true,
  'debug' => 
  array (
    'realmemoryusage' => true,
    'details' => 
    array (
      'time' => 
      array (
        'enabled' => true,
      ),
      'slow' => 
      array (
        'enabled' => true,
        'threshold' => 0.1,
      ),
      'mem' => 
      array (
        'enabled' => true,
      ),
      'mempeak' => 
      array (
        'enabled' => true,
      ),
      'memdelta' => 
      array (
        'enabled' => true,
      ),
    ),
  ),
  'name' => 'propel',
)),);
