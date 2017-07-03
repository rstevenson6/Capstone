<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users
{
  private $users = [
    'sylvie' => 'superuser',
    'ileri' => 'superuser',
    'kevin' => 'superuser',
    'ross' => 'superuser',
    'hannah' => 'superuser',
    'bob' => 'user'
  ];

  public function validateUser($username)
  {
    if (array_key_exists($username, $this->users))
    {
      return $this->users["$username"];
    }
    else
    {
      return 404;
    }
  }
}
