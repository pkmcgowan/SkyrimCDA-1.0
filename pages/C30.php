<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[3];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/heavyarmor1style.css">
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
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">One-Handed</a></li>
			<li><a href="javascript:gotoSkillPage(1)" class="ButtonRight">Block</a></li>
			<li><a href="javascript:gotoSkillPage(0)" class="ButtonRight">Archery</a></li>
		</ul>
	</div>
	<div id="content">
		<form id="main">
			<div id="resetblock">
				<input type="reset" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">	
				<input type="reset" class="resetbutton"	tabindex="2" value="Reset Perks" onclick="resetPagePerks()">
			</div>
			<div id="centerpane">		
				<h3>Heavy Armor (Default Perk Tree)</h3>
				<img src="../images/HeavyArmor.jpg" class="imageposition" width=300 height=400>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)<br>
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <span title="Level 1: increases heavy armor rating by 20%		Level 2: increases heavy armor rating by 40%		Level 3: increases heavy armor rating by 60%		Level 4: increases heavy armor rating by 80%		Level 5: increases heavy armor rating by 100%">Juggernaut</span>...<br>
					<select id="perkNum0" class="ctrlscheme" tabindex="3" onchange="comboBoxEvent(0)">
						<option value="0" <?php $p=$_SESSION['perks']; if($p[0] == '0'){echo 'selected';} ?>>Not Selected</option>
						<option value="1" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'selected';} ?>>Juggernaut-Level 1</option>
						<option value="2" <?php $p=$_SESSION['perks']; if($p[0] == '2'){echo 'selected';} ?>>Juggernaut-Level 2</option>
						<option value="3" <?php $p=$_SESSION['perks']; if($p[0] == '3'){echo 'selected';} ?>>Juggernaut-Level 3</option>
						<option value="4" <?php $p=$_SESSION['perks']; if($p[0] == '4'){echo 'selected';} ?>>Juggernaut-Level 4</option>
						<option value="5" <?php $p=$_SESSION['perks']; if($p[0] == '5'){echo 'selected';} ?>>Juggernaut-Level 5</option>
					</select>
				</div>

				<div class="perk2">
					2: <input type="checkbox" id="perkNum1" tabindex="4" <?php $p=$_SESSION['perks']; if($p[1] == '-'){echo 'disabled';}elseif($p[1] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Unarmed attacks with heavy armor gauntlets do extra damage equal to the gauntlets' armor rating">Fists of Steel</span>
				</div>

				<div class="perk2">
					3: <input type="checkbox" id="perkNum2" tabindex="6" <?php $p=$_SESSION['perks']; if($p[2] == '-'){echo 'disabled';}elseif($p[2] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Take 50% damage while falling while wearing all heavy armor">Cushioned</span>
				</div>

				<div class="perk2">
					4: <input type="checkbox" id="perkNum3" tabindex="9" <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';}elseif($p[3] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Heavy armor doesn't count toward your weight limit and doesn't slow you down">Conditioning</span>
				</div>	
			</div>
			<div id="rightpane">
				<div class="perk2">
					5: <input type="checkbox" id="perkNum4" tabindex="5" <?php $p=$_SESSION['perks']; if($p[4] == '-'){echo 'disabled';}elseif($p[4] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="25% bonus to heavy armor rating if wearing all heavy armor (head, hands, body, feet)">Well Fitted</span>
				</div>

				<div class="perk2">
					6: <input type="checkbox" id="perkNum5" tabindex="7" <?php $p=$_SESSION['perks']; if($p[5] == '-'){echo 'disabled';}elseif($p[5] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Stagger reduced by 50% when wearing only heavy armor">Tower of Strength</span>
				</div>

				<div class="perk2">
					7: <input type="checkbox" id="perkNum6" tabindex="8" <?php $p=$_SESSION['perks']; if($p[6] == '-'){echo 'disabled';}elseif($p[6] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="25% bonus to armor rating if wearing a matched set of heavy armor (all steel, all Orcish, etc.)">Matching Set</span>
				</div>

				<div class="perk2">
					8: <input type="checkbox" id="perkNum7" tabindex="10" <?php $p=$_SESSION['perks']; if($p[7] == '-'){echo 'disabled';}elseif($p[7] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="10% chance to reflect melee damage back to the enemy when wearing all heavy armor (head, hands, body, feet)">Reflect Blows</span>
				</div>			
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="C30">
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
	
	newPerks[0] = perks[0];	//juggernaut
	if(perks[0] != "0")
	{
		newPerks[1]=(perks[1] != "-")?perks[1]:"0";	//fists of steel
		newPerks[4]=(perks[4] != "-")?perks[4]:"0";	//well fitted
		if(perks[1] == "1")
		{
			newPerks[2]=(perks[2] != "-")?perks[2]:"0";	//cushioned
			if(perks[2] == "1")
			{
				newPerks[3]=(perks[3] != "-")?perks[3]:"0";	//conditioning
			}
		}
		if(perks[4] == "1")
		{
			newPerks[5]=(perks[5] != "-")?perks[5]:"0";	//tower of strength
			if(perks[5] == "1")
			{
				newPerks[6]=(perks[6] != "-")?perks[6]:"0";	//matching set
				if(perks[6] == "1")
				{
					newPerks[7]=(perks[7] != "-")?perks[7]:"0";	//reflect blows
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