<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[12];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/restoration1style.css">
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
			<li><a href="javascript:gotoSkillPage(4)" class="ButtonRight">Illusion</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">Enchanting</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Destruction</a></li>
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
				<h3>Restoration (Default Perk Tree)</h3>
				<center><img src="../images/Restoration.jpg" width=535 height=420 style="position: relative;top: -50px;"></center>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)<br>
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" tabindex="3" id="perkNum0" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Can cast Novice level spells for half magicka">Novice Restoration</span>
				</div>

				<div class="perk2">
					2: <input type="checkbox" tabindex="4" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Dual-casting a Restoration spell overcharges the effect">Restoration<br><span style="position: relative; left: 48px">Dual Casting</span></span>
				</div>

				<div class="perk1">
					3: <input type="checkbox" tabindex="5" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Healing spells also restore stamina">Respite</span>
				</div>

				<div class="perk1">
					4: <input type="checkbox" tabindex="6" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Healing spells heal 50% more">Regeneration</span>
				</div>

				<div class="perk1">
					5: <input type="checkbox" tabindex="9" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Spells are more effective against teh undead">Necromage</span>
				</div>

				<div class="perk1">
					6: <input type="checkbox" tabindex="10" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Wards absorb magicka from spells that hit them">Ward Absorb</span>
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk4">
					7: <span title="Level 1: magicka regenerates 25% faster		Level 2: magicka regenerates 50% faster">Recovery</span>...<br>
					<select id="perkNum6" tabindex="8" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(6)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[6] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[6] == '1'){echo 'selected';} ?>>Recovery-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[6] == '2'){echo 'selected';} ?>>Recovery-Level 2</option>
					</select>
				</div>

				<div class="perk3">
					8: <input type="checkbox" tabindex="12" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Can heal yourself for 250 health once per day if you're at 10% health (and the last blow received wasn't fatal)">Avoid Death</span>
				</div>

				<div class="perk3">
					9: <input type="checkbox" tabindex="7" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Can cast Apprentice level spells for half magicka">Apprentice<br><span style="position: relative; left: 48px">Restoration</span></span>
				</div><br>

				<div class="perk1">
					10: <input type="checkbox" tabindex="11" id="perkNum9" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Can cast Adept level spells for half magicka">Adept Restoration</span>
				</div>

				<div class="perk1">
					11: <input type="checkbox" tabindex="13" id="perkNum10" <?php $p=$_SESSION['perks']; $i=10; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(10)"/> <span title="Can cast Expert level spells for half magicka">Expert Restoration</span>
				</div>

				<div class="perk1">
					12: <input type="checkbox" tabindex="14" id="perkNum11" <?php $p=$_SESSION['perks']; $i=11; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(11)"/> <span title="Can cast Master level spells for half magicka">Master Restoration</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M60">
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
	
	newPerks[0] = perks[0];	//novice restoration
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//restoration dual-casting
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//respite
		newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//regeneration
		newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//ward absorb
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//recovery
		newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//apprentice restoration
		if(perks[3] == "1")
		{
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//necromage
		}
		if((perks[6] != "0") && (perks[6] != "-"))
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//avoid death
		}
		if(perks[8] == "1")
		{
			newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//adept restoration
			if(perks[9] == "1")
			{
				newPerks[10] = (perks[10] != "-")?perks[10]:"0";	//expert restoration
				if(perks[10] == "1")
				{
					newPerks[11] = (perks[11] != "-")?perks[11]:"0";	//master restoration
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
