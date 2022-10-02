var navHomeD = document.querySelector('#navHomeD');
var navAboutD = document.querySelector('#navAboutD');
var navConstructorD = document.querySelector('#navConstructorD');
var navContactsD = document.querySelector('#navContactsD');
var navHomeM = document.querySelector('#navHomeM');
var navAboutM = document.querySelector('#navAboutM');
var navConstructorM = document.querySelector('#navConstructorM');
var navContactsM = document.querySelector('#navContactsM');
navHomeD.addEventListener('click', redirectHome);
navHomeM.addEventListener('click', redirectHome);
navAboutD.addEventListener('click', redirectAbout);
navAboutM.addEventListener('click', redirectAbout);
navConstructorD.addEventListener('click', redirectConstructor);
navConstructorM.addEventListener('click', redirectConstructor);
navContactsD.addEventListener('click', redirectContacts);
navContactsM.addEventListener('click', redirectContacts);

function redirectHome()
{
	location.href = "../home/index.html";
}
function redirectAbout()
{
	location.href = "../about/index.html";
}
function redirectConstructor()
{
	location.href = "../constructor/index.html";
}
function redirectContacts()
{
	location.href = "../contacts/index.html";
}

var navBtn = document.querySelector('#navBtn');
var navM = document.querySelector('#navM');
navBtn.addEventListener('click', navMclick);

function navMclick() 
{
	if (navM.id == "navM")
		navM.id = "navMclick";
	else
		navM.id = "navM";
}

var material = "S";
var gem = "N";
var flexSM = document.querySelector('#flexSCM');
var flexGM = document.querySelector('#flexGM');
var flexPM = document.querySelector('#flexPM');
var silvM = document.querySelector('#silvMC');
var goldM = document.querySelector('#goldM');
var platM = document.querySelector('#platM');
var noneM = document.querySelector('#noneMC');
var rubyM = document.querySelector('#rubyM');
var diamM = document.querySelector('#diamM');
var ruby1M = document.querySelector('#ruby1M');
var ruby2M = document.querySelector('#ruby2M');
var ruby3M = document.querySelector('#ruby3M');
var diam1M = document.querySelector('#diam1M');
var diam2M = document.querySelector('#diam2M');
var diam3M = document.querySelector('#diam3M');
silvM.addEventListener('click', silvMclick);
goldM.addEventListener('click', goldMclick);
platM.addEventListener('click', platMclick);
noneM.addEventListener('click', noneMclick);
rubyM.addEventListener('click', rubyMclick);
diamM.addEventListener('click', diamMclick);

function silvMclick()
{
	material = "S";
	silvM.id = "silvMC";
	goldM.id = "goldM";
	platM.id = "platM";
	flexSM.id = "flexSCM";
	flexGM.id = "flexGM";
	flexPM.id = "flexPM";
	silvD.id = "silvDC";
	goldD.id = "goldD";
	platD.id = "platD";
	flexSD.id = "flexSCD";
	flexGD.id = "flexGD";
	flexPD.id = "flexPD";
}

function goldMclick()
{
	material = "G";
	silvM.id = "silvM";
	goldM.id = "goldMC";
	platM.id = "platM";
	flexSM.id = "flexSM";
	flexGM.id = "flexGCM";
	flexPM.id = "flexPM";
	silvD.id = "silvD";
	goldD.id = "goldDC";
	platD.id = "platD";
	flexSD.id = "flexSD";
	flexGD.id = "flexGCD";
	flexPD.id = "flexPD";
}

function platMclick()
{
	material = "P";
	silvM.id = "silvM";
	goldM.id = "goldM";
	platM.id = "platMC";
	flexSM.id = "flexSM";
	flexGM.id = "flexGM";
	flexPM.id = "flexPCM";
	silvD.id = "silvD";
	goldD.id = "goldD";
	platD.id = "platDC";
	flexSD.id = "flexSD";
	flexGD.id = "flexGD";
	flexPD.id = "flexPCD";
}

function noneMclick()
{
	gem = "N";
	noneM.id = "noneMC";
	rubyM.id = "rubyM";
	diamM.id = "diamM";
	ruby1M.id = "ruby1M";
	ruby2M.id = "ruby2M";
	ruby3M.id = "ruby3M";
	diam1M.id = "diam1M";
	diam2M.id = "diam2M";
	diam3M.id = "diam3M";
	noneD.id = "noneDC";
	rubyD.id = "rubyD";
	diamD.id = "diamD";
	ruby1D.id = "ruby1D";
	ruby2D.id = "ruby2D";
	ruby3D.id = "ruby3D";
	diam1D.id = "diam1D";
	diam2D.id = "diam2D";
	diam3D.id = "diam3D";
}

function rubyMclick()
{
	gem = "R";
	noneM.id = "noneM";
	rubyM.id = "rubyMC";
	diamM.id = "diamM";
	ruby1M.id = "ruby1MC";
	ruby2M.id = "ruby2MC";
	ruby3M.id = "ruby3MC";
	diam1M.id = "diam1M";
	diam2M.id = "diam2M";
	diam3M.id = "diam3M";
	noneD.id = "noneD";
	rubyD.id = "rubyDC";
	diamD.id = "diamD";
	ruby1D.id = "ruby1DC";
	ruby2D.id = "ruby2DC";
	ruby3D.id = "ruby3DC";
	diam1D.id = "diam1D";
	diam2D.id = "diam2D";
	diam3D.id = "diam3D";
}

function diamMclick()
{
	gem = "D";
	noneM.id = "noneM";
	rubyM.id = "rubyM";
	diamM.id = "diamMC";
	ruby1M.id = "ruby1M";
	ruby2M.id = "ruby2M";
	ruby3M.id = "ruby3M";
	diam1M.id = "diam1MC";
	diam2M.id = "diam2MC";
	diam3M.id = "diam3MC";
	noneD.id = "noneD";
	rubyD.id = "rubyD";
	diamD.id = "diamDC";
	ruby1D.id = "ruby1D";
	ruby2D.id = "ruby2D";
	ruby3D.id = "ruby3D";
	diam1D.id = "diam1DC";
	diam2D.id = "diam2DC";
	diam3D.id = "diam3DC";
}

var flexSD = document.querySelector('#flexSCD');
var flexGD = document.querySelector('#flexGD');
var flexPD = document.querySelector('#flexPD');
var silvD = document.querySelector('#silvDC');
var goldD = document.querySelector('#goldD');
var platD = document.querySelector('#platD');
var noneD = document.querySelector('#noneDC');
var rubyD = document.querySelector('#rubyD');
var diamD = document.querySelector('#diamD');
var ruby1D = document.querySelector('#ruby1D');
var ruby2D = document.querySelector('#ruby2D');
var ruby3D = document.querySelector('#ruby3D');
var diam1D = document.querySelector('#diam1D');
var diam2D = document.querySelector('#diam2D');
var diam3D = document.querySelector('#diam3D');
silvD.addEventListener('click', silvDclick);
goldD.addEventListener('click', goldDclick);
platD.addEventListener('click', platDclick);
noneD.addEventListener('click', noneDclick);
rubyD.addEventListener('click', rubyDclick);
diamD.addEventListener('click', diamDclick);

function silvDclick()
{
	material = "S";
	silvM.id = "silvMC";
	goldM.id = "goldM";
	platM.id = "platM";
	flexSM.id = "flexSCM";
	flexGM.id = "flexGM";
	flexPM.id = "flexPM";
	silvD.id = "silvDC";
	goldD.id = "goldD";
	platD.id = "platD";
	flexSD.id = "flexSCD";
	flexGD.id = "flexGD";
	flexPD.id = "flexPD";
}

function goldDclick()
{
	material = "G";
	silvM.id = "silvM";
	goldM.id = "goldMC";
	platM.id = "platM";
	flexSM.id = "flexSM";
	flexGM.id = "flexGCM";
	flexPM.id = "flexPM";
	silvD.id = "silvD";
	goldD.id = "goldDC";
	platD.id = "platD";
	flexSD.id = "flexSD";
	flexGD.id = "flexGCD";
	flexPD.id = "flexPD";
}

function platDclick()
{
	material = "P";
	silvM.id = "silvM";
	goldM.id = "goldM";
	platM.id = "platMC";
	flexSM.id = "flexSM";
	flexGM.id = "flexGM";
	flexPM.id = "flexPCM";
	silvD.id = "silvD";
	goldD.id = "goldD";
	platD.id = "platDC";
	flexSD.id = "flexSD";
	flexGD.id = "flexGD";
	flexPD.id = "flexPCD";
}

function noneDclick()
{
	gem = "N";
	noneM.id = "noneMC";
	rubyM.id = "rubyM";
	diamM.id = "diamM";
	ruby1M.id = "ruby1M";
	ruby2M.id = "ruby2M";
	ruby3M.id = "ruby3M";
	diam1M.id = "diam1M";
	diam2M.id = "diam2M";
	diam3M.id = "diam3M";
	noneD.id = "noneDC";
	rubyD.id = "rubyD";
	diamD.id = "diamD";
	ruby1D.id = "ruby1D";
	ruby2D.id = "ruby2D";
	ruby3D.id = "ruby3D";
	diam1D.id = "diam1D";
	diam2D.id = "diam2D";
	diam3D.id = "diam3D";
}

function rubyDclick()
{
	gem = "R";
	noneM.id = "noneM";
	rubyM.id = "rubyMC";
	diamM.id = "diamM";
	ruby1M.id = "ruby1MC";
	ruby2M.id = "ruby2MC";
	ruby3M.id = "ruby3MC";
	diam1M.id = "diam1M";
	diam2M.id = "diam2M";
	diam3M.id = "diam3M";
	noneD.id = "noneD";
	rubyD.id = "rubyDC";
	diamD.id = "diamD";
	ruby1D.id = "ruby1DC";
	ruby2D.id = "ruby2DC";
	ruby3D.id = "ruby3DC";
	diam1D.id = "diam1D";
	diam2D.id = "diam2D";
	diam3D.id = "diam3D";
}

function diamDclick()
{
	gem = "D";
	noneM.id = "noneM";
	rubyM.id = "rubyM";
	diamM.id = "diamMC";
	ruby1M.id = "ruby1M";
	ruby2M.id = "ruby2M";
	ruby3M.id = "ruby3M";
	diam1M.id = "diam1MC";
	diam2M.id = "diam2MC";
	diam3M.id = "diam3MC";
	noneD.id = "noneD";
	rubyD.id = "rubyD";
	diamD.id = "diamDC";
	ruby1D.id = "ruby1D";
	ruby2D.id = "ruby2D";
	ruby3D.id = "ruby3D";
	diam1D.id = "diam1DC";
	diam2D.id = "diam2DC";
	diam3D.id = "diam3DC";
}

var ringM1 = document.querySelector('.ringM1');
var ringM2 = document.querySelector('.ringM2');
var ringM3 = document.querySelector('.ringM3');
var ringD1 = document.querySelector('.ringD1');
var ringD2 = document.querySelector('.ringD2');
var ringD3 = document.querySelector('.ringD3');
var earringM1 = document.querySelector('.earringM1');
var earringM2 = document.querySelector('.earringM2');
var earringM3 = document.querySelector('.earringM3');
var earringD1 = document.querySelector('.earringD1');
var earringD2 = document.querySelector('.earringD2');
var earringD3 = document.querySelector('.earringD3');
var braceletM1 = document.querySelector('.braceletM1');
var braceletM2 = document.querySelector('.braceletM2');
var braceletM3 = document.querySelector('.braceletM3');
var braceletD1 = document.querySelector('.braceletD1');
var braceletD2 = document.querySelector('.braceletD2');
var braceletD3 = document.querySelector('.braceletD3');
ringM1.addEventListener('click', redirectOrderRing);
ringM2.addEventListener('click', redirectOrderRing);
ringM3.addEventListener('click', redirectOrderRing);
ringD1.addEventListener('click', redirectOrderRing);
ringD2.addEventListener('click', redirectOrderRing);
ringD3.addEventListener('click', redirectOrderRing);
earringM1.addEventListener('click', redirectOrderEarring);
earringM2.addEventListener('click', redirectOrderEarring);
earringM3.addEventListener('click', redirectOrderEarring);
earringD1.addEventListener('click', redirectOrderEarring);
earringD2.addEventListener('click', redirectOrderEarring);
earringD3.addEventListener('click', redirectOrderEarring);
braceletM1.addEventListener('click', redirectOrderBracelet);
braceletM2.addEventListener('click', redirectOrderBracelet);
braceletM3.addEventListener('click', redirectOrderBracelet);
braceletD1.addEventListener('click', redirectOrderBracelet);
braceletD2.addEventListener('click', redirectOrderBracelet);
braceletD3.addEventListener('click', redirectOrderBracelet);

function redirectOrderRing()
{
	var url = "../transaction/index.html?order=R" + material + gem;
	location.href = url;
}

function redirectOrderEarring()
{
	var url = "../transaction/index.html?order=E" + material + gem;
	location.href = url;
}

function redirectOrderBracelet()
{
	var url = "../transaction/index.html?order=B" + material + gem;
	location.href = url;
}