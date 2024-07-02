const links = document.querySelectorAll('.nav-link');
    
if (links.length) {
  links.forEach((link) => {
    link.addEventListener('click', (e) => {
      links.forEach((link) => {
          link.classList.remove('active');
      });
      e.preventDefault();
      link.classList.add('active');
    });
  });
}


function showDropdown() {
  var dropdown = document.querySelector('.dropdown-content');
  dropdown.style.display = 'block';
}

function filterOptions() {
  var input = document.querySelector('.search-input');
  var filter = input.value.toLowerCase();
  var options = document.querySelectorAll('.dropdown-content a');
  
  for (var i = 0; i < options.length; i++) {
    var option = options[i];
    var text = option.textContent.toLowerCase();
    
    if (text.includes(filter)) {
      option.style.display = 'block';
    } else {
      option.style.display = 'none';
    }
  }
}

function selectOption(option) {
  var input = document.querySelector('.search-input');
  input.value = option;
  input.removeAttribute('readonly'); // Allow editing the input value
  
  var dropdown = document.querySelector('.dropdown-content');
  dropdown.style.display = 'none'; // Hide the dropdown after selecting an option
}