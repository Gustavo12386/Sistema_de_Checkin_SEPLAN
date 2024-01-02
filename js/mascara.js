document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('cpf').addEventListener('input', function() {
      formatCPF(this);
    });

    function formatCPF(input) {
      // Remove caracteres não numéricos
      let cpf = input.value.replace(/\D/g, '');

      // Adiciona a máscara
      cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

      // Atualiza o valor do campo
      input.value = cpf;
    }
  });