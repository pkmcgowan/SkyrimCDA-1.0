<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[7];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/alteration1style.css">
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
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Conjuration</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			
			<div id="centerpane">
				<h3>Alteration (Default Perk Tree)</h3>
				<img src="../images/Alteration.jpg" class="imageposition" width=400 height=440>		
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" id="perkNum0" tabindex="3" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Cast Novice level Alteration spells for half magicka"> Novice Alteration</span>
				</div>

				<div class="perk1">
					2: <input type="checkbox" id="perkNum1" tabindex="4" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/><span title="Dual casting an Alteration spell overcharges the effects into an even more powerful version"> Alteration Dual Casting</span>
				</div>

				<div class="perk1">
					3: <input type="checkbox" id="perkNum2" tabindex="5" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/><span title="Cast Apprentice level Alteration spells for half magicka"> Apprentice Alteration</span>
				</div>

				<div class="perk2">
					4: <span title="Protection spells like Stoneflesh are stronger if not wearing armor					Level 1: Protection spells are twice as strong		Level 2: Protection spells are 2.5x as strong		Level 3: Protection spells are 3x as strong">Mage Armor</span>...<br>
					<select id="perkNum3" class="ctrlscheme" tabindex="6" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Mage Armor-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Mage Armor-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[3] == '3'){echo 'selected';} ?>>Mage Armor-Level 3</option>
					</select>
				</div>

				<div class="perk2">
					5: <span title="Level 1: Block 10% of a spell's effects		Level 2: Block 20% of a spell's effects		Level 3: Block 30% of a spell's effects">Magic Resistance</span>...<br>
					<select id="perkNum4" class="ctrlscheme" tabindex="8" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(4)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[4] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[4] == '1'){echo 'selected';} ?>>Magic Resistance-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[4] == '2'){echo 'selected';} ?>>Magic Resistance-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[4] == '3'){echo 'selected';} ?>>Magic Resistance-Level 3</option>
					</select>
				</div>
			</div>
			<div id="rightpane">
				<div class="perk3">
					6: <input type="checkbox" id="perkNum5" tabindex="7" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Cast Adept level Alteration spells for half magicka">Adept Alteration</span>
				</div>

				<div class="perk3">
					7: <input type="checkbox" id="perkNum6" tabindex="8" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Alteration spells have 50% greater duration">Stability</span>
				</div>

				<div class="perk3">
					8: <input type="checkbox" id="perkNum7" tabindex="9" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Cast Expert level Alteration spells for half magicka">Expert Alteration</span>
				</div>

				<div class="perk3">
					9: <input type="checkbox" id="perkNum8" tabindex="10" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Absorb 30% of the magicka of any spells that hit you">Atronach</span>
				</div>

				<div class="perk1">
					10: <input type="checkbox" id="perkNum9" tabindex="11" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Cast Master level Alteration spells for half magicka">Master Alteration</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M10">
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
	
	newPerks[0] = perks[0];	//novice alteration
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//alteration dual-casting
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//apprentice alteration
		if(perks[2] == "1")
		{
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//mage armor
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//magic resistance
			newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//adept alteration
			if(perks[5] == "1")
			{
				newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//stability
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//expert
				if(perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//atronach
					newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//master
				}
			}
		}
	}	
	//newPerks[1] = (perks[1] != "-")?perks[1]:"0";	
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