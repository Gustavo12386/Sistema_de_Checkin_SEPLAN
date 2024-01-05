function isValidCPF(cpf) {
  cpf = cpf.replace(/[^\d]+/g, '');
  if (cpf === '00000000000') return false; 
  if (cpf === '11111111111') return false; 
  if (cpf === '22222222222') return false; 
  if (cpf === '33333333333') return false; 
  if (cpf === '44444444444') return false; 
  if (cpf === '55555555555') return false; 
  if (cpf === '66666666666') return false;
  if (cpf === '77777777777') return false;
  if (cpf === '88888888888') return false;
  if (cpf === '99999999999') return false;    
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

  if (isValid  || cpfInput === '000.000.000-00' || cpfInput === '111.111.111-11' || cpfInput === '222.222.222-22'
  || cpfInput === '333.333.333-33' || cpfInput === '444.444.444-44' || cpfInput === '555.555.555-55'
  || cpfInput === '666.666.666-66' || cpfInput === '777.777.777-77' || cpfInput === '888.888.888-88'
  || cpfInput === '999.999.999-99'){
  //  $('#cpf').get(0).setCustomValidity(''); 
  } else { 
    //$('#cpf').get(0).setCustomValidity('CPF inválido');
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
