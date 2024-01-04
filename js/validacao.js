function isValidCPF(cpf) {
  cpf = cpf.replace(/[^\d]+/g, '');
  if (cpf === '00000000000') return false; 
  if (cpf.length !== 11) return false;

  let sum = 0;
  let remainder;

  for (let i = 1; i <= 9; i++) {
    sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
  }

  remainder = (sum * 10) % 11;

  if ((remainder === 10) || (remainder === 11)) remainder = 0;

  if (remainder !== parseInt(cpf.substring(9, 10))) return false;

  sum = 0;

  for (let i = 1; i <= 10; i++) {
    sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);
  }

  remainder = (sum * 10) % 11;

  if ((remainder === 10) || (remainder === 11)) remainder = 0;

  if (remainder !== parseInt(cpf.substring(10, 11))) return false;

  return true;
}

function validarCPFInput() {
  const cpfInput = $('#cpf').val();
  const isValid = isValidCPF(cpfInput);

  if (isValid  || cpfInput === '000.000.000-00'){
    $('#cpf').get(0).setCustomValidity('');
    if (cpfInput === '000.000.000-00'){      
      $('#cpf').prop('required', true);
    } else {
      $('#cpf').prop('required', false);
    }
  } else { 
    $('#cpf').get(0).setCustomValidity('CPF inválido');
  }
  $('#cpf').get(0).reportValidity();
}

$(document).ready(function() {
  $('#cpf').on('input', validarCPFInput);
  $('#cpf').on('blur', function() {
    if ($(this).val() === ''){ 
      $(this).get(0).setCustomValidity('');
    }
  });


  });
