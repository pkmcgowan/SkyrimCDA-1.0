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
<link rel="stylesheet" type="text/css" href="../style/enchanting2style.css">
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
				<h3>Enchanting - A Tragedy In Black (Add-on)</h3>
				<img src="../images/Enchanting.jpg" class="imageposition" width=269 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered),<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will<br>
				(www.papagamer.com) and TheGreyLight(www.steampowered.com)</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Increase the power of enchantments added to weapons and armor						Level 1: enchantments are 20% stronger			Level 2: enchantments are 40% stronger			Level 3: enchantments are 60% stronger			Level 4: enchantments are 80% stronger			Level 5: enchantments are 100% stronger			Level 6: enchantments are 120% stronger			Level 7: enchantments are 140% stronger			Level 8: enchantments are 160% stronger			Level 9: enchantments are 180% stronger			Level 10: enchantments are 3X stronger">Enchanter</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Enchanter-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Enchanter-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Enchanter-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Enchanter-Level 5</option>
						<option value="6" <?php $p=$_SESSION['perks']; if($p[0] == '6'){echo 'selected';} ?>>Enchanter-Level 6</option>
						<option value="7" <?php $p=$_SESSION['perks']; if($p[0] == '7'){echo 'selected';} ?>>Enchanter-Level 7</option>
						<option value="8" <?php $p=$_SESSION['perks']; if($p[0] == '8'){echo 'selected';} ?>>Enchanter-Level 8</option>
						<option value="9" <?php $p=$_SESSION['perks']; if($p[0] == '9'){echo 'selected';} ?>>Enchanter-Level 9</option>
						<option value="A" <?php $p=$_SESSION['perks']; if($p[0] == 'A'){echo 'selected';} ?>>Enchanter-Level 10</option>
					</select>
				</div>

				<div class="perk1">
					2: <span title="Level 1: each soul gem provides extra free petty soul worth of magicka for recharging			Level 2: each soul gem provides extra free lesser soul worth of magicka for recharging			Level 3: each soul gem provides extra free common soul worth of magicka for recharging			Level 4: each soul gem provides extra free greater soul worth of magicka for recharging			Level 5: each soul gem provides extra free grand soul worth of magicka for recharging">Soul Squeezer</span>...<br>
					<select id="perkNum1" tabindex="6" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(1)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[1] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[1] == '1'){echo 'selected';} ?>>Soul Squeezer-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[1] == '2'){echo 'selected';} ?>>Soul Squeezer-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[1] == '3'){echo 'selected';} ?>>Soul Squeezer-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[1] == '4'){echo 'selected';} ?>>Soul Squeezer-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[1] == '5'){echo 'selected';} ?>>Soul Squeezer-Level 5</option>
					</select>
				</div>

				<div class="perk1">
					3: <span title="Level 1: death blows to creatures, but not people, trap 10% of the victim's soul, recharging the weapon	Level 2: death blows to creatures, but not people, trap 20% of the victim's soul, recharging the weapon	Level 3: death blows to creatures and people, trap 30% of the victim's soul, recharging the weapon">Soul Siphon</span>...<br>
					<select id="perkNum2" tabindex="10" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(2)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[2] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[2] == '1'){echo 'selected';} ?>>Soul Siphon-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[2] == '2'){echo 'selected';} ?>>Soul Siphon-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[2] == '3'){echo 'selected';} ?>>Soul Siphon-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					4: <span title="Level 1: fire enchantments on weapons and armor are 25% stronger					Level 2: fire enchantments on weapons and armor are 50% stronger">Fire Enchanter</span>...<br>
					<select id="perkNum3" tabindex="4" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Fire Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Fire Enchanter-Level 2</option>
					</select>
				</div>
				<div class="perk1">
					5: <span title="Level 1: frost enchantments on weapons and armor are 25% stronger					Level 2: frost enchantments on weapons and armor are 50% stronger">Frost Enchanter</span>...<br>
					<select id="perkNum4" tabindex="7" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(4)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[4] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[4] == '1'){echo 'selected';} ?>>Frost Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[4] == '2'){echo 'selected';} ?>>Frost Enchanter-Level 2</option>
					</select>
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk2">
					6: <span title="Level 1: shock enchantments on weapons and armor are 25% stronger					Level 2: shock enchantments on weapons and armor are 50% stronger">Shock Enchanter</span>...<br>
					<select id="perkNum5" tabindex="9" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[5] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(5)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[5] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[5] == '1'){echo 'selected';} ?>>Shock Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[5] == '2'){echo 'selected';} ?>>Shock Enchanter-Level 2</option>
					</select>
				</div>

				<div class="perk2">
					7: <span title="Level 1: skill enchantments on armor are 25% stronger	Level 2: skill enchantments on armor are 50% stronger">Insightful Enchanter</span>...<br>
					<select id="perkNum6" tabindex="5" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(6)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[6] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[6] == '1'){echo 'selected';} ?>>Insightful Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[6] == '2'){echo 'selected';} ?>>Insightful Enchanter-Level 2</option>
					</select>
				</div>

				<div class="perk2">
					8: <span title="level 1: health, magicka, and stamina enchantments on armor are 25% stronger				Level 2: health, magicka, and stamina enchantments on armor are 50% stronger">Corpus Enchanter</span>...<br>
					<select id="perkNum7" tabindex="8" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[7] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(7)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[7] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[7] == '1'){echo 'selected';} ?>>Corpus Enchanter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[7] == '2'){echo 'selected';} ?>>Corpus Enchanter-Level 2</option>
					</select>
				</div>

				<div class="perk2">
					9: <span title="Level 1: can put two enchantments on the same item	Level 2: can put three enchantments on the same item	level 3: can put five enchantments on the same item">Extra Effect</span>...<br>
					<select id="perkNum8" tabindex="11" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[8] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(8)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[8] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[8] == '1'){echo 'selected';} ?>>Extra Effect-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[8] == '2'){echo 'selected';} ?>>Extra Effect-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[8] == '3'){echo 'selected';} ?>>Extra Effect-Level 3</option>
					</select>
				</div>		
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="M41">
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
		
		if(perks[1] != "-" && perks[1] != "0")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//soul siphon
		}
		
		if(perks[3] != "-" && perks[3] != "0")
		{
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//frost enchanter
			if(perks[4] != "-" && perks[4] != "0")
			{
				newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//shock enchanter
				if((perks[7] != "-" && perks[7] != "0") || (perks[5] != "-" && perks[5] != "0"))
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//extra effect
				}
			}
		}
		
		if(perks[6] != "-" && perks[6] != "0")
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//corpus enchanter
			if((perks[7] != "-" && perks[7] != "0") || (perks[5] != "-" && perks[5] != "0"))
			{
				newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//extra effect
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