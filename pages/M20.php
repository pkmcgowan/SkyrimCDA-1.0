<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[8];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/conjuration1style.css">
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
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Destruction</a></li>
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
				<h3>Conjuration (Default Perk Tree)</h3>
				<img src="../images/Conjuration.jpg" class="imageposition" width=320 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" tabindex="3" id="perkNum0" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Cast Novice level Conjuration spells for half magicka">Novice Conjuration</span>
				</div>

				<div class="perk2">
					2: <input type="checkbox" tabindex="5" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Dual-casting a Conjuration spell increases its duration">Conjuration<br><span style="position: relative; left: 48px">Dual Casting</span></span>
				</div>

				<div class="perk2">
					3: <span title="Level 1: summon atronachs or raise undead twice as far away						Level 2: summon atronachs or raise undead three times as far away">Summoner</span>...<br>
					<select id="perkNum2" tabindex="4" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(2)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[2] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[2] == '1'){echo 'selected';} ?>>Summoner-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[2] == '2'){echo 'selected';} ?>>Summoner-Level 2</option>
					</select>
				</div>

				<div class="perk1">
					4: <input type="checkbox" tabindex="8" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Doubles the duration of summoned atronachs">Atromancy</span>
				</div>

				<div class="perk1">
					5: <input type="checkbox" tabindex="12" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Summoned atronachs are 50% more powerful">Elemental Potency</span>
				</div>

				<div class="perk1">
					6: <input type="checkbox" tabindex="9" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Greater duration for raised undead">Necromancy</span>
				</div>

				<div class="perk1">
					7: <input type="checkbox" tabindex="13" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Raised undead have 100 more health">Dark Souls</span>
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk3">
					8: <input type="checkbox" tabindex="16" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Can have two atronachs or raised undead at the same time">Twin Souls</span>
				</div>

				<div class="perk3">
					9: <input type="checkbox" tabindex="6" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Increases the damage of bound weapons">Mystic Binding</span>
				</div>

				<div class="perk1">
					10: <input type="checkbox" tabindex="10" id="perkNum9" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Bound weapons automatically cast soul trap on strike">Soul Stealer</span>
				</div>

				<div class="perk1">
					11: <input type="checkbox" tabindex="14" id="perkNum10" <?php $p=$_SESSION['perks']; $i=10; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(10)"/> <span title="Bound weapons automatically cast banish or turn undead on strike">Oblivion Binding</span>
				</div>

				<div class="perk2">
					12: <input type="checkbox" tabindex="7" id="perkNum11" <?php $p=$_SESSION['perks']; $i=11; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(11)"/> <span title="Cast Apprentice level Conjuration spells for half magicka">Apprentice<br><span style="position: relative; left: 60px">Conjuration</span></span>
				</div>

				<div class="perk1">
					13: <input type="checkbox" tabindex="11" id="perkNum12" <?php $p=$_SESSION['perks']; $i=12; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(12)"/> <span title="Cast Adept level Conjuration spells for half magicka">Adept Conjuration</span>
				</div>

				<div class="perk1">
					14: <input type="checkbox" tabindex="15" id="perkNum13" <?php $p=$_SESSION['perks']; $i=13; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(13)"/> <span title="Cast Expert level Conjuration spells for half magicka">Expert Conjuration</span>
				</div>

				<div class="perk1">
					15: <input type="checkbox" tabindex="17" id="perkNum14" <?php $p=$_SESSION['perks']; $i=14; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(14)"/> <span title="Cast Master level Conjuration spells for half magicka">Master Conjuration</span>
				</div>
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M20">
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
	
	newPerks[0] = perks[0];	//novice conjuration
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//conjuration dual-casting
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//summoner
		newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//necromancy
		newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//mystic binding
		newPerks[11] = (perks[11] != "-")?perks[11]:"0";	//apprentice conjuration
		if((perks[2] != "0") && (perks[2] != "-"))
		{
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//atromancy
			if(perks[3] == "1")
			{
				newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//elemental potency
				if(perks[4] == "1" || perks[6] == "1")
				{
					newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//twin souls (summon more)
				}
			}
		}
		if(perks[5] == "1")
		{
			newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//dark souls
			if(perks[4] == "1" || perks[6] == "1")
			{
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//twin souls (summon more)
			}

		}
		if(perks[8] == "1")
		{
			newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//soul stealer
			if(perks[9] == "1")
			{
				newPerks[10] = (perks[10] != "-")?perks[10]:"0";	//oblivion binding
			}
		}
		if(perks[11] == "1")
		{
			newPerks[12] = (perks[12] != "-")?perks[12]:"0";	//adept conjuration
			if(perks[12] == "1")
			{
				newPerks[13] = (perks[13] != "-")?perks[13]:"0";	//expert conjuration
				if(perks[13] == "1")
				{
					newPerks[14] = (perks[14] != "-")?perks[14]:"0";	//master conjuration
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