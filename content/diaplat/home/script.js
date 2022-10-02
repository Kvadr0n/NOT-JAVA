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

var number1 = document.querySelector('#number1D');
var orderD = document.querySelector('#orderD');
var orderM = document.querySelector('#orderM');
orderD.addEventListener('mouseover', orderhover);
orderD.addEventListener('mouseout', orderunhover);
orderD.addEventListener('click', redirectConstructor);
orderM.addEventListener('click', redirectConstructor);

function orderhover()
{
	number1.id = "number1hover";
}
function orderunhover()
{
	number1.id = "number1D";
}

var desktop = document.querySelector('.desktop');
var mobile = document.querySelector('.mobile');
var explorer = document.querySelector('#off');
var ua = window.navigator.userAgent;
var msie = ua.indexOf('MSIE ');
if (msie > 0) 
{
    desktop.id = "off";
	mobile.id = "off";
	explorer.id = "explorer";
}
var trident = ua.indexOf('Trident/');
if (trident > 0) 
{
    desktop.id = "off";
	mobile.id = "off";
	explorer.id = "explorer";
}