function validateForm(frm) {
    if (isEmpty(frm.feedback)){
		frm.feedback.style.background = 'Yellow';
		alert("Please provide a comment");
		frm.feedback.style.background = 'White';
		frm.feedback.focus();
		return false;
	}
	frm.feedback.style.background = 'White';
	return true;
}

function isEmpty(fld) {
    if (fld.value.length == 0) {
        return true;
    } else {
       return false;
    }
}

function validateSurvey(frm) {
    if (frm.accessed_from.selectedIndex == 0) {
        frm.accessed_from.style.background = 'Yellow';
		alert("Please select where you access www.gov.au from");
		frm.accessed_from.focus();
		frm.accessed_from.style.background = 'White';
		return false;
    } 

    if (frm.found_by.selectedIndex == 0) {
		frm.found_by.style.background = 'Yellow';
        alert("Please select how you found www.gov.au");
		frm.found_by.focus();
		frm.found_by.style.background = 'White';
		return false;
    }

    if (frm.internet_access.selectedIndex == 0) {
		frm.internet_access.style.background = 'Yellow';
        alert("Please select how you connect to www.gov.au");
		frm.internet_access.focus();
		frm.internet_access.style.background = 'White';
		return false;
    } else {
       return true;
    }
}