<?php
include './configuracao.php';
include './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - PagSeguro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1 class="display-4">Finalizar a Compra</h1>
                <div class="col-md-3 order-md-2 mb-4 bg-light text-dark">
                    <h2>Produtos</h2>

                </div>
                <div class="col-md-9 order-md-1">
                    <span class="endereco" data-endereco="<?php echo URL; ?>"></span>
                    <span id="msg"></span>
                    <form name="formPagamento" action="" id="formPagamento">
                        <span id="msg"></span>

                        <h4>Dados do Comprador</h4>
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="senderName" id="senderName" placeholder="Nome completo" value="Jose Comprador" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>CPF</label>
                            <input type="text" name="senderCPF" id="senderCPF" placeholder="CPF sem traço" value="22111944785" required class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label>DDD</label>
                                <input type="text" name="senderAreaCode" id="senderAreaCode" placeholder="DDD" value="11" required class="form-control">
                            </div>
                            <div class="col-md-9 mb-3">
                                <label>Telefone</label>
                                <input type="text" name="senderPhone" id="senderPhone" placeholder="Somente número" value="56273440" required class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>E-mail</label>
                            <input type="email" name="senderEmail" id="senderEmail" placeholder="E-mail do comprador" value="v92116229948411959534@sandbox.pagseguro.com.br" required class="form-control">
                        </div>
                        <h2>Endereço de Entrega</h2>
                        <input type="hidden" name="shippingAddressRequired" id="shippingAddressRequired" value="true" class="form-control">
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label>Logradouro</label>
                                <input type="text" name="shippingAddressStreet" id="shippingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Número</label>
                                <input type="text" name="shippingAddressNumber" id="shippingAddressNumber" placeholder="Número" value="1384" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Complemento</label>
                            <input type="text" name="shippingAddressComplement" id="shippingAddressComplement" placeholder="Complemento" value="5o andar" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Estado</label>
                                <select name="estadoEntrega" class="custom-select d-block w-100" id="estadoEntrega" onChange="estadoEnderecoEntrega()" required>
                                    <option value="">Selecione</option>
                                </select>
                                <input type="hidden" id="shippingAddressState" name="shippingAddressState">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Cidade</label>
                                <select name="cidadeEntrega" class="custom-select d-block w-100" id="cidadeEntrega" onChange="cidadeEnderecoEntrega()" required>
                                    <option value="">Selecione</option>
                                </select>
                                <input type="hidden" id="shippingAddressCity" name="shippingAddressCity">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label>Bairro</label>
                                <input type="text" name="shippingAddressDistrict" id="shippingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>CEP</label>
                                <input type="text" name="shippingAddressPostalCode" id="shippingAddressPostalCode" placeholder="CEP sem traço" value="01452002" class="form-control">
                            </div>
                        </div>

                        <!-- Moeda utilizada para pagamento -->
                        <input type="hidden" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL">
                        <!-- 1 - PAC / 2 - SEDEX / 3 - Sem frete -->
                        <input type="hidden" name="shippingType" value="3">
                        <!-- Valor do frete -->
                        <input type="hidden" name="shippingCost" value="0.00">


                        <!-- atualiza a página -->
                        <input type="button" value="Atualizar" onClick="document.location.reload(true);">

                        <h4 class="mb-3">Escolha forma de pagamento</h4>

                        <div class="custom-control custom-radio">
                            <input type="radio" name="paymentMethod" class="custom-control-input" id="creditCard" value="creditCard" onclick="tipoPagamento('creditCard')">
                            <label class="custom-control-label" for="creditCard">Cartão de Crédito</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" name="paymentMethod" class="custom-control-input" id="boleto" value="boleto" onclick="tipoPagamento('boleto')">
                            <label class="custom-control-label" for="boleto">Boleto</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" name="paymentMethod" class="custom-control-input" id="eft" value="eft" onclick="tipoPagamento('eft')">
                            <label class="custom-control-label" for="eft">Débito Online</label>
                        </div>

                        <!-- Pagamento com débito online -->
                        <div class="mb-3 bankName">
                            <label class="custom-control" style="color: #0000FF">Opção: Débito Automático</label>
                            <hr />
                            <label class="bankName">Banco</label>
                            <select name="bankName" id="bankName" class="form-control select-bank-name bankName">

                            </select>
                        </div>
                        <!-- Cartão de crédito -->
                        <div class="creditCard">
                            <label style="color: #0000FF">Opção: Cartão de Crédito</label>
                            <hr />
                            <!-- Pagamento com cartão de crédito -->
                            <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">
                            <input type="hidden" name="valorParcelas" id="valorParcelas">
                            <input type="hidden" name="tokenCartao" id="tokenCartao">
                            <input type="hidden" name="hashCartao" id="hashCartao">

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Nº Cartão de Crédito</label>
                                <div class="input-group">
                                    <input type="text"  name="numCartao" class="form-control" id="numCartao">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bandeira-cartao creditCard">   </span>
                                    </div>
                                </div>
                                <small id="numCartao" class="form-text text-muted">
                                    16 digitos (ex: 4111.1111.1111.1111) - Preencha para ver o parcelamento
                                </small>
                            </div>

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Quantidades de Parcelas</label>
                                <select name="qntParcelas" id="qntParcelas" class="form-control select-qnt-parcelas creditCard">

                                </select>
                            </div>

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Nome do titular</label>
                                <input type="text" name="creditCardHolderName" class="form-control" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão" value="Jose Comprador">
                                <small id="creditCardHolderName" class="form-text text-muted">
                                    Como está gravado no cartão
                                </small>
                            </div>

                            <div class="row creditCard">
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Mês de Validade</label>
                                    <input type="text" name="mesValidade" id="mesValidade" maxlength="2" value="12"  class="form-control creditCard">
                                </div>
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Ano de Validade</label>
                                    <input type="text" name="anoValidade" id="anoValidade" maxlength="4" value="2030" class="form-control creditCard">
                                </div>
                            </div>

                            <div class="mb-3 creditCard">                            
                                <label class="creditCard">CVV do cartão</label>
                                <input type="text" name="numCartao" class="form-control creditCard" id="cvvCartao" maxlength="3" value="123">
                                <small id="cvvCartao" class="form-text text-muted creditCard">
                                    Código de 3 digitos impresso no verso do cartão
                                </small>
                            </div>

                            <div class="row creditCard">
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">CPF do dono do Cartão</label>
                                    <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" value="22111944785" class="form-control creditCard">
                                </div>
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Data de Nascimento</label>
                                    <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" value="27/10/1987" class="form-control creditCard">
                                </div>
                            </div>

                            <h4 class="mb-3 creditCard">Endereço do titular do cartão</h4>
                            <div class="row creditCard">
                                <div class="col-md-9 mb-3 creditCard">
                                    <label class="creditCard">Logradouro</label>
                                    <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" value="Av. Brig. Faria Lima" class="creditCard form-control">
                                </div>                            
                                <div class="col-md-3 mb-3 creditCard">
                                    <label class="creditCard">Número</label>
                                    <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" value="1384" class="creditCard form-control">
                                </div>
                            </div>
                            <div class="row creditCard">
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Bairro</label>
                                    <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro" value="Jardim Paulistano" class="creditCard form-control">
                                </div>
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Complemento</label>
                                    <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento" value="5o andar" class="creditCard form-control">
                                </div>
                            </div>
                            <div class="row creditCard">
                                <div class="col-md-4 mb-3 creditCard">
                                    <label class="creditCard">Estado</label>
                                    <select name="estadoCartao" class="custom-select d-block w-100" id="estadoCartao" onChange="estadoEnderecoCartao()" required>
                                        <option value="">Selecione</option>
                                    </select>
                                    <input type="hidden" name="billingAddressState" id="billingAddressState">
                                </div>
                                <div class="col-md-5 mb-3 creditCard">
                                    <label class="creditCard">Cidade</label>
                                    <select name="cidadeCartao" class="custom-select d-block w-100" id="cidadeCartao" onChange="cidadeEnderecoCartao()" required>
                                        <option value="">Selecione</option>
                                    </select>
                                    <input type="hidden" name="billingAddressCity" id="billingAddressCity">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="creditCard">CEP</label>
                                    <input type="text" name="billingAddressPostalCode" class="form-control creditCard" id="billingAddressPostalCode" placeholder="CEP sem traço" value="01452002">
                                </div>
                            </div>

                            <input type="hidden" name="billingAddressCountry" id="billingAddressCountry" value="BRL">
                            <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>">
                            <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>">
                            <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>">
                            <?php
                            $query_car = "SELECT SUM(valor_venda * qnt_produto) AS total_venda, carrinho_id FROM carrinhos_produtos WHERE carrinho_id = 1";

                            $resultado_car = $conn->prepare($query_car);
                            $resultado_car->execute();

                            $row_car = $resultado_car->fetch(PDO::FETCH_ASSOC);

                            $total_venda = number_format($row_car['total_venda'], 2, '.', '');
                            ?>

                            <input type="hidden" name="reference" id="reference" value="<?php echo $row_car['carrinho_id'] ?>">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $total_venda; ?>">
                            <input type="hidden" name="hashCartao" id="hashCartao">
                        </div>
                        <label class="boleto" style="color: #0000FF">Opção: Boleto Bancário</label>
                        <hr class="boleto"/>
                        <br />
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="submit" class="btn btn-outline-primary" name="btnComprar" id="btnComprar" value="Comprar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="<?php echo SCRIPT_PAGSEGURO; ?>"></script>
        <script src="js/personalizado.js"></script>
        <script src="js/funcoes.js"></script>
    </body>
</html>
