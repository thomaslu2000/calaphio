function popup(url, width, height) {
	window.open(url, '_blank', 'width=' + width + ',height=' + height + ',scrollbars=yes');
	return false;
}

function target_opener(url, closeme) {
	window.opener.location.href = url;
	if (closeme) {
		window.close();
	}
	return false;
}

/**
 * Function courtesy of NetLobo
 * http://www.netlobo.com/url_query_string_javascript.html */
function gup( name )
{
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var tmpURL = window.location.href;
  var results = regex.exec( tmpURL );
  if( results == null )
    return "";
  else
    return results[1];
}