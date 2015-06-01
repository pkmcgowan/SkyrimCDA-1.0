<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[9];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/destruction2style.css">
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
			<li><a href="javascript:gotoLastVisitedPage(0)" class="ButtonLeft">Combat</a></li>
			<li class="BlankButton">Magic</li>
			<li><a href="javascript:gotoLastVisitedPage(2)" class="ButtonLeft">Stealth</a></li>
			<li><a href="javascript:gotoSkillPage(5)" class="ButtonRight">Restoration</a></li>
			<li><a href="javascript:gotoSkillPage(4)" class="ButtonRight">Illusion</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">Enchanting</a></li>
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Conjuration</a></li>
			<li><a href="javascript:gotoSkillPage(0)" class="ButtonRight">Alteration</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			
			<div id="centerpane">
				<h3>Destruction - Yeti's Destruction Tree (Add-on)</h3>
				<center><img src="../images/DestructionYeti.jpg" class="imageposition" width=340 height=420></center>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered),<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will<br>
				(www.papagamer.com)	and YetiHead90(www.steampowered.com)</p>
			</div>
			
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" tabindex="3" id="perkNum0" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Can cast Novice level Destruction spells for half magicka">Novice Destruction</span>
				</div>

				<div class="perk1">
					2: <input type="checkbox" tabindex="4" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Dual-casting a overcharges a Destruction spell and does more damage">Destruction Dual-Casting</span>
				</div>

				<div class="perk1">
					3: <input type="checkbox" tabindex="9" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Most Destruction spells will stagger the target when dual cast">Impact</span>
				</div>

				<div class="perk2">
					4: <span title="Level 1: fire spells do 25% more damage			Level 2: fire spells do 50% more damage			Level 3: fire spells do 75% more damage">Augmented Flames</span>...<br>
					<select id="perkNum3" tabindex="6" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Augmented Flames-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Augmented Flames-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[3] == '3'){echo 'selected';} ?>>Augmented Flames-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					5: <input type="checkbox" tabindex="10" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Targets with less that 20% health will flee from fire damage">Intense Flames</span>
				</div>

				<div class="perk1">
					6: <input type="checkbox" tabindex="13" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Fire spells do more critical strike damage">Explosions</span>
				</div>

				<div class="perk2">
					7: <span title="Level 1: frost spells do 25% more damage		Level 2: frost spells do 50% more damage		Level 3: frost spells do 75% more damage">Augmented Frost</span>...<br>
					<select id="perkNum6" tabindex="7" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(6)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[6] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[6] == '1'){echo 'selected';} ?>>Augmented Frost-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[6] == '2'){echo 'selected';} ?>>Augmented Frost-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[6] == '3'){echo 'selected';} ?>>Augmented Frost-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					8: <input type="checkbox" tabindex="14" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Targets with less than 20% health are paralysed by frost spells">Deep Freeze</span>
				</div>

				<div class="perk1">
					9: <input type="checkbox" tabindex="17" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Frost spells' critical strikes do more damage">Permafrost
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk1">
					10: <input type="checkbox" tabindex="18" id="perkNum9" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Destruction magic does double damage">Elemental Fury</span>
				</div>

				<div class="perk2">
					11: <span title="Level 1: shock spells do 25% more damage		Level 2: shock spells do 50% more damage		Level 3: shock spells do 75% more damage">Augmented Shock</span>...<br>
					<select id="perkNum10" tabindex="8" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[10] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(10)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[10] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[10] == '1'){echo 'selected';} ?>>Augmented Shock-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[10] == '2'){echo 'selected';} ?>>Augmented Shock-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[10] == '3'){echo 'selected';} ?>>Augmented Shock-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					12: <input type="checkbox" tabindex="15" id="perkNum11" <?php $p=$_SESSION['perks']; $i=11; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(11)"/> <span title="Targets with less than 15% health are reduced to ash by shock spells">Disintegrate</span>
				</div>

				<div class="perk1">
					13: <input type="checkbox" tabindex="19" id="perkNum12" <?php $p=$_SESSION['perks']; $i=12; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(12)"/> <span title="Shock spells critical strikes do more damage">Plasma</span>
				</div>

				<div class="perk1">
					14: <input type="checkbox" tabindex="5" id="perkNum13" <?php $p=$_SESSION['perks']; $i=13; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(13)"/> <span title="Can cast Apprentice level Destruction spells for half magicka">Apprentice Destruction</span>
				</div>

				<div class="perk1">
					15: <input type="checkbox" tabindex="12" id="perkNum14" <?php $p=$_SESSION['perks']; $i=14; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(14)"/> <span title="Can place runes five times farther away">Rune Master</span>
				</div>

				<div class="perk1">
					16: <input type="checkbox" tabindex="11" id="perkNum15" <?php $p=$_SESSION['perks']; $i=15; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(15)"/> <span title="Can cast Adept level Destruction spells for half magicka">Adept Destruction</span>
				</div>

				<div class="perk1">
					17: <input type="checkbox" tabindex="16" id="perkNum16" <?php $p=$_SESSION['perks']; $i=16; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(16)"/> <span title="Can cast Expert level Destruction spells for half magicka">Expert Destruction</span>
				</div>

				<div class="perk1">
					18: <input type="checkbox" tabindex="20" id="perkNum17" <?php $p=$_SESSION['perks']; $i=17; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(17)"/> <span title="Can cast Master level Destruction spells for half magicka">Master Destruction</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M31">
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
	
	newPerks[0] = perks[0];	//novice destruction
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//destruction dual-casting
		newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//augmented flames
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//augmented frost
		newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//elemental fury
		newPerks[10] = (perks[10] != "-")?perks[10]:"0";	//augmented shock
		newPerks[13] = (perks[13] != "-")?perks[13]:"0";	//apprentice destruction
		if(perks[1] == "1")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//impact
		}
		if((perks[3] != "0") && (perks[3] != "-"))
		{
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//intense flames
			if(perks[3] == "3")
			{
				newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//explosions
			}
		}
		if((perks[6] != "0") && (perks[6] != "-"))
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//deep freexe
			if(perks[6] == "3")
			{
				newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//permafrost
			}
		}
		if((perks[10] != "0") && (perks[10] != "-"))
		{
			newPerks[11] = (perks[11] != "-")?perks[11]:"0";	//disintegrate
			if(perks[10] == "3")
			{
				newPerks[12] = (perks[12] != "-")?perks[12]:"0";	//plasma
			}
		}
		if(perks[13] == "1")
		{
			newPerks[14] = (perks[14] != "-")?perks[14]:"0";	//rune master
			newPerks[15] = (perks[15] != "-")?perks[15]:"0";	//adept destruction
			if(perks[15] == "1")
			{
				newPerks[16] = (perks[16] != "-")?perks[16]:"0";	//expert destruction
				if(perks[16] == "1")
				{
					newPerks[17] = (perks[17] != "-")?perks[17]:"0";	//master destruction
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