<?php
	
	if( !preg_match( "/index.php/i", $_SERVER['PHP_SELF'] ) ) { die(); }
	
?>
<div class="box">

	<div class="square title">
		<strong>Home</strong>
	</div>

	<div class="content">
	
		Welcome, <strong><?php echo $user->data['fullUsername']; ?></strong>!
		<br /><br />
		We would like you to note that this staff panel is only <b>temporary</b> for roughly 2 weeks while we code our fantastic new one on Version One! <br><br>This will have no further updates other than severe bug fixes if needed. If you have any questions contact me on Skype:  <b>xanonollie</b>.
	</div>

</div>