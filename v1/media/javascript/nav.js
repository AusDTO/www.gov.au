var gImageNames = new Array("fed.gif", "act.gif", "nsw.gif", "nt.gif", "qld.gif", "sa.gif", "tas.gif", "vic.gif", "wa.gif", "alga.gif");var gImages = new Array();
var gImageFolder = "/media/images/flowers/";

preloadImages();

function preloadImages() 
{
	for (var i = 0; i < gImageNames.length; i++) {
		gImages[i] = new Image();
		gImages[i].src = gImageFolder + gImageNames[i];
	}
}

function replaceImage(id)
{
	if (typeof id == "number") // check the var 'id' is a number
	{
		if ((id < gImageNames.length) && (id >= -1))   // check boundaries
		{
			if (id == -1)   //then if true;   do img roll-over
				document.getElementById("circleDiv").style.background = "none";
			else
				document.getElementById("circleDiv").style.background = "url(\"" + gImages[id].src + "\") no-repeat";
		}
	}
}