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

var instM = document.querySelector('#instM');
var vkM = document.querySelector('#vkM');
var fbM = document.querySelector('#fbM');
var okM = document.querySelector('#okM');
var instD = document.querySelector('#instD');
var vkD = document.querySelector('#vkD');
var fbD = document.querySelector('#fbD');
var okD = document.querySelector('#okD');
instM.addEventListener('click', redirectInst);
vkM.addEventListener('click', redirectVK);
fbM.addEventListener('click', redirectFB);
okM.addEventListener('click', redirectOK);
instD.addEventListener('click', redirectInst);
vkD.addEventListener('click', redirectVK);
fbD.addEventListener('click', redirectFB);
okD.addEventListener('click', redirectOK);

function redirectInst()
{
	location.href = "https://www.instagram.com/adamas_ru/?hl=ru";
}
function redirectVK()
{
	location.href = "https://vk.com/adamas.club";
}
function redirectFB()
{
	location.href = "https://www.facebook.com/adamas.club/";
}
function redirectOK()
{
	location.href = "https://ok.ru/adamasclub";
}