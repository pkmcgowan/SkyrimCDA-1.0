<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<link rel="stylesheet" type="text/css" href="../style/configstyle.css">
<script src="../scripts/skyrim.js" type="text/javascript"></script>
<script src="../scripts/jquery-2.0.3.min.js" type="text/javascript"></script>
</head>
<body onload="initConfig()">
<div id="container">
	<div id="header">
		<img src="../images/skyrim1.jpg" width=72 height=72>		
		<h1>The Elder Scrolls V: Skyrim</h1>
		<h2>Character Development Assistant</h2>
		<p style="text-align: right; position: relative; top: -120px; font-size: 14pt;">Total Perks Chosen (Overall): <span id="totalperks">0</span></p>		
	</div>
	<div id="navigation">
		<ul>
			<li class="BlankButton">Configure</li>
			<li><a href="javascript:gotoLastVisitedPage(0)" class="ButtonLeft">Combat</a></li>
			<li><a href="javascript:gotoLastVisitedPage(1)" class="ButtonLeft">Magic</a></li>
			<li><a href="javascript:gotoLastVisitedPage(2)" class="ButtonLeft">Stealth</a></li>
		</ul>
	</div>
	<div id="content">		
		<form>
			<div id="resetblock">
				<input type="button" class="resetbutton" tabindex="1" value="Reset All Perks" onclick="resetAllPerks()">
				<input type="button" class="resetbutton" tabindex="2" value="Default Settings" onclick="resetConfig()">
			</div>
		
			<h3>Configuration Page - Choose Your Custom Perk Trees</h3>
			<div id="leftpane">
				<div class="ctrlContainer">
					Alchemy: <select id="g2s0" class="ctrlscheme" tabindex="3" style="float: right;" onchange="refreshTreeData(2,0)">
						<option value="S10:9" <?php if(strpos($_GET['data'], "S10", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="S11:10" <?php if(strpos($_GET['data'], "S11", 13) > 0){echo 'selected';}?>>De Rerum Dirennis (Add-on)</option>
					</select>
				</div>
				<div class="ctrlContainer">			
					Alteration: <select id="g1s0" disabled class="ctrlscheme" tabindex="4" style="float: right;" onchange="refreshTreeData(1,0)">
						<option value="M10:10">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->
					</select>
				</div>
				<div class="ctrlContainer">
					Archery: <select id="g0s0" disabled class="ctrlscheme" tabindex="5" style="float: right;" onchange="refreshTreeData(0,0)">
						<option value="C10:9">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->
					</select>
				</div>
				<div class="ctrlContainer">
					Block: <select id="g0s1" class="ctrlscheme" tabindex="6" style="float: right;" onchange="refreshTreeData(0,1)">
						<option value="C20:9" <?php if(strpos($_GET['data'], "C20", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="C21:13" <?php if(strpos($_GET['data'], "C21", 13) > 0){echo 'selected';}?>>Offensive Bashing (Add-on)</option>
					</select>
				</div>
				<div class="ctrlContainer">
					Conjuration: <select id="g1s1" class="ctrlscheme" tabindex="7" style="float: right;" onchange="refreshTreeData(1,1)">
						<option value="M20:15" <?php if(strpos($_GET['data'], "M20", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="M21:15" <?php if(strpos($_GET['data'], "M21", 13) > 0){echo 'selected';}?>>Summon More, Summon Well (Add-on)</option>
					</select>
				</div>
				<div class="ctrlContainer">
					Destruction: <select id="g1s2" class="ctrlscheme" tabindex="8" style="float: right;" onchange="refreshTreeData(1,2)">
						<option value="M30:14" <?php if(strpos($_GET['data'], "M30", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="M31:18" <?php if(strpos($_GET['data'], "M31", 13) > 0){echo 'selected';}?>>Yeti's Destruction Tree (Add-on)</option>
					</select>
				</div>
				<div class="ctrlContainer">
					Enchanting: <select id="g1s3" class="ctrlscheme" tabindex="9" style="float: right;" onchange="refreshTreeData(1,3)">
						<option value="M40:9" <?php if(strpos($_GET['data'], "M40", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="M41:9" <?php if(strpos($_GET['data'], "M41", 13) > 0){echo 'selected';}?>>A Tragedy in Black (Add-on)</option>
					</select>
				</div>
				<div class="ctrlContainer">
					Heavy Armor: <select id="g0s2" disabled class="ctrlscheme" tabindex="10" style="float: right;" onchange="refreshTreeData(0,2)">
						<option value="C30:8">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Illusion: <select id="g1s4" disabled class="ctrlscheme" tabindex="11" style="float: right;" onchange="refreshTreeData(1,4)">
						<option value="M50:13">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
			</div>			
			<div id="rightpane">
				<div class="ctrlContainer">
					Light Armor: <select id="g2s1" disabled class="ctrlscheme" tabindex="12" style="float: right;" onchange="refreshTreeData(2,1)">
					<option value="S20:6">Default Perk Tree</option>
					<!-- <option value="?">?</option> -->				
					</select>
				</div>				
				<div class="ctrlContainer">
					Lockpicking: <select id="g2s2" disabled class="ctrlscheme" tabindex="13" style="float: right;" onchange="refreshTreeData(2,2)">
						<option value="S30:11">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					One-Handed: <select id="g0s3" disabled class="ctrlscheme" tabindex="14" style="float: right;" onchange="refreshTreeData(0,3)">
						<option value="C40:10">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Pickpocket: <select id="g2s3" disabled class="ctrlscheme" tabindex="15" style="float: right;" onchange="refreshTreeData(2,3)">
						<option value="S40:8">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Restoration: <select id="g1s6" disabled class="ctrlscheme" tabindex="16" style="float: right;" onchange="refreshTreeData(1,6)">
						<option value="M60:12">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Smithing: <select id="g0s4" class="ctrlscheme" tabindex="17" style="float: right;" onchange="refreshTreeData(0,4)">
						<option value="C50:10" <?php if(strpos($_GET['data'], "C50", 13) > 0){echo 'selected';}?>>Default Perk Tree</option>
						<option value="C51:10" <?php if(strpos($_GET['data'], "C51", 13) > 0){echo 'selected';}?>>TreeBalance Smithing DG (Add-on)</option>				
					</select>
				</div>
				<div class="ctrlContainer">
					Sneak: <select id="g2s4" disabled class="ctrlscheme" tabindex="18" style="float: right;" onchange="refreshTreeData(2,4)">
						<option value="S50:9">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Speech: <select id="g2s5" disabled class="ctrlscheme" tabindex="19" style="float: right;" onchange="refreshTreeData(2,5)">
						<option value="S60:9">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
				<div class="ctrlContainer">
					Two-handed: <select id="g0s5" disabled class="ctrlscheme" tabindex="20" style="float: right;" onchange="refreshTreeData(0,5)">
						<option value="C60:9">Default Perk Tree</option>
						<!-- <option value="?">?</option> -->				
					</select>
				</div>
			</div>
			<input type="hidden" id="sitedata" value="">
			<input type="hidden" id="pagecode" value="CFG">
		</form>
	</div>
	<div id="footer">
		<a href="./webmaster.html" target="blank">Contact the Webmaster</a>
		<span style="text-align:right;">Copyright © SkyrimCDA 2013</span>
	</div>
</div>
</body>
<script type="text/javascript">
<!-- cloak the javascript from browsers that don't support it
function initConfig()
{	//event handler for body.onload
	initialize();	//perform standard page initialization
	document.getElementById("totalperks").innerHTML = refreshTotalPerks();
}
function refreshTreeData(group, skill)
{
	var perks = "0-------------------";	//first perk is zero, the rest are disabled and zero
	var newData = "";
	var newGroupZero = "";
	var id = "g" + group + "s" + skill;
	var objList=document.getElementById(id);
	var idx = objList.selectedIndex;
	var obj = objList.options[idx];
	var skillCode = obj.getAttribute("value");
	var perkCount = skillCode.split(":")[1];
	var newGroup = skillCode + "+" + perks.substr(0, perkCount);
	
	var oldData = document.getElementById("sitedata").value;	//retrieve data from buffer
	var pageCode = skillCode.split(":")[0];	//get pagecode from skill set
	if(oldData.search(pageCode) < 0)	//page code for new skill set not in data buffer
	{
		var oldGroupZero = oldData.split("|")[0];	//get section zero from site data
		var oldGroupZeroElements = oldGroupZero.split(":");	//and split it into into its elements
		var index = (group*6)+skill+1
		var oldGroup = oldData.split("|")[index];	//get old skill group from site data
		var oldSkills = oldGroup.split("+")[0];	//get old skill set
		var oldPageCode = oldSkills.split(":")[0];	//get old page code
		
		if(oldPageCode == oldGroupZeroElements[group])	//old page was the last visited one in the skill group
		{
			oldGroupZeroElements[group] = pageCode;	//set to new page code
		}
		for(var i = 0; i <= 2; i++)	//group zero zero only has 3 elements
		{
			newGroupZero += oldGroupZeroElements[i];
			if(i < 2)	// add ':' separators to all but the last element
			{
				newGroupZero += ":";
			}
		}
		newData = oldData.replace(oldGroupZero, newGroupZero); //update section 0
		oldData = newData;	//and set old data = new
		newData = oldData.replace(oldGroup, newGroup); //update site data with new skill set
		document.getElementById("sitedata").value = newData;
		setCookie(newData, 30);	//then update the cookie
		gotoConfigPage();	//post back to config page
	}
	
}
/*
function ctrlInitialize()
{
	var url = location.href;
	var path = url.substring(0, url.lastIndexOf("/") + 1);
	var destination = "S11";
	url = pageCodeToHTMLfile(destination, path);
	window.location.assign(url);
}
*/
function resetConfig()
{
	document.getElementById("sitedata").value = buildDefaultConfig();
	setCookie(newData, 30);	//send new data to the cookie
	gotoConfigPage();
}


//decloak the javascript -->
</script>
</html>

