<?php 
	function authenticate($user,$password)
	{
		$ldap_host = "ADCTR.lab-brk.dz";
		$ldap_dn= "DC=lab-brk,DC=dz";
		$ldap_usr_dom = '@lab-brk.dz';
		$ldap = ldap_connect($ldap_host );

		ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
		ldap_set_option($ldap,LDAP_OPT_REFERRALS,0);


		if($bind = @ldap_bind($ldap , $user.$ldap_usr_dom , $password))
        {
	        return true;
        }
        else
        {
            return false;
        }
	}

	