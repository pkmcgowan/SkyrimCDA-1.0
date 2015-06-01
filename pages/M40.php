<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[10];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/enchanting1style.css">
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
				<h3>Enchanting (Default Perk Tree)</h3>
				<center><img src="../images/Enchanting.jpg" class="imageposition" width=269 height=420></center>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)</p>
			</div>
			
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Increase the power of enchantments added to weapons and armor						Level 1: enchantments are 20% stronger			Level 2: enchantments are 40% stronger			Level 3: enchantments are 60% stronger			Level 4: enchantments are 80% stronger			Level 5: enchantments are 100% stronger">Enchanter</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Enchanter-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Enchanter-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Enchanter-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Enchanter-Level 5</option>
					</select>
				</div>

				<div class="perk2">
					2: <input type="checkbox" tabindex="6" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Soul gems provide extra magicka for recharging">Soul Squeezer</span>
				</div>

				<div class="perk2">
					3: <input type="checkbox" tabindex="10" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Death blows to creatures (not mortals) use 5% of the target's soul to recharge the weapon">Soul Siphon</span>
				</div>

				<div class="perk2">
					4: <input type="checkbox" tabindex="4" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Fire enchantments on weapons and armor are 25% stronger">Fire Enchanter</span>
				</div>

				<div class="perk2">
					5: <input type="checkbox" tabindex="7" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Frost enchantments on weapons and armor are 25% stronger">Frost Enchanter</span>
				</div>			
			</div>			
			<div id="rightpane">
				<div class="perk3">
					6: <input type="checkbox" tabindex="9" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Shock enchantments on weapons and armor are 25% stronger">Shock Enchanter</span>
				</div>

				<div class="perk2">
					7: <input type="checkbox" tabindex="5" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Skill enchantments are 25% stronger">Insightful Enchanter</span>
				</div>

				<div class="perk2">
					8: <input type="checkbox" tabindex="8" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Health, magicka and stamina enchantments on armor are 25% stronger">Corpus Enchanter</span>
				</div>

				<div class="perk2">
					9: <input type="checkbox" tabindex="11" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Can add two effects to the same item">Extra Effect</span>
				</div>
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M40">
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
	
	newPerks[0] = perks[0];	//enchanter
	if(perks[0] != "0")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//soul squeezer
		newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//fire enchanter
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//insightful enchanter
		if(perks[1] == "1")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//soul siphon
		}
		if(perks[3] == "1")
		{
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//frost enchanter
			if(perks[4] == "1")
			{
				newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//shock enchanter
				if(perks[5] == "1" || perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//extra effect
				}
			}
		}
		if(perks[6] == "1")
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//corpus enchanter
			if(perks[5] == "1" || perks[7] == "1")
			{
				newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//extra effect
			}
		}
	//newPerks[1] = (perks[1] != "-")?perks[1]:"0";	
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