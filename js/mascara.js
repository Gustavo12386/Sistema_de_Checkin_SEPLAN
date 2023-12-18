document.addEventListener('DOMContentLoaded', function() {

const input = document.querySelector('#cpf'); 

input.addEventListener('input', () => {
  let inputValue = input.value.replace(/[^\d]/g, ''); 
  let inputLength = inputValue.length;

  if (inputLength === 3 || inputLength === 6) {
    input.value = inputValue + '.';
  } else if (inputLength === 9) {
    input.value = inputValue.slice(0, 3) + '.' + inputValue.slice(3, 6) + '.' + inputValue.slice(6, 9) + '-';
  }
})
});