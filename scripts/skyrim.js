<!--Cloak the scripts from browsers that don't support javascript
//initializer function sets up elements common to all pages except config.php and webmaster.php
function initialize()
{
	var pageCode = document.getElementById("pagecode").value;
	var xdata = location.search;
	if(xdata.length > 1) //url has data
	{
		xdata = unescape(xdata.split("?data=")[1]);	//remove the query tag		
	}
	else if(hasCookie() && getCookie() != "new")	//cookie has data
	{
		xdata = getCookie();
	}
	else	//need to create a blank (default) configuration
	{
		xdata = buildDefaultConfig();
	}
	document.getElementById("sitedata").value = xdata; 	
}

//generates a default data string (default perk trees, no perks selected, last visited pages are archery, alteration & alchemy)
function buildDefaultConfig()
{
	var defaultCombat = new Array("C10:9+0--------", "C20:9+0--------", "C30:8+0-------", "C40:10+0---------", "C50:10+0---------", "C60:9+0--------");
	var defaultMagic = new Array("M10:10+0---------", "M20:15+0--------------", "M30:14+0-------------", "M40:9+0--------", "M50:13+0------------", "M60:12+0-----------");
	var defaultStealth = new Array("S10:9+0--------", "S20:6+0-----", "S30:11+0----------", "S40:8+0-------", "S50:9+0--------", "S60:9+0--------");

	var newString = "C10:M10:S10";

	var defaultCombatGroup = "|";
	var defaultMagicGroup = "|";
	var defaultStealthGroup = "|";

	for(var i = 0; i < 6; i++)
	{
		defaultCombatGroup += defaultCombat[i];
		defaultMagicGroup += defaultMagic[i];
		defaultStealthGroup += defaultStealth[i];
		if(i < 5)
		{
			defaultCombatGroup += "|";
			defaultMagicGroup += "|";
			defaultStealthGroup += "|";
		}
	}
	return newString.concat(defaultCombatGroup, defaultMagicGroup, defaultStealthGroup);
}

//cookie processing functions - reference http://www.w3schools.com/js/js_cookies.asp
function getCookie()
{	//retrieves information from a cookie; returns the site-wide data string
	var c_value = document.cookie;
	var c_start = c_value.indexOf(" SkyrimCDA=");
	if(c_start == -1)
	{
		c_start = c_value.indexOf("SkyrimCDA=");
	}
	if(c_start == -1)
	{
		c_value = null;
	}
	else
	{
		c_start = c_value.indexOf("=") + 1;
		c_end = c_value.indexOf(";", c_start);
		if(c_end == -1)
		{
			c_end = c_value.length;
		}
		c_value = unescape(c_value.substring(c_start, c_end));
	}
	return c_value;
}

function hasCookie()
{	//checks to see if a cookie is present; returns 0 or 1 (boolean)
	var result = 0; //false
	var cdaData = getCookie();
	if(cdaData != null && cdaData != "")
	{
		result = 1;
	}
	return result;
}

function setCookie(value, expdays)
{	//defines a new cookie
	var c_value = escape(value);
		
	if(expdays != null)
	{
		var expdate = new Date();
		expdate.setDate(expdate.getDate() + expdays);
		c_value += "; expires="+expdate.toUTCString();
	}
	document.cookie="SkyrimCDA="+c_value;
}

//Data manipulation functions

//converts a group code (character) to its corresponding index
function groupCodeToIndex(code)
{	
	var ucc = code.toUpperCase();
	if(ucc == "C")	//combat group
	{
		index = 0;
	}
	else if(ucc == "M") //magic group
	{
		index = 1;
	}
	else	//stealth group (by default)
	{
		index = 2;
	}
	return index
}

//converts an integer (0-2) into its corresponding character group code
function groupIndexToCode(index)
{	
	var codeList = new Array("C", "M", "S");

	return codelist[index];
}

//refreshes total perks in data set
function refreshTotalPerks()
{
	var xdata = document.getElementById("sitedata").value;
	var groups = xdata.split("|");
	
	var total = 0;
	for(var i = 1; i <= 18; i++)
	{
		var skill = groups[i];
		var perks = skill.split("+")[1];
		total += refreshPagePerks(perks);
	}
	
	return total;
}

//refreshed perks picked for page data
function refreshPagePerks(perks)
{
	//var perks = document.getElementById("currentperks").value
	var total = 0;
	for(var i = 0; i < perks.length; i++)
	{
		var perk = perks[i];
		if(perk != "-")
		{
			total += parseInt(perk, 16);
		}
	}
	return total;
}

//function replaces character in a string at a specified index
function replaceCharacter(source, newChar, index)
{	
	//source = the original string
	//newChar = the replacement character
	//index = the index of the old character
	var result = "";
	var leftString = "";
	var rightString = "";
	var character = newChar[0];	//if newChar more than 1 character long, keep the first character and disregard the rest
	
	if(index < 0 || index >= source.length || character.length == 0)
	{
		result = source; //cannot replace any characters-index out of range or character to replace is empty string, original string returned
	}
	else
	{
		if(index > 0)	//character to replace not at the beginning of the string
		{
			leftString = source.substring(0, index);
		}
		if(index < (source.length - 1)) //character to replace not at the end of the string
		{
			rightString = source.substring(index + 1);
		}
		result = leftString + character + rightString;
	}
	return result; //new string
}

//function resets the perks for a page (and returns the updated skill data)
function clearPagePerks(skill)
{
	var perks = "0-------------------";	//first perk is zero, the rest are disabled and zero
	var result = "";
	var header = skill.split("+")[0];
	var perkCount = header.split(":")[1];
	var perklist = perks.substr(0,perkCount);
	
	result = header + "+" + perklist;
	return result;
}

//function resets perks for all pages
function clearAllPerks(xdata)
{
	
	var groups = xdata.split("|");
	var skill = "";
	var result = groups[0] + "|";
	
	//reset perks by page
	for (var i = 1; i <= 18; i++)
	{
		skill = groups[i];
		result += clearPagePerks(skill);
		if(i < 18)
		{
			result += "|";
		}
	}
	return result;
}

//Skill page event handlers
//resets perks selected for the current page only
function resetPagePerks()
{
	var oldData = document.getElementById("sitedata").value
	var oldSkill = document.getElementById("currentskill").value
	var newSkill = clearPagePerks(oldSkill);	//reset the perks
	
	var newData = oldData.replace(oldSkill, newSkill);	//update the site data
	document.getElementById("currentperks").value = newSkill.split("+")[1];	//new perkset
	document.getElementById("currentskill").value = newSkill;
	document.getElementById("sitedata").value = newData;
	setCookie(newData, 30);	//send new data to the cookie
	postBack();
}

//resets all selected perks across multiple pages
function resetAllPerks()
{
	var oldData = document.getElementById("sitedata").value;
	var newData = clearAllPerks(oldData);
	
	document.getElementById("sitedata").value = newData;
	document.getElementById("totalperks").innerHTML = "0";
	setCookie(newData, 30);	//send new data to the cookie
	postBack();
}

//initializes the skill page
function pageInitialize()
{
	initialize();	//execute core initialization
	var perks = document.getElementById("currentperks").value;
	document.getElementById("pageperks").innerHTML = refreshPagePerks(perks);
	document.getElementById("totalperks").innerHTML = refreshTotalPerks();
}

//handles onchange events for checkboxes (skill pages only)
function checkBoxEvent(index)
{
	var oldPerks = document.getElementById("currentperks").value;
	var ctrlID = "perkNum" + index;
	var state = document.getElementById(ctrlID).checked
	var perk = (state)?"1":"0";
	var newPerks = replaceCharacter(oldPerks, perk, index);
	updateSkillInfo(newPerks);	//this function resides on the local page script block
}

//handles onchange events for comboboxes (skill pages only)
function comboBoxEvent(index)
{
	var oldPerks = document.getElementById("currentperks").value;
	var ctrlID = "perkNum" + index;
	var objList=document.getElementById(ctrlID);
	var idx = objList.selectedIndex;
	var obj = objList.options[idx];
	var perk = obj.getAttribute("value");
	var newPerks = replaceCharacter(oldPerks, perk, index);
	updateSkillInfo(newPerks);	//this function resides on the local page script block
}

//Page navigation functions
//function transforms page code to html path for link buttons
function pageCodeToHTMLfile(code, path)
{		
	//code = three character code for page
	//path = path of html file (./pages or ./)
	var result = path + code + ".php";
	var data = document.getElementById("sitedata").value;
	if(data != "")
	{
		result += "?data=";
		result += data;
		setCookie(data, 30);
	}
	return result;
}

//function updates last visited page codes in buffer 'sitedata' (also updates the cookie)
function updateLastVisitedPageCode(newCode)
{	

	var ucc = newCode.toUpperCase();	//safety: change newCode to upper case
	var oldData = document.getElementById("sitedata").value;
	var newData = "";
	if(ucc != "CFG" && ucc != "W3M")	//check to see if current page is config.html or webmaster.html
	{
		var oldGroupZero = oldData.split("|")[0];	//retrieve section zero from data string		
		if(oldGroupZero.search(ucc) < 0)	//check if new page visited and update old last page code
		{
			var key = groupCodeToIndex(newCode[0]);	//get key (0-2) based on first character of new page code
			var oldCode = oldGroupZero.split(":")[key];	//use key and string.split() to key old page code
			var newGroupZero = oldGroupZero.replace(oldCode, ucc);	//and replace with new one to create new section zero
			newData = oldData.replace(oldGroupZero, newGroupZero);	
		}
		else
		{
			newData = oldData;	//page referenced by newCode has been visited recently: do nothing
		}
	}
	else
	{
		newData = oldData;	//page referenced by newCode is either config.html or webmaster.html: do nothing
	}
	document.getElementById("sitedata").value = newData;	//update new data buffer and backup to old buffer
	setCookie(newData, 30);	//send new data to the cookie
}

//function jumps to last visited skill page based on groupID (0-2)
function gotoLastVisitedPage(groupID)
{	

	var xdata = document.getElementById("sitedata").value;	//get site data
	var pageCode = document.getElementById("pagecode").value;	//get fixed page code
	var GroupZero = xdata.split("|")[0];	//get section zero from site data
	var destination = GroupZero.split(":")[groupID];
	var url = location.href;
	var path = url.substring(0, url.lastIndexOf("/") + 1);
	url = pageCodeToHTMLfile(destination, path);
	window.location.assign(url);
}

//jumps to configuration page (can also be used by config.php for postback operations)
function gotoConfigPage()
{
	var url = location.href;
	var path = url.substring(0, url.lastIndexOf("/") + 1);
	url = pageCodeToHTMLfile("config", path);
	window.location.assign(url);
}

//jumps to page in the current group based on skill index
function gotoSkillPage(skill)
{
	var xdata = document.getElementById("sitedata").value;	//get site data
	var pageCode = document.getElementById("pagecode").value;	//get fixed page code
	var group = groupCodeToIndex(pageCode[0]);
	var skillIdx = (group * 6) + (skill + 1);
		
	//make current page code the last visited page code in section zero before jumping
	var GroupZero = xdata.split("|")[0];	//get section zero from site data
	var lvPageCode = GroupZero.split(":")[group]; //grab the old L.V. code
	var newGroupZero = GroupZero.replace(lvPageCode, pageCode); //create a new section zero
	var newData = xdata.replace(GroupZero, newGroupZero);	//update section zero in data string and store in buffer
	document.getElementById("sitedata").value = newData;
	
	var newSkillSet = newData.split("|")[skillIdx];	//grab the skill set, then the new destination & page perk set
	var destination = newSkillSet.split(":")[0];
	
	var url = location.href;
	var path = url.substring(0, url.lastIndexOf("/") + 1);
	updateLastVisitedPageCode(destination);
	url = pageCodeToHTMLfile(destination, path);
	window.location.assign(url);	
}

//function executes postback for skill pages
function postBack()
{
	var url = location.href;
	var path = url.substring(0, url.lastIndexOf("/") + 1);
	var destination = document.getElementById("pagecode").value;	//get fixed page code
	url = pageCodeToHTMLfile(destination, path);
	//alert(url);
	window.location.assign(url);
}


/*
//stub for local page javascript function updateSkillInfo
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
	//nested if block goes here
	
	//newPerks[1] = (perks[1] != "-")?perks[1]:"0";	
	//end of nested if block
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
*/

/*
quick reference

window.location="./config.html#<data>";
window.location.hash holds data from url # tag
document.getElementById("").innerHTML
document.getElementById("").value

hidden input controls
<input type="hidden" id="sitedata" value="">
<input type="hidden" id="pagecode" value="">
<input type="hidden" id="currentperks" value="<?php echo $_SESSION['perks'];?>">

tebindex stub
 tabindex="" 

control ID stub
 perkNum
 
combobox enabler
 <?php $p=$_SESSION['perks']; if($p[3] == '-'){echo 'disabled';} ?> onchange="comboBoxEvent(3)"

combobox default select:
 <?php $p=$_SESSION['perks']; if($p[3] == '0'){echo 'selected';} ?>
 
checkbox event invocation
 <?php $p=$_SESSION['perks']; if($p[0] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(0)"
 <?php $p=$_SESSION['perks']; $i=5; if($p[$i] == '-'){echo 'disabled';}elseif($p[$i] == '1'){echo 'checked';} ?> onchange="checkBoxEvent(5)"
*/

// decloak the javascript-->