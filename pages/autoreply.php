<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/webmasterstyle.css">
</head><body>

<div id="container">
	<div id="header">
		<img src="../images/skyrim1.jpg" width=72 height=72>		
		<h1>The Elder Scrolls V: Skyrim</h1>
		<h2>Character Development Assistant</h2>		
	</div>
	<div id="content" style="height:574">
		<h3>Webmaster's Feedback Reply</h3>
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			echo '<p> Sender: '.$_POST["usrname"].'</p>';
			echo '<p> Sent From: '.$_POST["email"].'</p>';
			echo '<p> Subject: '.$_POST["subject"].'</p>';
			echo '<p> Comments:<br>'.$_POST["comments"].'</p>';
			echo '<p>';
		
			$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				
				$subject = $_POST["subject"];
				$message = 'To: Webmaster, Skyrim CDA at pmcgowan6198@westfield.ma.edu\r\nFrom: '.$_POST["usrname"].'\r\nRe: '.$_POST["subject"].'\r\n\r\n'.$_POST["comments"];
				$message = wordwrap($message, 70, '\r\n');
				$header = 'From: '.$email;
				if(mail("pmcgowan6198@westfield.ma.edu", $subject, $message, $header))
				{
					echo $_POST["usrname"].', your feedback has been received and your comments will be reviewed. We will take your input into consideration as we update this site with future content.';
				}
				else
				{
					echo '<p> *** ALERT: there seems to be a problem with our mail system - you might want to try this alternative <a href="mailto:pmcgowan6198@westfield.ma.edu">(click here)</a> or e-mail the webmaster directly at pmcgowan6198@westfield.ma.edu</p>';
				}
			}
			else
			{
				echo $_POST["usrname"].', your feedback contains an invalid e-mail address or multiple e-mail addresses. As such, your request cannot be processed as it has been flagged as a possible spamming attack. May we suggest scanning your computer to detect and remove any malware before attemting any future submissions?';
			}
			echo '</p>';
		}
		else
		{
			echo '<br><h3> INVALID REQUEST - NO FEEDBACK SUBMITTED! </h3>';
		}
		?>
	</div>
	<div id="footer">
		<span style="text-align:right;">Copyright © SkyrimCDA 2013</span>
	</div>
</div>
</body>
</html>