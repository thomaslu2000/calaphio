if(document.all && !document.getElementById) {
	document.getElementById = function(id) {
		return document.all[id];
	}
}

function createXMLHttpRequest() {
	var request;
	try {
		request = new XMLHttpRequest();
	} catch (trymicrosoft) {
		try {
			request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (othermicrosoft) {
			try {
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (failed) {
				request = false;
			}
		}
	}

	if (!request)
		alert("This site requires a Javascript enabled internet browser");
	return request;
}

function isObject(a) {
	return (a && typeof a == 'object') || isFunction(a);
}