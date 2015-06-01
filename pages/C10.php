<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[1];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/archery1style.css">
<script src="../scripts/skyrim.js" type="text/javascript"></script>
</head><body onload="pageInitialize()">

<div id="container">
	<div id="header">
		<img src="../images/skyrim1.jpg" width=72 height=72>		
		<h1>The Elder Scrolls V: Skyrim</h1>
		<h2>Character Development Assistant</h2>
		<p class="PerkTotal">Total Perks Chosen...<br>Overall: <span id="totalperks">0</span><br>For This Page: <span id="pageperks">0</span></p>
		
	</div>
	<div id="navigation">
		<ul>
			<li><a href="javascript:gotoConfigPage()" class="ButtonLeft">Configure</a></li>
			<li class="BlankButton">Combat</li>
			<li><a href="javascript:gotoLastVisitedPage(1)" class="ButtonLeft">Magic</a></li>
			<li><a href="javascript:gotoLastVisitedPage(2)" class="ButtonLeft">Stealth</a></li>
			<li><a href="javascript:gotoSkillPage(5)" class="ButtonRight">Two-Handed</a></li>
			<li><a href="javascript:gotoSkillPage(4)" class="ButtonRight">Smithing</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">One-Handed</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Heavy Armor</a></li>
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Block</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="button" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="button" class="resetbutton" tabindex="2" value="Reset Perks" onclick="resetPagePerks()">	
			</div>
			
			<div id="centerpane">
				<h3>Archery (Default Perk Tree)</h3>
				<img src="../images/Archery.jpg" class="imageposition" width=320 height=420>
				<p class="sourcetext" >Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)
				</p>
			</div>
			
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Level 1: increases bow damage by 20%		Level 2: increases bow damage by 40%		Level 3: increases bow damage by 60%		Level 4: increases bow damage by 80%		Level 5: increases bow damage by 100%">Overdraw...<br></span>
					<select id="perkNum0" class="ctrlscheme" tabindex="3" onchange="comboBoxEvent(0)">
					<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
					<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Overdraw-Level 1</option>
					<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Overdraw-Level 2</option>
					<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Overdraw-Level 3</option>
					<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Overdraw-Level 4</option>
					<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Overdraw-Level 5</option>
					</select>
				</div>
				<div class="perk2">
					2: <input type="checkbox" id="perkNum1" tabindex="4" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';}elseif($p[1] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Holding block while an arrow is drawn allows you to zoom in on your target">Eagle Eye</span>
				</div>
				<div class="perk1">
					3: <span title="Level 1: while using eagle eye, time slows by 25%	Level 2: while using eagle eye, time slows by 50%">Steady Hand...<br></span>
					<select id="perkNum2" class="ctrlscheme" tabindex="6" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(2)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[2] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[2] == '1'){echo 'selected';} ?>>Steady Hand-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[2] == '2'){echo 'selected';} ?>>Steady Hand-Level 2</option>
					</select>
				</div>
				<div class="perk2">
					4: <input type="checkbox" id="perkNum3" tabindex="7" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';}elseif($p[3] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Arrows stagger all but the largest opponents 50% of the time">Power Shot</span>
				</div>
				<div class="perk2">
					5: <input type="checkbox" id="perkNum4" tabindex="10" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';}elseif($p[4] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="You can draw a bow 30% faster">Quick Shot</span>
				</div>
				
			</div>
			<div id="rightpane">
				<div class="perk1">
					6: <span title="Level 1: bows have a 10% chance of doing extra critical damage						Level 2: bows have a 15% chance of doing extra critical damage						Level 3: bows have a 20% chance of doing extra critical damage">Critical Shot...<br></span>
					<select id="perkNum5" class="ctrlscheme" tabindex="5" <?php $p=$_SESSION['perks']; if($p[5] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(5)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[5] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[5] == '1'){echo 'selected';} ?>>Critical Shot-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[5] == '2'){echo 'selected';} ?>>Critical Shot-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[5] == '3'){echo 'selected';} ?>>Critical Shot-Level 3</option>
					</select>
				</div>
				<div class="perk2">
					7: <input type="checkbox" id="perkNum6" tabindex="8" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';}elseif($p[6] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Recover twice ans many arrows from targets you kill with a bow">Hunter's Discipline</span>
				</div>
				<div class="perk2">
					8: <input type="checkbox" id="perkNum7" tabindex="9" <?php $p=$_SESSION['perks']; if($p[7] == '-'){echo 'disabled';}elseif($p[7] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Able to move faster with your bow drawn">Ranger</span>
				</div>
				<div class="perk2">
					9: <input type="checkbox" id="perkNum8" tabindex="11" <?php $p=$_SESSION['perks']; if($p[8] == '-'){echo 'disabled';}elseif($p[8] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="15% chance of paralyzing your opponent">Bulls Eye</span>
				</div>	
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="C10">
		</form>
	</div>
	<div id="footer">
		<a href="./webmaster.html" target="blank">Contact the Webmaster</a>
		Copyright © SkyrimCDA 2013
	</div>
</div>
</body>
<script type="text/javascript">
<!-- cloak the javascript from browsers that don't support it

//function updates skill data in the as specified by the provided perkstring
function updateSkillInfo(perkString)
{	
	var newPerks = new Array("0", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");
	var newData = "";
	var oldData = document.getElementById("sitedata").value;
	var oldSkill = document.getElementById("currentskill").value;
	var perks = perkString;
	var newSkill = oldSkill.split("+")[0];
	var perkCount = newSkill.split(":")[1];
	newSkill += "+";
	
	newPerks[0] = perks[0];	//overdraw
	
	if(perks[0] != "0")	//overdraw > 0 (never disabled)
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//eagle eye
		newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//critical shot
		if(perks[1] == "1")	//eagle eye checked
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//steady hand
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//power shot
			if(perks[3] == "1")	//power shot checked
			{
				newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//quick shot
				if((perks[4] == "1") || (perks[7] == "1"))	//criterion to enable bulls eye
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//bulls eye
				}
			}
		}
		if((perks[5] != "0") && (perks[5] != "-"))	//critical shot > 0
		{
			newPerks[5] = perks[5];	//critical shot set in new perkset
			newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//hunter's discipline
			if(perks[6] == "1")
			{
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//ranger
				if((perks[4] == "1") || (perks[7] == "1"))	//criterion to enable bules eye
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//bulls eye
				}

			}
		}
	}
	perks = "";
	
	for(var i = 0; i < perkCount; i++)
	{
		perks += newPerks[i];
	}
	newSkill += perks;
	
	newData = oldData.replace(oldSkill, newSkill);
	document.getElementById("sitedata").value = newData;
	document.getElementById("currentskill").value = newSkill;
	document.getElementById("currentperks").value = perks;
	postBack();
}

//decloak the javascript -->
</script>
</html>