// JavaScript Document
function confdel() {
	answer=confirm("Wollen sie den Eintrag wirklich löschen?");
	return answer;
}

var options;

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });