var btn = document.getElementById('calculate');
var reset = document.getElementById('reset');

var l = document.getElementById('length');
var w = document.getElementById('width');
var d = document.getElementById('depth');

// get multiplication
var lm = document.getElementById('lengthunits');
var wm = document.getElementById('widthunits');
var dm = document.getElementById('depthunits');

var answer = 0;
var show_ans = document.getElementById('answer');
var ans_holder = document.getElementById('ans_holder');

// var qoute = document.getElementById('qoute').href;
// var qoute_btn = document.getElementById('qoute');
var unit_type = document.getElementById('unit_type');

// run calculation
btn.onclick = function(){
	if ( l.value !== "" && w.value !== "" && d.value !== "" ) {
		// if ( lm.value == wm.value  && wm.value == dm.value ) {
			ans_holder.style.display = "block";
			if( unit_type.value == "metric" ) {
				answer = lm.value * wm.value * dm.value * l.value * w.value * d.value;
				p_answer = answer.toFixed(2);
				show_ans.innerHTML = 'You need: ' + p_answer + ' m³';
			} else {
				answer = (lm.value / 36 * wm.value / 36 * dm.value / 36 * l.value * w.value * d.value);
				p_answer = answer.toFixed(2);
				show_ans.innerHTML = 'You need: ' + p_answer + ' cubic yard';
			}
			// qoute += "/?";
			// qoute += "qoute_value=";
			// qoute += p_answer;
			// qoute_btn.href = qoute;
		// } else {
		// 	alert('Please select same units for Lengh, width & Depth');
		// }
	} else {
		alert('Length, Width and Depth must be greater than zero.');
	}
}

reset.onclick = function(){
	for(var i = 0; i < lm.length; i++) {
	  lm[i].selectedIndex =0;
	}
	for(var i = 0; i < wm.length; i++) {
	  wm[i].selectedIndex =0;
	}
	for(var i = 0; i < dm.length; i++) {
	  dm[i].selectedIndex =0;
	}
	l.value = "";
	w.value = "";
	d.value = "";
	ans_holder.style.display = "none";
}