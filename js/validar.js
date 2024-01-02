function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11 || !validarDigitos(cpf)) {
     document.getElementById('cpfStatus').innerText = 'CPF Inválido';
     var texto = document.getElementById('cpfStatus');
     if (texto) {
        // Alterando a cor da borda usando JavaScript
        texto.style.color = "red";        
      } 
     var invalido =  document.getElementById('cpf');
      if (invalido) {
        // Alterando a cor da borda usando JavaScript
        invalido.style.borderColor = "red";        
      } 
      
    } else {
     document.getElementById('cpfStatus').innerText = '';
      var valido =  document.getElementById('cpf');
      if (valido) {
        // Alterando a cor da borda usando JavaScript
        valido.style.borderColor = "green";        
      } 
    }
  }

  function validarDigitos(cpf) {
    const digitos = cpf.split('').map(Number);

    // Calcula o primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
      soma += digitos[i] * (10 - i);
    }
    let resto = soma % 11;
    let primeiroDigito = (resto < 2) ? 0 : 11 - resto;

    if (primeiroDigito !== digitos[9]) {
      return false;
    }

    // Calcula o segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
      soma += digitos[i] * (11 - i);
    }
    resto = soma % 11;
    let segundoDigito = (resto < 2) ? 0 : 11 - resto;

    return segundoDigito === digitos[10];
  }
