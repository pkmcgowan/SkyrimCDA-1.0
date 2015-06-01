<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[17];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/sneak1style.css">
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
			<li><a href="javascript:gotoLastVisitedPage(1)" class="ButtonLeft">Magic</a></li>			
			<li class="BlankButton">Stealth</li>
			<li><a href="javascript:gotoSkillPage(5)" class="ButtonRight">Speech</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">Pickpocket</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Lockpicking</a></li>
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Light Armor</a></li>
			<li><a href="javascript:gotoSkillPage(0)" class="ButtonRight">Alchemy</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			
			<div id="centerpane">
				<h3>Sneak (Default Perk Tree)</h3>
				<img src="../images/Sneak.jpg" class="imageposition" width=420 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)</p>
			</div>
			
			<div id="leftpane">
				<div class="perk2">
					1: <span title="Level 1: You are 20% harder to detect			Level 2: You are 40% harder to detect			Level 3: You are 60% harder to detect			Level 4: You are 80% harder to detect			Level 5: You are 100% harder to detect">Stealth</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Stealth-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Stealth-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Stealth-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Stealth-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Stealth-Level 5</option>
					</select>
				</div>
				<div class="perk1">
					2: <input type="checkbox" tabindex="5" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Sneak attacks with one-handed weapons do 6x normal damage">Backstab</span>
				</div>
				<div class="perk1">
					3: <input type="checkbox" tabindex="7" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Sneak attacks with bows do 3x normal damage">Deadly Aim</span>
				</div>
				<div class="perk1">
					4: <input type="checkbox" tabindex="9" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Sneak attacks with daggers do 15x normal damage">Assassin's Blade</span>
				</div>
				<div class="perk1">
					5: <input type="checkbox" tabindex="4" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Reduces noise made by armor by 50%">Muffled Movement</span>
				</div>			
			</div>
			
			<div id="rightpane">
				<div class="perk3">
					6: <input type="checkbox" tabindex="6" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="You will never trigger pressure plates">Light Foot</span>
				</div>
				<div class="perk1">
					7: <input type="checkbox" tabindex="10" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Sprinting while sneaking will cause you to perform a silent roll">Silent Roll</span>
				</div>
				<div class="perk1">
					8: <input type="checkbox" tabindex="8" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Walking and running do not affect detection while sneaking">Silence</span>
				</div>
				<div class="perk1">
					9: <input type="checkbox" tabindex="11" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Crouching while in combat stops combat for a moment and forces distant enemies to look for another targets">Shadow Warrior</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="S50">
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
	
	newPerks[0] = perks[0];	//first perk in tree; replace this comment with its id
	if(perks[0] != "0")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//backstab
		newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//muffled movement
		if(perks[1] == "1")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//deadly aim
			if(perks[2] == "1")
			{
				newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//assassin's blade
			}
		}
		if(perks[4] == "1")
		{
			newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//light foot
			if(perks[5] == "1")
			{
				newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//silent roll
				if(perks[6] == "1")
				{
					newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//silence
					if(perks[7] == "1")
					{
						newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//shadow warrior
					}
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