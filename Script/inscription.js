inputElts = document.querySelectorAll('input');

for(let i=0; i<inputElts.length; i++){
	inputElts[i].addEventListener('focus', function(e){
		inputElts[i].classList.add("inputFocusOn");
	e.stopPropagation();	
	});

}

for(let i=0; i<inputElts.length; i++){
	inputElts[i].addEventListener('blur', function(e){
		inputElts[i].classList.remove("inputFocusOn");
	e.stopPropagation();
	});
}