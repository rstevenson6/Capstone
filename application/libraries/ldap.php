<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ldap
{
  // define test username and test plaintext pass
  $username = '';
  $plainpass = '';

  $enable_debug_output = TRUE;

  $eol = '<br />';
  // ldap settings
  // this will only work on campus, do not change it
  $ldap_host = 'n10.ok.ubc.ca';
  // do not change the basedn
  $ldap_basedn = 'ou=ouc,o=ouc';
  // this is the lists of contexts that will be searched recursively when looking for accounts
  // the context listed is valid for student accounts, but not for staff
  // for staff account contexts, contact IT
  $ldap_contexts[] = 'ou=stu-ubco,ou=nkc,ou=ins,o=ouc';

  // ldap_secure_connect forces an ldaps bind, as oppsed to ldap
  // leave this set to TRUE.  Setting it to FALSE should only be used for debugging purposes
  $ldap_secure_connect = TRUE;

  // ldap required group membership array
  // users must be members of any one of the following groups
  // if the array is not defined, group membership has no effect on authentication
  // you should not use this for your project as it would require IT staff to manage the user group and system access at our end
  // $ldap_group_allow[] = 'CN=somegroup,OU=SERVERGROUPS,OU=UNIX,OU=GROUPS,OU=NKC,OU=NET,O=OUC';

  function __construct()
  {
    // check for existence of PHP LDAP functions
    if (!function_exists('ldap_connect')) {
      m_debug_write('::FATAL ERROR:: No PHP ldap_connect function found.  Is the PHP LDAP extension installed?');
      exit();
    }

    if (auth_ldap($username, $plainpass)===TRUE) {
      m_debug_write('Authentication successful');
    } else {
      m_debug_write('Authentication failure');
    }
  }

  function auth_ldap($username, $plainpass)
  {
    m_debug_write('LDAP authentication attempted');

    // ensure that a blank username or password cannot be used to authenticate
    if (!$username or !$plainpass) { return; }

    global $ldap_host;
    global $ldap_basedn;
    global $ldap_contexts;
    global $ldap_secure_connect;
    global $ldap_group_allow;

    global $default_uid;
    global $default_gid;

    // use LDAP to walk the LDAP tree and find a matching username (if one exists)
    // once a matching username is found, attempt and LDAP bind using the provided
    // username and password

    // if a secure connection was specified, then change the name of the ldap_host to reflect that
    if ($ldap_secure_connect===TRUE) { $ldap_host = 'ldaps://'.$ldap_host; }

    // step 1 - connect to the server and retrieve a list of matching usernames (if possible)
    m_debug_write('Attempting LDAP connection');
    $ldap_connection = ldap_connect($ldap_host)
      or die ('Could not connect to '.$ldap_host);
    m_debug_write('LDAP connection successful');

    // $query_values defines which values from the ldap_server we would like to have returned
    // in this case we're defining the values to be returned for our initial search
    $query_values=array('dn');

    m_debug_write('Attempting LDAP context search for '.$username);
    // start searching for the provided username in each of the ldap_contexts (recursive)
    foreach($ldap_contexts as $ldap_context) {
      $base_dn = $ldap_context;
      m_debug_write('Searching '. $base_dn);
      $ldap_search_result = ldap_search($ldap_connection, $base_dn,'cn='.$username, $query_values);
      if (!$ldap_search_result) {
        m_debug_write('LDAP Error: ('. ldap_errno($ldap_connection) .') - '. ldap_error($ldap_connection));
        return FALSE;
      } else {
        if (ldap_count_entries($ldap_connection, $ldap_search_result)>0) {
          $valid_ldap_user = ldap_get_dn($ldap_connection, ldap_first_entry($ldap_connection, $ldap_search_result));
          break;
        }
      }
    }

    if ($valid_ldap_user)
    {
      m_debug_write('Located '.$valid_ldap_user.' - attempting bind to LDAP');
      // located a valid user record matching the provided user name
      // so now we can try to bind
      if(@ldap_bind($ldap_connection, $valid_ldap_user, $plainpass)===TRUE)
      {
        m_debug_write('LDAP bind successful');
        // we have a successful connection, username/password combo is valid
        $query_values=array('dn', 'uidnumber', 'gidnumber', 'groupmembership');
        $lresult = ldap_read($ldap_connection, $valid_ldap_user, 'objectClass=*', $query_values);
        $ldap_entry = ldap_get_entries($ldap_connection, $lresult);
        $uid = $ldap_entry[0]['uidnumber'][0];
        $gid = $ldap_entry[0]['gidnumber'][0];

        // check to see if the user is a member of one or more of the
        // allowed ldap groups, if defined
        if (is_array($ldap_group_allow) and count($ldap_group_allow)>0)
        {
          m_debug_write('Checking to see if user is a member of the groups defined in $ldap_group_allow array');
          if ($ldap_entry[0]['groupmembership']['count'] > 0)
          {
            // user is definately a member of one or more groups
            // we can drop the count attribute
            unset($ldap_entry[0]['groupmembership']['count']);
            foreach($ldap_entry[0]['groupmembership'] as $group_name)
            {
              foreach($ldap_group_allow as $ldap_allowed_group)
              {
                m_debug_write('User in group: '.$ldap_allowed_group);
                m_debug_write('Allowed group: '.$group_name);
                if (strtoupper($group_name)==strtoupper($ldap_allowed_group))
                {
                  m_debug_write('MATCH success');
                  $group_match_success = TRUE;
                }
                else
                {
                  m_debug_write('No match');
                }
              }
            }
            if (!$group_match_success===TRUE)
            {
              // we have failed a group match, write to debug and return nothing [fail auth]
              m_debug_write('User is not a member of any of the groups defined in $ldap_group_allow array');
              return FALSE;
            }
            else
            {
              m_debug_write('User is a member of at least one of the groups defined in $ldap_group_allow array');
            }
          }
        }
          return TRUE;
      }
      else
      {
        m_debug_write('LDAP bind FAILED');
        return FALSE;
      }
    } else {
        m_debug_write('LDAP user name not found');
        return FALSE;
    }
  }

  function m_debug_write($message)
  {
    // this function was gutted for demo, now it only outputs the debug message
    global $enable_debug_output;
    global $eol;
    if ($enable_debug_output) { print_r(date('H:i:s').' - '.$message.$eol); }
  }
}
