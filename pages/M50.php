<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[11];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/illusion1style.css">
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
				<h3>Illusion (Default Perk Tree)</h3>
				<img src="../images/Illusion.jpg" class="imageposition" width=420 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)<br>
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" tabindex="3" id="perkNum0" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Can cast Novice level Illusion spells for half magicka">Novice Illusion</span>
				</div>

				<div class="perk1">
					2: <input type="checkbox" tabindex="4" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Dual-casting an Illusion spell overcharges the effect and mkaes it even more powerful">Illusion Dual Casting</span>
				</div>

				<div class="perk1">
					3: <input type="checkbox" tabindex="5" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Can cast Apprentice level Illusion spells for half magicka">Apprentice Illusion</span>
				</div>

				<div class="perk1">
					4: <input type="checkbox" tabindex="9" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Can cast Adept level Illusion spells for half magicka">Adept Illusion</span>
				</div>

				<div class="perk1">
					5: <input type="checkbox" tabindex="10" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Can cast Expert level Illusion spells for half magicka">Expert Illusion</span>
				</div>

				<div class="perk1">
					6: <input type="checkbox" tabindex="14" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Can cast Master level Illusion spells for half magicka">Master Illusion</span>
				</div>
				
				<div class="perk1">
					7: <input type="checkbox" tabindex="7" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Calm spells work on higher level creatures: stacks with Animage and Kindred Mage">Hypnotic Gaze</span>
				</div>
			</div>
			<div id="rightpane">
				<div class="perk2">
					8: <input type="checkbox" tabindex="11" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Fear spells work on higher level creatures: stacks with Animage and Kindred Mage">Aspect of Terror</span>
				</div>

				<div class="perk2">
					9: <input type="checkbox" tabindex="12" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Frenzy spells work on higher level creatures: stacks with Animage and Kindred Mage">Rage</span>
				</div>

				<div class="perk1">
					10: <input type="checkbox" tabindex="6" id="perkNum9" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Illusion spells work on higher level creatures">Animage</span>
				</div>

				<div class="perk1">
					11: <input type="checkbox" tabindex="8" id="perkNum10" <?php $p=$_SESSION['perks']; $i=10; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(10)"/> <span title="Illusion spells work on even higher level creatures">Kindred Mage</span>
				</div>

				<div class="perk1">
					12: <input type="checkbox" tabindex="13" id="perkNum11" <?php $p=$_SESSION['perks']; $i=11; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(11)"/> <span title="All spells you cast from any school are silent to others">Quiet Casting</span>
				</div>

				<div class="perk1">
					13: <input type="checkbox" tabindex="15" id="perkNum12" <?php $p=$_SESSION['perks']; $i=12; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(12)"/> <span title="Illusion spells work on undead, daedra and automatons">Master of the Mind</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M50">
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
	
	newPerks[0] = perks[0];	//novice illusion
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//illusion dual-casting
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//apprentice illusion
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//hypnotic gaze
		newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//animage
		if(perks[2] == "1")
		{
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//adept illusion
			if(perks[3] == "1")
			{
				newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//expert illusion
				if(perks[4] == "1")
				{
					newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//master illusion
				}
			}
		}
		if(perks[6] == "1")
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//aspect of terror
			if(perks[7] == "1")
			{
				newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//rage
				if(perks[8] == "1" || perks[11] == "1")
				{
					newPerks[12] = (perks[12] != "-")?perks[12]:"0";	//master of the mind
				}
			}
		}
		if(perks[9] == "1")
		{
			newPerks[10] = (perks[10] != "-")?perks[10]:"0";	//kindred mage
			if(perks[10] == "1")
			{
				newPerks[11] = (perks[11] != "-")?perks[11]:"0";	//quiet casting
				if(perks[8] == "1" || perks[11] == "1")
				{
					newPerks[12] = (perks[12] != "-")?perks[12]:"0";	//master of the mind
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
