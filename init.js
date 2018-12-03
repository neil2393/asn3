window.onload = function() {
 prepareListener();
}

function prepareListener() {

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  
}

