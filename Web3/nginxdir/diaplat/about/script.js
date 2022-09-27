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

