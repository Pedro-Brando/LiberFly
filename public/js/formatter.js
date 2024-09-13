function currency(id){
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g,"") // permite digitar apenas numero
    value = value.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
    value = value.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
    value = value.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
    value = value.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
    value = value.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
    $(`#${id}`).val(value);
}

function thousand(id){
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g,"") // permite digitar apenas numero
    value = value.replace(/(\d{1})(\d{12})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
    value = value.replace(/(\d{1})(\d{6})$/,"$1.$2") // coloca ponto antes dos ultimos 6 digitos
    value = value.replace(/(\d{1})(\d{3})$/,"$1.$2") // coloca ponto antes dos ultimos 3 digitos
    $(`#${id}`).val(value);
}

function onlyNumbers(id){
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g,"") // permite digitar apenas numero
    $(`#${id}`).val(value);
}

function onlyFloat(id){
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g,"") // permite digitar apenas numero
    value = value.replace(/(\d{1})(\d{2})$/,"$1.$2") // coloca ponto antes dos ultimos 2 digitos
    if (parseInt(value) > 100) value = 100.0;
    $(`#${id}`).val(value);
}

function formatInputHour(id) {
    let value = $(`#${id}`).val();

    // Remove caracteres não numéricos e adiciona o ponto ou vírgula de acordo com o tamanho do valor
    value = value.replace(/\D/g, "");
    value = value.replace(/(\d{1})(\d{1,2})$/, "$1:$2"); // Adiciona ':' antes dos últimos 2 dígitos

    $(`#${id}`).val(value)
}

function validHour(id){
    let value = $(`#${id}`).val();
    // Verifica se o valor está no formato hh:mm e se a hora é válida (0 a 23) e minutos são válidos (0 a 59)
    const regexHorario = /^([01]?[0-9]|2[0-3]):([0-5][0-9])?$/;

    if (!value.match(regexHorario)) {
        $(`#${id}`).val("");
        alert("Horário inválido");
    }

}

function formatDocument(id) {
    let value = $(`#${id}`).val();
    // Remove caracteres não numéricos
    const valorLimpo = value.replace(/\D/g, '');

    // Limita o tamanho máximo ao CNPJ (14 dígitos)
    const valorFormatado = valorLimpo.slice(0, 14);

    // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
    if (valorFormatado.length === 11) {
      // Formata como CPF: XXX.XXX.XXX-XX
      value = valorFormatado.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else if (valorFormatado.length === 14) {
      // Formata como CNPJ: XX.XXX.XXX/XXXX-XX
      value = valorFormatado.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    } else {
      // Não é CPF nem CNPJ, mantém o valor original
      value = valorFormatado;
    }

    $(`#${id}`).val(value);
  }

  function formatQuantity(id) {
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g,"") // permite digitar apenas numero
    if (isNaN(value) || !value) return $(`#${id}`).val("0.000");
    value = value.replace(".", "");
    value = parseFloat(value);
    value = value.toString().padStart(4, "0");
    value = value.toString().replace(/(\d{1})(\d{3})$/,"$1.$2") // coloca ponto antes dos ultimos 3 digitos

    $(`#${id}`).val(value);
}

  function formatQuantity2D(id) {
    let value = $(`#${id}`).val();
    value = value.replace(/\D/g, ""); // permite digitar apenas numero
    if (isNaN(value) || !value) return $(`#${id}`).val("0.00");

    // Converte para número e divide por 100 para ajustar as casas decimais
    value = (parseFloat(value) / 100).toFixed(2);

    // Atualiza o campo de entrada com o valor formatado
    $(`#${id}`).val(value);
}

function formatCurrency(value){
  return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(value);
}

function formatDate(dateString) {
  if (!dateString) return "-";

  return moment(dateString).format('DD/MM/YYYY HH:mm');
}

function formatDocument(id, onlyType = null) {
    let value = $(`#${id}`).val();
    // Remove caracteres não numéricos
    const valorLimpo = value.replace(/\D/g, '');

    // Limita o tamanho máximo ao CNPJ (14 dígitos)
    let valorFormatado = valorLimpo.slice(0, 14);

    // Verifica se é CPF (11 dígitos) ou CNPJ (14 dígitos)
    if (valorFormatado.length === 11 || onlyType == 'cpf') {
      // Formata como CPF: XXX.XXX.XXX-XX
      valorFormatado = valorLimpo.slice(0, 11);
      value = valorFormatado.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else if (valorFormatado.length === 14 || onlyType == 'cnpj') {
      // Formata como CNPJ: XX.XXX.XXX/XXXX-XX
      value = valorFormatado.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    } else {
      // Não é CPF nem CNPJ, mantém o valor original
      value = valorFormatado;
    }

    $(`#${id}`).val(value);
}