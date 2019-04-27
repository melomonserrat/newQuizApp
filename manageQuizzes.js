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
	
	if(getQuizType()=="I"){
		identificationQuestion();
	}else if(getQuizType()=="MC"){
		multipleChoiceQuestion();
	}else if(getQuizType()=="MT"){
		matchingTypeQuestion();
	}else if(getQuizType()=="ToF"){
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
	question.id="shit";
	question.name="question";
	
	var label1=document.createElement("label");
	label1.innerHTML="Question";
	
	var label2=document.createElement("label");
	label2.innerHTML="Answer";	
	
	var answer=document.createElement("input");
	answer.type="text";
	answer.name="answer[]";
	
	questionContainer.appendChild(label1);
	//quizCard.appendChild('<p><br></p>');
	questionContainer.appendChild(question);
	questionContainer.appendChild(label2);
	questionContainer.appendChild(answer);
	
	document.getElementById("questionContainer").append(questionContainer);
	document.getElementById("questionContainer").append(document.createElement("br"));
	
	alert(document.getElementById("shit").getAttribute("name"));
	
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
	question.name="question[]";
	
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
	
	var inputA=document.createElement("input");
	inputA.type="text";
	inputA.name="intputA[]";
	
	var inputB=document.createElement("input");
	inputB.type="text";
	inputB.name="inputB[]";
	
	var inputC=document.createElement("input");
	inputC.type="text";
	inputC.name="inputC[]";
	
	var inputD=document.createElement("input");
	inputD.type="text";
	inputD.name="inputD[]";
	
	var choiceA=document.createElement("option");
	choiceA.value="A";
	choiceA.innerHTML="A";
	
	var choiceB=document.createElement("option");
	choiceB.value="B";
	choiceB.innerHTML="B";
	
	var choiceC=document.createElement("option");
	choiceC.value="C";
	choiceC.innerHTML="C";
	
	var choiceD=document.createElement("option");
	choiceD.value="D";
	choiceD.innerHTML="D";
	
	var answer=document.createElement("select");
	answer.type="text";
	answer.name="answer[]";
	
	answer.appendChild(choiceA);
	answer.appendChild(choiceB);
	answer.appendChild(choiceC);
	answer.appendChild(choiceD);
	
	questionContainer.appendChild(label1);
	questionContainer.appendChild(question);
	questionContainer.appendChild(label2);
	questionContainer.appendChild(inputA);
	questionContainer.appendChild(label3);
	questionContainer.appendChild(inputB);
	questionContainer.appendChild(label4);
	questionContainer.appendChild(inputC);
	questionContainer.appendChild(label5);
	questionContainer.appendChild(inputD);
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
	question.name="question[]";
	
	var label1=document.createElement("label");
	label1.innerHTML="Question";
	
	var label2=document.createElement("label");
	label2.innerHTML="Answer";	
	
	var answer=document.createElement("select");
	answer.className="custom-select";
	answer.name="answer[]";
	
	var trueChoice=document.createElement("option");
	trueChoice.value="TRUE";
	trueChoice.innerHTML="True";
	
	var falseChoice=document.createElement("option");
	falseChoice.value="FALSE";
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