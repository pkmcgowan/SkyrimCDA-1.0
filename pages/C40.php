<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[4];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/onehanded1style.css">
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
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Heavy Armor</a></li>	
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Block</a></li>	
			<li><a href="javascript:gotoSkillPage(0)" class="ButtonRight">Archery</a></li></ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			<div id="centerpane">
				<h3>One-Handed (Default Tree Map)</h3>
				<img src="../images/One-Handed.jpg" class="imageposition" width=296 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Level 1: one-handed weapons do 20% more damage	Level 2: one-handed weapons do 40% more damage	Level 3: one-handed weapons do 60% more damage	Level 4: one-handed weapons do 80% more damage	Level 5: one-handed weapons do 100% more damage">Armsman</span>...<br>
					<select id="perkNum0" class="ctrlscheme" tabindex="3" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Armsman-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Armsman-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Armsman-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Armsman-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Armsman-Level 5</option>
					</select>
				</div>

				<div class="perk1">
					2: <span title="Level 1: attacks with war axes cause extra bleeding damage						Level 2: attacks with war axes cause more bleeding damage						Level 3: attacks with war axes cause even more bleeding damage">Hack and Slash</span>...<br>
					<select id="perkNum1" class="ctrlscheme" tabindex="4" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(1)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[1] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[1] == '1'){echo 'selected';} ?>>Hack and Slash-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[1] == '2'){echo 'selected';} ?>>Hack and Slash-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[1] == '3'){echo 'selected';} ?>>Hack and Slash-Level 3</option>
					</select>
				</div>
				<div class="perk1">
					3: <span title="Level 1: attacks with maces ignore 25% of armor	Level 2: attacks with maces ignore 50% of armor	Level 3: attacks with maces ignore 75% of armor">Bone Breaker</span>...<br>
					<select id="perkNum2" class="ctrlscheme" tabindex="6" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(2)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[2] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[2] == '1'){echo 'selected';} ?>>Bone Breaker-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[2] == '2'){echo 'selected';} ?>>Bone Breaker-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[2] == '3'){echo 'selected';} ?>>Bone Breaker-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					4: <span title="Level 1: attacks with swords have a 10% chance of doing critical damage					Level 2: attacks with swords have a 15% chance of doing critical damage					Level 3: attacks with swords have a 20% chance of doing critical damage">Bladesman</span>...<br>
					<select id="perkNum3" class="ctrlscheme" tabindex="7" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Bladesman-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Bladesman-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[3] == '3'){echo 'selected';} ?>>Bladesman-Level 3</option>
					</select>
				</div>

				<div class="perk1">
					5: <span title="Level 1: dual-wielding attacks are 20% faster		Level 2: dual-wielding attacks are 35% faster">Dual Flurry</span>...<br>
					<select id="perkNum4" class="ctrlscheme" tabindex="8" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(4)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[4] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[4] == '1'){echo 'selected';} ?>>Dual Flurry-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[4] == '2'){echo 'selected';} ?>>Dual Flurry-Level 2</option>
					</select>
				</div>
				
			</div>
			<div id="rightpane">
				<div class="perk2">
					6: <input type="checkbox" id="perkNum5" tabindex="11" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Dual-wielding power attacks do 50% more damage">Dual Savagery</span>
				</div>

				<div class="perk2">
					7: <input type="checkbox" id="perkNum6" tabindex="5" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Power attacks with one-handed weapons cost 25% less Stamina">Fighting Stance</span>
				</div>

				<div class="perk2">
					8: <input type="checkbox" id="perkNum7" tabindex="9" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Standing power attacks do 25% more damage and have a chance to decapitate the target">Savage Strike</span>
				</div>

				<div class="perk2">
					9: <input type="checkbox" id="perkNum8" tabindex="10" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="A sprinting power attack does double critical damage">Critical Strike</span>
				</div>

				<div class="perk3">
					10: <input type="checkbox" id="perkNum9" tabindex="12" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="A backward power attack has a 25% chance of paralyzing the target">Paralyzing Strike</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="C40">
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
	
	newPerks[0] = perks[0];	//armsman
	if(perks[0] != "0")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//hack & slash
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//bonebreaker
		newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//bladesman
		newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//dual flurry
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//fighting stance
		if((perks[4] != "0") && (perks[4] != "-"))
		{
			newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//dual savagery
		}
		if(perks[6] == "1")
		{
			newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//savage strike
			newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//critical strike
			if(perks[7] == "1" || perks[8] == "1")
			{
				newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//paralyzing strike
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