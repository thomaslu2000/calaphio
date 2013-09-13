var _apo_short_search_request = false;
var _apo_short_search_result = new Array;

function apo_short_search_statechange()
{
  var request = _apo_short_search_request;
  if (request.readyState == 4) {
    if (request.status == 200 || request.status == 304 || request.status == 203) {
      var users = request.responseXML.getElementsByTagName("user");
      _apo_short_search_result = new Array;
      for (var i = 0; i < users.length; i++) {
	var div_node = document.createElement("div");
	var a_node = document.createElement("a");
	a_node.setAttribute("href", "profile.php?user_id=" + users[i].getAttribute("user_id"));
	a_node.appendChild(document.createTextNode(users[i].firstChild.nodeValue));
	eval("a_node.onclick = function() {" +
	     //"alert('Clicked " + users[i].getAttribute("user_id") + "');" + 
	     //"return true;" +
	     "}" );
	div_node.appendChild(a_node);
	_apo_short_search_result.push(div_node);
      }
      apo_short_search_prune(document.getElementById("apo_short_search_input").value);
    }
  }
}

function apo_short_search_retrieve(input_text)
{
  var url = "short_search.php?name=" + input_text;
  _apo_short_search_request = createXMLHttpRequest();
  _apo_short_search_request.open("GET", url, true);
  _apo_short_search_request.onreadystatechange = apo_short_search_statechange;
  _apo_short_search_request.send(null);
}

function apo_short_search_prune(input_text)
{
  input_text = input_text.toLowerCase();
  var result_array = _apo_short_search_result;
  var result_element = document.getElementById("apo_short_search_result");
  var child;
  var node;
  var text;
  while (child = result_element.firstChild) {
    result_element.removeChild(child);
  }
  if (input_text.length > 0) {
    for (var i = 0; i < result_array.length; i++) {
      if (result_array[i].firstChild.firstChild.nodeValue.substr(0, input_text.length).toLowerCase() == input_text) {
	node = result_array[i].cloneNode(true);
	node.firstChild.onclick = result_array[i].firstChild.onclick;
	text = node.firstChild.firstChild.nodeValue;
	node.firstChild.innerHTML = "<strong>" + text.substr(0, input_text.length) + "</strong>" + 
	  text.substring(input_text.length, text.length);
	result_element.appendChild(node);
      }
    }
  }
}

function apo_short_search()
{
  var input_text = document.getElementById("apo_short_search_input").value;
  if (input_text.length >= 2) {
    if (!_apo_short_search_request) {
      apo_short_search_retrieve(input_text.substr(0, 2));
    }
  } else {
    _apo_short_search_request = false;
  }
  apo_short_search_prune(input_text);
}

window.onload = function() {
  document.getElementById("apo_short_search_input").onkeyup = apo_short_search;
  apo_short_search();
}
