// **************** Endereço de Entrega *************************************
$(function () {
// Estado
    function estadoEntrega() {
        $.ajax({
            type: 'GET',        // método GET ou POST
            url: 'funcoes.php', //Página php que fará a busca no banco de dados
            data: {
                acao: 'estado' // definido no arquivo funcoes.php
            },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('select[name=estadoEntrega]').html('');
                $('select[name=estadoEntrega]').append('<option>Selecione o Estado</option>');
                for (i = 0; i < data.qtd; i++) {
                    $('select[name=estadoEntrega]').append('<option value="' + data.uf[i] + '">' + data.estado[i] + ' (' + data.uf[i] + ')' + '</option>');
                }
            }
        });
    }
    estadoEntrega();
// cidade
    function cidadeEntrega(estado) {
        $.ajax({
            type: 'GET',
            url: 'funcoes.php',
            data: {
                acao: 'cidade',
                uf: estado
            },
            dataType: 'json',
            beforeSend: function () {
                $('select[name=cidadeEntrega]').html('<option>Carregando...</option>');
            },
            success: function (data) {
                // console.log(data);
                $('select[name=cidadeEntrega]').html('');
                $('select[name=cidadeEntrega]').append('<option>Selecione a cidade</option>');
                for (i = 0; i < data.qtd; i++) {
                    $('select[name=cidadeEntrega]').append('<option value="' + data.id[i] + '">' + data.cidade[i] + '</option>');
                }
            }
        });
    }

    $('select[name=estadoEntrega]').change(function () { //Evento quando o elemento select é alterado.
        var ufEstado = $(this).val();
        cidadeEntrega(ufEstado);
       // console.log(ufEstado)
    });
    ;
});

function estadoEnderecoEntrega() {
    var select = document.getElementById('estadoEntrega'); // id do select: estadoEntrega
    var option = select.options[select.selectedIndex];
    document.getElementById('shippingAddressState').value = option.value; // id do input: shippingAddressState
    console.log(option);
}

function cidadeEnderecoEntrega() {
    var select = document.getElementById('cidadeEntrega'); // id do select: cidadeEntrega
    var option = select.options[select.selectedIndex];
    document.getElementById('shippingAddressCity').value = option.text; // id do input: shippingAddressCity
    console.log(option);
}


// **************** Endereço do titular do cartão **************************
$(function () {
// Estado do titular do cartão
    function estadoCartao() {
        $.ajax({
            type: 'GET',
            url: 'funcoes.php', //Página que fará a busca no banco de dados
            data: {//Variáveis postadas para o arquivo definido
                acao: 'estado'
            },
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                $('select[name=estadoCartao]').html('');
                $('select[name=estadoCartao]').append('<option>Selecione o Estado</option>');
                for (i = 0; i < data.qtd; i++) {
                    $('select[name=estadoCartao]').append('<option value="' + data.uf[i] + '">' + data.estado[i] + ' (' + data.uf[i] + ')' + '</option>');
                }
            }
        });
    }
    estadoCartao();
// cidade do titular do cartão
    function cidadeCartao(estado) {
        $.ajax({
            type: 'GET',
            url: 'funcoes.php',
            data: {
                acao: 'cidade',
                uf: estado
            },
            dataType: 'json',
            beforeSend: function () {
                $('select[name=cidadeCartao]').html('<option>Carregando...</option>');
            },
            success: function (data) {
                //console.log(data);
                $('select[name=cidadeCartao]').html('');
                $('select[name=cidadeCartao]').append('<option>Selecione a cidade</option>');
                for (i = 0; i < data.qtd; i++) {
                    $('select[name=cidadeCartao]').append('<option value="' + data.id[i] + '">' + data.cidade[i] + '</option>');
                }
            }
        });
    }

    $('select[name=estadoCartao]').change(function () { //Evento quando o elemento select é alterado.
        var ufEstado = $(this).val();
        cidadeCartao(ufEstado);
        //console.log(ufEstado)
    });
    ;

});

function estadoEnderecoCartao() {
    var select = document.getElementById('estadoCartao');
    var option = select.options[select.selectedIndex];
    document.getElementById('billingAddressState').value = option.value;
    console.log(option);
}

function cidadeEnderecoCartao() {
    var select = document.getElementById('cidadeCartao');
    var option = select.options[select.selectedIndex];
    document.getElementById('billingAddressCity').value = option.text;
    console.log(option);
}


// https://metring.com.br/como-obter-o-valor-de-um-select-em-javascript