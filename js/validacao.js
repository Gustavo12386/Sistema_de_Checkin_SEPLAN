function isValidCPF(cpf) {
  cpf = cpf.replace(/[^\d]+/g, '');

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

$(document).ready(function() {
  $('#cpf').on('input', function() {
    const cpfInput = $(this).val();
    const isValid = isValidCPF(cpfInput);

    if (isValid) {
      $('#cpfValidationResult').hide();
      $(this).removeClass('invalid-cpf');
    } else {
      $('#cpfValidationResult').show();
      $(this).addClass('invalid-cpf');
    }
  });

  $('#cpf').on('blur', function() {
    if ($(this).val() === '') {
      $('#cpfValidationResult').hide();
      $(this).removeClass('invalid-cpf');
    }
  });

  $('#cpf').on('focus', function() {
    $('#cpfValidationResult').hide();
    $(this).removeClass('invalid-cpf');
  });
});