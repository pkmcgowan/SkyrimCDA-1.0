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
<link rel="stylesheet" type="text/css" href="../style/alchemy1style.css">
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
				<h3>Alchemy (Default Perk Tree)</h3>
				<center><img src="../images/AlchemyVanilla.jpg" class="imageposition" height=420 width=320></center>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Increase the strength of your potions			Level 1: potions you make are 20% stronger			Level 2: potions you make are 40% stronger			Level 3: potions you make are 60% stronger			Level 4: potions you make are 80% stronger			Level 5: potions you make are 2x stronger">Alchemist</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Alchemist-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Alchemist-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Alchemist-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Alchemist-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Alchemist-Level 5</option>
					</select>
				</div>
				<div class="perk2">
					2: <input type="checkbox" tabindex="4" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Potions you make that restore health, magicka or stamina are 25% more powerful">Physician</span>
				</div>
				<div class="perk2">
					3: <input type="checkbox" tabindex="6" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"> <span title="Potions with beneficial effects are 25% more powerful">Benefactor</span>
				</div>
				<div class="perk1">
					4: <span title="Level 1: eating an ingredient reveals the first two effects	Level 2: eating an ingredient reveals the first three effects	Level 3: eating an ingredient reveals all effects">Experimenter</span>...<br>
					<select id="perkNum3" tabindex="8" class="ctrlscheme" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[3] == '1'){echo 'selected';} ?>>Experimenter-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[3] == '2'){echo 'selected';} ?>>Experimenter-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[3] == '3'){echo 'selected';} ?>>Experimenter-Level 3</option>
					</select>
				</div>
			</div>
			<div id="rightpane">
				<div class="perk2">
					5: <input type="checkbox" tabindex="10" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"> <span title="You gain 50% resistance to poison">Snakeblood</span>
				</div>
				<div class="perk2">
					6: <input type="checkbox" tabindex="11" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"> <span title="Potions have no harmful effects and poisons have no beneficial effects">Purity</span>
				</div>
				<div class="perk2">
					7: <input type="checkbox" tabindex="5" id="perkNum6" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"> <span title="Poisons you make are 25% more effective">Poisoner</span>
				</div>
				<div class="perk2">
					8: <input type="checkbox" tabindex="7" id="perkNum7" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"> <span title="Poisons applied to weapons last for twice as many hits">Concentrated Poison</span>
				</div>
				<div class="perk2">
					9: <input type="checkbox" tabindex="9" id="perkNum8" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"> <span title="You gather two ingredients for every plant you harvest">Green Thumb</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="S10">
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
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//physician
		if(perks[1] == "1")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//benefactor
			newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//poisoner
			if(perks[2] == "1")
			{
				newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//experimenter
				if(perks[7] == "1" || ((perks[3] != "-") && (perks[3] != "0")))
				{
					newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//snakeblood
					if(perks[4] == "1")
					{
						newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//purity
					}
				}
			}
			if(perks[6] == "1")
			{
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//concentrated poison
				if(perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//green thumb
				}
				if(perks[7] == "1" || ((perks[3] != "-") && (perks[3] != "0")))
				{
					newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//snakeblood
					if(perks[4] == "1")
					{
						newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//purity
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