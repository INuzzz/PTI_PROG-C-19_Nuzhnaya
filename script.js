
function registration(){

	$(".formregistration").hide();
	
    var p = document.getElementById("form-success-text");
	var nameValue = document.getElementById("name");
	var subjectValue = document.getElementById("subject");
	var timeValue = document.querySelector('input[name="time"]:checked');

    var examFrom = "";
    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
        examFrom += " " + checkboxes[i].value;
    };

	var comm = document.getElementById("comment");
	if(comm.value==undefined || comm.value==''){
		p.insertAdjacentHTML('afterbegin',"Уважаемый " + nameValue.value + "! <br> Ждем вас на экзамен по " + subjectValue.value + " в " + timeValue.value +".<br>" + "Экзамен пройдет в форме " + examFrom);
	}
	else{
		p.insertAdjacentHTML('afterbegin',"Уважаемый " + nameValue.value + "! <br> Ждем вас на экзамен по " + subjectValue.value + " в " + timeValue.value +".<br>" + "Экзамен пройдет в форме " + examFrom +".<br> Cпасибо за комментарий:" + comm.value);	
	};
	
    $(".form-success").show();
}

function show_members()
{
	$(".members-table").show();
}
