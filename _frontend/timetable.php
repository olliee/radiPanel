<?php
	require_once("../_inc/glob.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

	<head>

		<title>radiPanel Timetable</title>

		<style type="text/css" media="screen">
			
			body {
				background: url(//habboglobeforum.net/themes/launch/bg.png);
				padding: 0;
				margin: 0;
			
			}
	
			body, td {
			
				font-family: Verdana, Tahoma, Arial;
				font-size: 11px;
				color: rgb(153,153,153)!important;
				text-align: center;
			
			}
	
			td, table {
			
				border: 1px #ddd solid;
				background: #eee;
				
			
			}
			table {
			border-radius: 3px;
			}
	
			td.bg {
			
				background: #DADFE1;
				font-weight: bold;
			
			}
	
			.wrapper {
			
				width: 800px;
				margin: auto;
				padding: 5px;
				margin-top: 15px;
			
			}
			
			.bad {
    color: #FFF;
    padding: 5px;
    background: url(../../newshiz/assets/images/stripe.png), rgb(236, 96, 96);
    border-radius: 3px;
    text-align: center;
    height: auto;
    border: 1px solid rgb(236, 96, 96);
    box-shadow: 0 2px 0 0 #e0e0e0;
    width: 790px;
    margin: 10px auto;
}
			
		</style>

	</head>

	<body>
	
		<div class="bad">Notice: This timetable is in GMT only! Please convert accordingly.</div>
	
		<div class="wrapper">
	
			
	
			<table width="100%" cellpadding="3" cellspacing="0">
				
				<tr>
				
					<td width="12.5%" class="bg"></td>
					
					<td width="12.5%" class="bg">
						Monday
					</td>
				
					<td width="12.5%" class="bg">
						Tuesday
					</td>

					<td width="12.5%" class="bg">
						Wednesday
					</td>

					<td width="12.5%" class="bg">
						Thursday
					</td>

					<td width="12.5%" class="bg">
						Friday
					</td>

					<td width="12.5%" class="bg">
						Saturday
					</td>

					<td width="12.5%" class="bg">
						Sunday
					</td>

				</tr>
				
				<?php
	
					for( $i = 0; $i <= 23; $i++ ) {
						
						$k = $i;
						
						if( $i < 12 ) {
	
							$time = "{$i}am";
	
						}
						else {
	
							$time = "{$i}pm";
	
						}

						if( $k < 12 ) {

							$time2 = "{$k}am";

						}
						elseif( $k == 24 ) {
							
							$time2 = "12am";
							
						}
						else {

							$time2 = "{$k}pm";

						}
						
						if($k == 0 || $i == 0)
						{
							$time = "12am";
							$time2 = "12am";
						}

						echo "<tr>";
	
						echo "<td width=\"12.5%\" class=\"bg\">";
						
						$times12 = -1;
						
						if($time2 >= 12){
						
						if($time2 != 12){
						$time2 = $time2 - 12;
						
						echo $time2 . "pm";
						} else {
						echo $time2;
						}
					

						} else {
						
						echo $time2 ;
						}
						
						echo "</td>";
	
						for( $j = 1; $j <= 7; $j++ ) {
	
							$query = $db->query( "SELECT * FROM timetable WHERE day = '{$j}' AND time = '{$i}'" );
							$array = $db->assoc( $query );
	
							$query2 = $db->query( "SELECT * FROM users WHERE id = '{$array['dj']}'" );
							$array2 = $db->assoc( $query2 );
							
							$query3 = $db->query( "SELECT * FROM usergroups WHERE id = '{$array2['displaygroup']}'" );
							$array3 = $db->assoc( $query3 );
	
							echo "<td width=\"12.5%\" align=\"center\">";
	
							echo $array2['username'] ? '<span style="color: #'.$array3['colour'].'; font-weight: bold;">' . $array2['username'] . '</span>' : '';
	
							echo "</td>";
	
						}
	
						echo "</tr>";
	
					}
	
				?>
	
			</table>
	
		</div>
	
	</body>

</html>