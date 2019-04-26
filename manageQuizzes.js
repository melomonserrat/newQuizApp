function createQuiz(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('#editQuizzes').is(':visible')){
        $('#editQuizzes').hide(1000);
    }
    if($('#viewQuizzes').is(':visible')){
        $('#viewQuizzes').hide(1000);
    }
    if($('#createQuiz').is(':hidden')){
        $('#createQuiz').show(1000);
    }
}

function editQuiz(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('#editQuizzes').is(':hidden')){
        $('#editQuizzes').show(1000);
    }
    if($('#viewQuizzes').is(':visible')){
        $('#viewQuizzes').hide(1000);
    }
    if($('#createQuiz').is(':visible')){
        $('#createQuiz').hide(1000);
    }
}

function viewQuizzes(){
    if($('.home').is(':visible')){
        $('.home').hide(1000);
    }
    if($('#editQuizzes').is(':visible')){
        $('#editQuizzes').hide(1000);
    }
    if($('#viewQuizzes').is(':hidden')){
        $('#viewQuizzes').show(1000);
    }
    if($('#createQuiz').is(':visible')){
        $('#createQuiz').hide(1000);
    }
}

function goBackToHome(){
    if($('.home').is(':hidden')){
        $('.home').show(1000);
    }
    if($('#editQuizzes').is(':visible')){
        $('#editQuizzes').hide(1000);
    }
    if($('#viewQuizzes').is(':visible')){
        $('#viewQuizzes').hide(1000);
    }
    if($('#createQuiz').is(':visible')){
        $('#createQuiz').hide(1000);
    }
}

function clearQuestionContainer(){
	
	var myNode = document.getElementById("questionContainer");
	while (myNode.firstChild) {
		myNode.removeChild(myNode.firstChild);
	}
	
	
}

function getQuizType(){
    d = document.getElementById("quizType").value;
    return d;
}

function addQuestion(){
	
	if(getQuizType()=="identification"){
		identificationQuestion();
	}else if(getQuizType()=="multipleChoice"){
		multipleChoiceQuestion();
	}else if(getQuizType()=="matchingType"){
		matchingTypeQuestion();
	}else if(getQuizType()=="trueOrFalse"){
		trueOrFalseQuestion();
	}
	
	
}

function identificationQuestion(){
	
	var questionContainer=document.createElement("div");
	questionContainer.className="card";
	questionContainer.style.width="40rem"; 
	questionContainer.id="questionCard";
	questionContainer.align="center";
	
	var question=document.createElement("input");
	question.type="text";
	question.name="question";
	
	var label1=document.createElement("label");
	label1.innerHTML="Question";
	
	var label2=document.createElement("label");
	label2.innerHTML="Answer";	
	
	var answer=document.createElement("input");
	answer.type="text";
	answer.name="answer";
	
	questionContainer.appendChild(label1);
	//quizCard.appendChild('<p><br></p>');
	questionContainer.appendChild(question);
	questionContainer.appendChild(label2);
	questionContainer.appendChild(answer);
	
	document.getElementById("questionContainer").append(questionContainer);
	document.getElementById("questionContainer").append(document.createElement("br"));
	
}

function multipleChoiceQuestion(){
	
	var questionForm=document.createElement("div");
	//questionForm.className="";
	
	var questionContainer=document.createElement("div");
	questionContainer.className="card";
	questionContainer.style.width="30rem"; 
	questionContainer.id="questionCard";
	questionContainer.align="center";
	
	var question=document.createElement("input");
	question.type="text";
	question.name="question";
	
	var label1=document.createElement("label");
	label1.innerHTML="Question";
	
	var label2=document.createElement("label");
	label2.innerHTML="Choice A";
	
	var label3=document.createElement("label");
	label3.innerHTML="Choice B";
	
	var label4=document.createElement("label");
	label4.innerHTML="Choice C";
	
	var label5=document.createElement("label");
	label5.innerHTML="Choice D";	
	
	var label6=document.createElement("label");
	label6.innerHTML="Answer";	
	
	var choiceA=document.createElement("input");
	choiceA.type="text";
	choiceA.name="choiceA";
	
	var choiceB=document.createElement("input");
	choiceB.type="text";
	choiceB.name="choiceB";
	
	var choiceC=document.createElement("input");
	choiceC.type="text";
	choiceC.name="choiceC";
	
	var choiceD=document.createElement("input");
	choiceD.type="text";
	choiceD.name="choiceD";
	
	var answer=document.createElement("input");
	answer.type="text";
	answer.name="answer";
	
	questionContainer.appendChild(label1);
	questionContainer.appendChild(question);
	questionContainer.appendChild(label2);
	questionContainer.appendChild(choiceA);
	questionContainer.appendChild(label3);
	questionContainer.appendChild(choiceB);
	questionContainer.appendChild(label4);
	questionContainer.appendChild(choiceC);
	questionContainer.appendChild(label5);
	questionContainer.appendChild(choiceD);
	questionContainer.appendChild(label6);
	questionContainer.appendChild(answer);
	
	questionForm.appendChild(questionContainer);
	document.getElementById("questionContainer").append(questionForm);
	document.getElementById("questionContainer").append(document.createElement("br"));
	
}

function matchingTypeQuestion(){
	
	
	
}

function trueOrFalseQuestion(){
	
		var questionContainer=document.createElement("div");
	questionContainer.className="card";
	questionContainer.style.width="40rem"; 
	questionContainer.id="questionCard";
	questionContainer.align="center";
	
	var question=document.createElement("input");
	question.type="text";
	question.name="question";
	
	var label1=document.createElement("label");
	label1.innerHTML="Question";
	
	var label2=document.createElement("label");
	label2.innerHTML="Answer";	
	
	var answer=document.createElement("select");
	answer.className="custom-select";
	answer.id="answer";
	
	var trueChoice=document.createElement("option");
	trueChoice.value="trueChoice";
	trueChoice.innerHTML="True";
	
	var falseChoice=document.createElement("option");
	falseChoice.value="falseChoice";
	falseChoice.innerHTML="False";
	
	answer.appendChild(trueChoice);
	answer.appendChild(falseChoice);
	//class="custom-select" id="quizType"
	
	questionContainer.appendChild(label1);
	//quizCard.appendChild('<p><br></p>');
	questionContainer.appendChild(question);
	questionContainer.appendChild(label2);
	questionContainer.appendChild(answer);
	
	document.getElementById("questionContainer").append(questionContainer);
	document.getElementById("questionContainer").append(document.createElement("br"));
	
}