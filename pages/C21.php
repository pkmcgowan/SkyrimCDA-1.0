<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[2];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/block2style.css">
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
			<li><a href="javascript:gotoSkillPage(0)" class="ButtonRight">Archery</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">	
			</div>
			<div id="centerpane">
				<h3>Block - Offensive Bash (Add-on)</h3>
				<img src="../images/BlockOffensiveBashing.jpg" class="imageposition" width=420 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered),<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will<br>
				(www.papagamer.com)	and icanisbeme (www.steampowered.com)</p>
			</div>
			<div id="leftpane">
					<div class="perk1">
						1: <span title="Level 1: blocking is 20% more effective		Level 2: blocking is 25% more effective		Level 3: blocking is 30% more effective		Level 4: blocking is 35% more effective		Level 5: blocking is 40% more effective">Shield Wall...<br></span>
						<select id="perkNum0" class="ctrlscheme" tabindex="3" onchange="comboBoxEvent(0)">
							<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
							<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Shield Wall-Level 1</option>
							<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Shield Wall-Level 2</option>
							<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Shield Wall-Level 3</option>
							<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Shield Wall-Level 4</option>
							<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Shield Wall-Level 5</option>
						</select>
					</div>
					<div class="perk2">
						2: <input type="checkbox" id="perkNum1" tabindex="5" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';}elseif($p[1] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Time slows down if you are blocking during an enemy's power attack.">Quick Reflexes</span>
					</div>
					<div class="perk2">
						3: <input type="checkbox" id="perkNum2" tabindex="4" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';}elseif($p[2] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Arrows that hit the shield do no damage.">Deflect Arrows</span>
					</div>
					<div class="perk2">
						4: <input type="checkbox" id="perkNum3" tabindex="11" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';}elseif($p[3] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Blocking with a shield reduces incoming fire, frost, and shock damage by 50%.">Elemental Protection</span>
					</div>
					<div class="perk2">
						5: <input type="checkbox" id="perkNum4" tabindex="12" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';}elseif($p[4] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Able to move faster with a shield raised.">Block Runner</span>
					</div>
					<div class="perk2">
						6: <input type="checkbox" id="perkNum5" tabindex="7" <?php $p=$_SESSION['perks']; if($p[5] == '-'){echo 'disabled';}elseif($p[5] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Able to do a power bash.">Power Bash</span>
					</div>
					<div class="perk2">
						7: <input type="checkbox" id="perkNum6" tabindex="10" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';}elseif($p[6] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Bashing does five times more damage.">Deadly Bash</span>
					</div>
					
			</div>
			<div id="rightpane">
					<div class="perk2">
						8: <input type="checkbox" id="perkNum7" tabindex="14" <?php $p=$_SESSION['perks']; if($p[7] == '-'){echo 'disabled';}elseif($p[7] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Chance to disarm when power bashing.">Disarming Bash</span>
					</div>
					<div class="perk2">
						9: <input type="checkbox" id="perkNum8" tabindex="15" <?php $p=$_SESSION['perks']; if($p[8] == '-'){echo 'disabled';}elseif($p[8] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Sprinting with a shield raised knocks down most targets.">Shield Charge</span>
					</div>
					<div class="perk1">
						10: <span title="Level 1: you have a 30% chance of doing Frost damage to an enemy when bashing.				Level 2: you have a 50% chance of doing Frost damage to an enemy when bashing.				Level 3: you will always do  Frost damage to an enemy when bashing.">Frost Bash...<br></span>
						<select id="perkNum9" class="ctrlscheme" tabindex="8" <?php $p=$_SESSION['perks']; if($p[9] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(9)">
							<option value="0" <?php $p=$_SESSION['perks']; if($p[9] == '0'){echo 'selected';} ?>>Not Selected</option>
							<option value="1" <?php $p=$_SESSION['perks']; if($p[9] == '1'){echo 'selected';} ?>>Frost Bash-Level 1</option>
							<option value="2" <?php $p=$_SESSION['perks']; if($p[9] == '2'){echo 'selected';} ?>>Frost Bash-Level 2</option>
							<option value="3" <?php $p=$_SESSION['perks']; if($p[9] == '3'){echo 'selected';} ?>>Frost Bash-Level 3</option>
						</select>
					</div>
					
					<div class="perk1">
						11: <span title="Level 1: you have a 25% chance of lighting an opponent on fire when bashing.				Level 2: you have a 65% chance of lighting an opponent on fire when bashing.				Level 3: you will always light an enemy on fire when bashing.">Fiery Bash...<br></span>
						<select id="perkNum10" class="ctrlscheme" tabindex="9" <?php $p=$_SESSION['perks']; if($p[10] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(10)">
							<option value="0" <?php $p=$_SESSION['perks']; if($p[10] == '0'){echo 'selected';} ?>>Not Selected</option>
							<option value="1" <?php $p=$_SESSION['perks']; if($p[10] == '1'){echo 'selected';} ?>>Fiery Bash-Level 1</option>
							<option value="2" <?php $p=$_SESSION['perks']; if($p[10] == '2'){echo 'selected';} ?>>Fiery Bash-Level 2</option>
							<option value="3" <?php $p=$_SESSION['perks']; if($p[10] == '3'){echo 'selected';} ?>>Fiery Bash-Level 3</option>
						</select>
					</div>
					<div class="perk1">
						12: <span title="Level 1: you have a 20% chance of absorbing stamina when bashing.					Level 2: you have a 40% chance of absorbing stamina when bashing.					Level 3: you have a 70% chance of absorbing stamina when bashing.">Exhausting Bash...<br></span>
						<select id="perkNum11" class="ctrlscheme" tabindex="6" <?php $p=$_SESSION['perks']; if($p[11] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(11)">
							<option value="0" <?php $p=$_SESSION['perks']; if($p[11] == '0'){echo 'selected';} ?>>Not Selected</option>
							<option value="1" <?php $p=$_SESSION['perks']; if($p[11] == '1'){echo 'selected';} ?>>Exhausting Bash-Level 1</option>
							<option value="2" <?php $p=$_SESSION['perks']; if($p[11] == '2'){echo 'selected';} ?>>Exhausting Bash-Level 2</option>
							<option value="3" <?php $p=$_SESSION['perks']; if($p[11] == '3'){echo 'selected';} ?>>Exhausting Bash-Level 3</option>
						</select>
					</div>
					<div class="perk1">
						13: <span title="Level 1: you have a 20% chance of dealing shock damage to an opponent when bashing.		Level 2: you have a 45% chance of dealing shock damage to an opponent when bashing.		Level 3: you have a 75% chance of dealing shock damage to an opponent when bashing.">Electrocuting Bash...<br></span>
						<select id="perkNum12" class="ctrlscheme" tabindex="13" <?php $p=$_SESSION['perks']; if($p[12] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(12)">
							<option value="0" <?php $p=$_SESSION['perks']; if($p[12] == '0'){echo 'selected';} ?>>Not Selected</option>
							<option value="1" <?php $p=$_SESSION['perks']; if($p[12] == '1'){echo 'selected';} ?>>Electrocuting Bash-Level 1</option>
							<option value="2" <?php $p=$_SESSION['perks']; if($p[12] == '2'){echo 'selected';} ?>>Electrocuting Bash-Level 2</option>
							<option value="3" <?php $p=$_SESSION['perks']; if($p[12] == '3'){echo 'selected';} ?>>Electrocuting Bash-Level 3</option>
						</select>
					</div>
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="C21">
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

//skill information updater function (unique to this page)
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
	
	newPerks[0] = perks[0];	//shield wall
	//nested if block goes here
	if(perks[0] != 0)
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//quick reflexes
		newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//frost bash*
		newPerks[10] = (perks[10] != "-")?perks[10]:"0";	//fiery bash*
		newPerks[11] = (perks[11] != "-")?perks[11]:"0";	//exhausting bash*
		newPerks[12] = (perks[12] != "-")?perks[12]:"0";	//electrocuting bash*
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//deflect arrows
		newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//power bash
		if(perks[2] == "1")
		{
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//elemental protection
			if(perks[3] == "1")
			{
				newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//block runner
				if(perks[4] == "1" || perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//shield charge
				}

			}
		}//end if
		if(perks[5] == "1")
		{
			newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//deadly bash
			if(perks[6] == "1")
			{
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//disarming bash
				if(perks[4] == "1" || perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//shield charge
				}

			}
		}//end if
	}//end if
	//end of nested if block
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