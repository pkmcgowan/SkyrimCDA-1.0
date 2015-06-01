<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[14];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/lightarmor1style.css">
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
			<li><a href="javascript:gotoSkillPage(4)" class="ButtonRight">Sneak</a></li>
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">Pickpocket</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Lockpicking</a></li>
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
				<h3>Light Armor (Default Perk Tree)</h3>
				<img src="../images/Light Armor.jpg" class="imageposition" width=371 height=420>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Level 1: light armor rating is increased by 20%	Level 2: light armor rating is increased by 40%	Level 3: light armor rating is increased by 60%	Level 4: light armor rating is increased by 80%	Level 5: light armor rating is increased by 100%">Agile Defender</span>...<br>
					<select id="perkNum0" tabindex="3" class="ctrlscheme" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Agile Defender-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Agile Defender-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Agile Defender-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Agile Defender-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Agile Defender-Level 5</option>
					</select>
				</div>
				<div class="perk2">
					2: <input type="checkbox" tabindex="5" id="perkNum1" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="25% armor rating bonus if wearing all light armor">Custom Fit</span>
				</div>
				<div class="perk2">
					3: <input type="checkbox" tabindex="3" id="perkNum2" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="When equipped, light armor weighs nothing and doesn't slow you down">Unhindered</span>
				</div>
				<div class="perk2">
					4: <input type="checkbox" tabindex="5" id="perkNum3" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Stamina regeneration increases 50% when wearing all light armor">Wind Walker</span>
				</div>
				<div class="perk2">
					5: <input type="checkbox" tabindex="4" id="perkNum4" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="25% armor rating bonus when wearing a full set of the same type of light armor">Matching Set</span>
				</div>
				<div class="perk2">
					6: <input type="checkbox" tabindex="6" id="perkNum5" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="10% chance of avoiding all melee damage when wearing all light armor">Deft Movement</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="S20">
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
	
	newPerks[0] = perks[0];	//agile defender
	if(perks[0] != "0")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//custom fit
		if(perks[1] == "1")
		{
			newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//unhindered
			newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//matching set
			if(perks[2] == "1")
			{
				newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//wind walker
				if(perks[3] == "1" || perks[4] == "1")
				{
					newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//deft movement
				}
			}
			if(perks[4] == "1")
			{
				if(perks[3] == "1" || perks[4] == "1")
				{
					newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//deft movement
				}
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