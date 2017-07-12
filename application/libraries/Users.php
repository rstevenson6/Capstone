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

  public function isAuthorised($username)
  {
    if (array_key_exists($username, $this->users))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  public function getUserRole($username)
  {
    if ($this->isAuthorised($username))
    {
      return $this->users["$username"];
    }
    else
    {
      return null;
    }
  }
}
