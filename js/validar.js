function validarCPF(cpf)
{
        // Remover caracteres não numéricos
        cpf = cpf.replace(/[^\d]/g, '');
        // Verificar se o CPF possui 11 dígitos
        if (cpf.length !== 11) 
        {
            return false;
        }    
        // Verificar se todos os dígitos são iguais (caso contrário, é um CPF inválido)
        if (/^(\d)\1+$/.test(cpf))
        {
            return false;
        }    
        // Calcular o primeiro dígito verificador
        let soma = 0;
        for (let i = 0; i < 9; i++)
        {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        let resto = soma % 11;
        let digito1 = resto < 2 ? 0 : 11 - resto;    
        // Verificar se o primeiro dígito verificador está correto
        if (parseInt(cpf.charAt(9)) !== digito1)
        {
            return false;
        }    
        // Calcular o segundo dígito verificador
        soma = 0;
        for (let i = 0; i < 10; i++)
        {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        resto = soma % 11;
        let digito2 = resto < 2 ? 0 : 11 - resto;    
        // Verificar se o segundo dígito verificador está correto
        if (parseInt(cpf.charAt(10)) !== digito2)
        {
            return false;
        }    
        // CPF válido
        return true;
    }

function validarFormulario() {
   // Obtenha o valor do CPF do input
   let cpfInput = $("#cpf");
   let cpf = cpfInput.val();   
   // Remova caracteres não numéricos
   cpf = cpf.replace(/[^\d]/g, '');   
   // Verifique se o CPF é válido
   if(!validarCPF(cpf)) {
    alert("CPF inválido");
    // Impede o envio do formulário se o CPF for inválido
    return false; 
   }   
   // O CPF é válido, permita o envio do formulário
   
return true;
}
  