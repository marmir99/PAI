function isWhiteSpaceOrEmpty(str) {
	return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(str) {
	let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z]+$/;
	if (!email.test(str)) {
		return true;
	}
	else {
		return false;
	}
}

function checkStringAndFocus(obj, msg, fun) {
	let str = obj.value;
	let errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
	if (fun(str)) {
		document.getElementById(errorFieldName).innerHTML = msg;
		obj.focus();
		return false;
	}
	else {
		document.getElementById(errorFieldName).innerHTML = "";
		return true;
	}
}


function validate(formularz) {
	let result = checkStringAndFocus(formularz.elements["f_imie"], "Podaj imie", isWhiteSpaceOrEmpty);
	result = checkStringAndFocus(formularz.elements["f_nazwisko"], "Podaj nazwisko", isWhiteSpaceOrEmpty) && result;
	result = checkStringAndFocus(formularz.elements["f_email"], "Podaj wlasciwy email", isEmailInvalid) && result;
	result = checkStringAndFocus(formularz.elements["f_kod"], "Podaj kod", isWhiteSpaceOrEmpty) && result;
	result = checkStringAndFocus(formularz.elements["f_ulica"], "Podaj ulice", isWhiteSpaceOrEmpty) && result;
	result = checkStringAndFocus(formularz.elements["f_miasto"], "Podaj miasto", isWhiteSpaceOrEmpty) && result;
	if (result) {
		return true;
	}
	else {
		return false;
	}
}

function showElement(e) {
	document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
	document.getElementById(e).style.visibility = 'hidden';
}

function alterRows(i, e) {
	if (e) {
		if (i % 2 == 1) {
			e.setAttribute("style", "background-color: Aqua;");
		}
		e = e.nextSibling;
		while (e && e.nodeType != 1) {
			e = e.nextSibling;
		}
		alterRows(++i, e);
	}
}

function nextNode(e) {
	while (e && e.nodeType != 1) {
		e = e.nextSibling;
	}
	return e;
}
function prevNode(e) {
	while (e && e.nodeType != 1) {
		e = e.previousSibling;
	}
	return e;
}
function swapRows(b) {
	let tab = prevNode(b.previousSibling);
	let tBody = nextNode(tab.firstChild);
	let lastNode = prevNode(tBody.lastChild);
	tBody.removeChild(lastNode);
	let firstNode = nextNode(tBody.firstChild);
	tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
	if (form.value.length > maxSize)
		form.value = form.value.substring(0, maxSize);
	else
		msg.innerHTML = maxSize - form.value.length;
}