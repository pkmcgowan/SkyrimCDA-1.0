<?php
session_start();
$xdata = $_SERVER['QUERY_STRING'];
$groups = explode("|", $xdata);
$cgroup = $groups[5];
$cdata = explode("+", $cgroup);
$cperks = $cdata[1];
$_SESSION['perks'] = $cperks;
$_SESSION['skill'] = $cgroup;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/smithing1style.css">
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
			<li><a href="javascript:gotoSkillPage(3)" class="ButtonRight">One-Handed</a></li>
			<li><a href="javascript:gotoSkillPage(2)" class="ButtonRight">Heavy Armor</a></li>
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
				<h3>Smithing (Default Tree Map)</h3>
				<img src="../images/SmithingVanilla.jpg" class="imageposition" width=560 height=320>
				<p class="sourcetext">Sources: Skyrim game screenshot (altered) and<br>
				Papagamer's Unofficial Skyrim Strategy Guide by Barry Scott Will (www.papagamer.com)
				</p>
			</div>
			<div id="leftpane">
				<div class="perk1">
					1: <input type="checkbox" id="perkNum0" tabindex="3" <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"/> <span title="Create steel armor and weapons and improve them twice as much">Steel Smithing</span>
				</div>
				<div class="perk1">
					2: <input type="checkbox" id="perkNum1" tabindex="5" <?php $p=$_SESSION['perks']; $i=1; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(1)"/> <span title="Can improve magical weapons and armor">Arcane Smithing</span>
				</div>
				<div class="perk1">
					3: <input type="checkbox" id="perkNum2" tabindex="6" <?php $p=$_SESSION['perks']; $i=2; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(2)"/> <span title="Create Dwarven armor and weapons and improve them twice as much">Dwarven Smithing</span>
				</div>
				<div class="perk1">
					4: <input type="checkbox" id="perkNum3" tabindex="7" <?php $p=$_SESSION['perks']; $i=3; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(3)"/> <span title="Create Orcish armor and weapons and improve them twice as much">Orcish Smithing</span>
				</div>
				<div class="perk1">
					5: <input type="checkbox" id="perkNum4" tabindex="8" <?php $p=$_SESSION['perks']; $i=4; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(4)"/> <span title="Create ebony armor and weapons and improve them twice as much">Ebony Smithing</span>
				</div>			
			</div>
			<div id="rightpane">
				<div class="perk2">
					6: <input type="checkbox" id="perkNum5" tabindex="11" <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"/> <span title="Create Deadric armor and weapons and improve them twice as much">Daedric Smithing</span>
				</div>
				<div class="perk3">
					7: <input type="checkbox" id="perkNum6" tabindex="4" <?php $p=$_SESSION['perks']; $i=6; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(6)"/> <span title="Create Elven armor and weapons and improve them twice as much">Elven Smithing</span>
				</div>
				<div class="perk3">
					8: <input type="checkbox" id="perkNum7" tabindex="9" <?php $p=$_SESSION['perks']; $i=7; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(7)"/> <span title="Create steel plate and scale armor and improve them twice as much">Advanced Armors</span>
				</div>
				<div class="perk3">
					9: <input type="checkbox" id="perkNum8" tabindex="10" <?php $p=$_SESSION['perks']; $i=8; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(8)"/> <span title="Create glass armor and weapons and improve them twice as much">Glass Smithing</span>
				</div>
				<div class="perk1">
					10: <input type="checkbox" id="perkNum9" tabindex="12" <?php $p=$_SESSION['perks']; $i=9; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(9)"/> <span title="Create dragon armor and weapons and improve them twice as much">Dragon Armor</span>
				</div>		
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="currentskill" value="<?php echo $_SESSION['skill'];?>">
			<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">
			<input type="hidden" id="pagecode" value="C50">
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
	
	newPerks[0] = perks[0];	//steel smithing
	
	if(perks[0] == "1")
	{
		newPerks[1] = (perks[1] != "-")?perks[1]:"0";	//arcane smithing
		newPerks[2] = (perks[2] != "-")?perks[2]:"0";	//Dwarven smithing
		newPerks[6] = (perks[6] != "-")?perks[6]:"0";	//Elven smithing
		if(perks[2] == "1")
		{
			newPerks[3] = (perks[3] != "-")?perks[3]:"0";	//Orcish smithing
			if(perks[3] == "1")
			{
				newPerks[4] = (perks[4] != "-")?perks[4]:"0";	//ebony smithing
				if(perks[4] == "1")
				{
					newPerks[5] = (perks[5] != "-")?perks[5]:"0";	//Daedric smithing
					if(perks[5] == "1" || perks[8] == "1")
					{
						newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//dragon armor
					}
				}
			}
			if(perks[6] == "1")
			{
				newPerks[7] = (perks[7] != "-")?perks[7]:"0";	//advanced armors
				if(perks[7] == "1")
				{
					newPerks[8] = (perks[8] != "-")?perks[8]:"0";	//glass armor
					if(perks[5] == "1" || perks[8] == "1")
					{
						newPerks[9] = (perks[9] != "-")?perks[9]:"0";	//dragon armor
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