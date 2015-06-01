<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[13];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/alchemy2style.css">
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
			<li class="BlankButton">Stealth</a></li>
			<li><a href="javascript:gotoSkillPage(5)" class="ButtonRight">Speech</a></li>
			<li><a href="javascript:gotoSkillPage(4)" class="ButtonRight">Sneak</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">Pickpocket</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Lockpicking</a></li>
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Light Armor</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			<div id="centerpane">
				<h3>Alchemy - De Rerum Dirennis (Add-on)</h3>
				<center><img src="../images/AlchemyDeRerumDirennis.jpg" class="imageposition" height=420 width=320 style="position: relative;top: -50px;"></center>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered),<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)<br>
				and STEAM (www.steampowered.com)</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Increase the strength of your potions			Level 1: potions you make are 20% stronger			Level 2: potions you make are 40% stronger			Level 3: potions you make are 60% stronger			Level 4: potions you make are 80% stronger			Level 5: potions you make are 100% stronger			Level 6: potions you make are 120% stronger			Level 7: potions you make are 140% stronger			Level 8: potions you make are 160% stronger			Level 9: potions you make are 180% stronger			Level 10: potions you make are 3x stronger">Alchemist</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Alchemist-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Alchemist-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Alchemist-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Alchemist-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Alchemist-Level 5</option>
						<option value="6" <?php $p=$_SESSION['perks']; if($p[0] == '6'){echo 'selected';} ?>>Alchemist-Level 6</option>
						<option value="7" <?php $p=$_SESSION['perks']; if($p[0] == '7'){echo 'selected';} ?>>Alchemist-Level 7</option>
						<option value="8" <?php $p=$_SESSION['perks']; if($p[0] == '8'){echo 'selected';} ?>>Alchemist-Level 8</option>
						<option value="9" <?php $p=$_SESSION['perks']; if($p[0] == '9'){echo 'selected';} ?>>Alchemist-Level 9</option>
						<option value="A" <?php $p=$_SESSION['perks']; if($p[0] == 'A'){echo 'selected';} ?>>Alchemist-Level 10</option>
					</select>
				</div>
				<div class="perk1">
					2: <span title="Level 1: eating an ingredient reveals the first two effects	Level 2: eating an ingredient reveals the first three effects	Level 3: eating an ingredient reveals all effects">Experimenter</span>...<br>
					<select id="perkNum1" tabindex="5" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(1)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[1] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[1] == '1'){echo 'selected';} ?>>Experimenter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[1] == '2'){echo 'selected';} ?>>Experimenter-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[1] == '3'){echo 'selected';} ?>>Experimenter-Level 3</option>
					</select>
				</div>
				<div class="perk2">
					3: <input type="checkbox" tabindex="8" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"> <span title="Carrying capacity is increased by 100 when carrying potions or poisons">Extra Vials</span>
				</div>
				<div class="perk1">
					4: <span title="Level 1: potions you make that restore health, magicka or stamina are 25% more powerful				Level 2: potions you make that restore health, magicka or stamina are 50% more powerful">Physician</span>...<br>
					<select id="perkNum3" tabindex="4" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Physician-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Physician-Level 2</option>
					</select>
				</div>
				<div class="perk1">
					5: <span title="Level 1: potions with beneficial effects are 25% more powerful						Level 2: potions with beneficial effects are 50% more powerful">Benefactor</span>...<br>
					<select id="perkNum4" tabindex="7" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(4)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[4] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[4] == '1'){echo 'selected';} ?>>Benefactor-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[4] == '2'){echo 'selected';} ?>>Benefactor-Level 2</option>
					</select>
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk3">
					6: <span title="Level 1: you gather two ingredients for every plant you harvest						Level 2: you gather three ingredients for every plant you harvest">Green Thumb</span>...<br>
					<select id="perkNum5" tabindex="" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[5] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(5)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[5] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[5] == '1'){echo 'selected';} ?>>Green Thumb-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[5] == '2'){echo 'selected';} ?>>Green Thumb-Level 2</option>
					</select>
				</div>
				<div class="perk4">
					7: <input type="checkbox" tabindex="10" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"> <span title="You gain 100% resistance to all poisons">Snakeblood</span>
				</div>
				<div class="perk4">
					8: <input type="checkbox" tabindex="11" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"> <span title="Potions have no harmful effects and poisons have no beneficial effects">Purity</span>
				</div>
				<div class="perk3">
					9: <span title="Level 1: poisons you make are 50% more effective	Level 2: poisons you make are 100% more effective">Poisoner</span>...<br>
					<select id="perkNum8" tabindex="6" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[8] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(8)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[8] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[8] == '1'){echo 'selected';} ?>>Poisoner-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[8] == '2'){echo 'selected';} ?>>Poisoner-Level 2</option>
					</select>
				</div>
				<div class="perk1">
					10: <span title="Level 1: poisons applied to weapons last for twice as many hits						Level 2: poisons applied to weapons last for four hits	Level 3: poisons applied to weapons last for eight hits	Level 4: poisons applied to weapons last for twelve hits	Level 5: poisons applied to weapons last for sixteen hits	Level 6: poisons applied to weapons last for twenty hits	Level 7: poisons applied to weapons last for two dozen hits">Concentrated Poison</span>...<br>
					<select id="perkNum9" tabindex="9" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[9] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(9)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[9] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[9] == '1'){echo 'selected';} ?>>Concentrated Poison-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[9] == '2'){echo 'selected';} ?>>Concentrated Poison-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[9] == '3'){echo 'selected';} ?>>Concentrated Poison-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[9] == '4'){echo 'selected';} ?>>Concentrated Poison-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[9] == '5'){echo 'selected';} ?>>Concentrated Poison-Level 5</option>
						<option value="6" <?php $p=$_SESSION['perks']; if($p[9] == '6'){echo 'selected';} ?>>Concentrated Poison-Level 6</option>
						<option value="7" <?php $p=$_SESSION['perks']; if($p[9] == '7'){echo 'selected';} ?>>Concentrated Poison-Level 7</option>
					</select>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="S11">
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
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//experimenter
		newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//physician
		if(perks[1] != "-" && perks[1] != "0")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//extra vials
		}
		if(perks[3] != "-" && perks[3] != "0")
		{
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//benefactor
			newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//poisoner
			if(perks[4] != "-" && perks[4] != "0")
			{
				newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//green thumb
				if(((perks[5] != "-") && (perks[5] != "0")) || ((perks[9] != "-") && (perks[9] != "0")))
				{
					newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//snakeblood
					if(perks[6] == "1")
					{
						newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//purity
					}
				}
			}
			
			if(perks[8] != "-" && perks[8] != "0")
			{
				newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//concentrated poison
				if(((perks[5] != "-") && (perks[5] != "0")) || ((perks[9] != "-") && (perks[9] != "0")))
				{
					newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//snakeblood
					if(perks[6] == "1")
					{
						newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//purity
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
