<html>
    <head>
        <title>Receita WS - API Test</title>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
        crossorigin="anonymous">
        <!--  -->
    </head>
    <body>
        <div class="row">
            <div class="col-md-4">
            </div>
            <!-- Centralização do formulário -->
            <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-md-12"><br><br>
                        <label>Informe o CNPJ</label>
                        <input type="text" onblur="checkCnpj(this.value)" data-mask="00.000.000/0000-00" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6"><br>
                        <label>Razão Social</label>
                        <input type="text" id="razaosocial" class="form-control" />
                    </div>
                    <div class="col-md-6"><br>
                        <label>Nome fantasia</label>
                        <input type="text" id="fantasia" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6"><br>
                        <label>Logadouro</label>
                        <input type="text" id="logradouro" class="form-control" />
                    </div>
                    <div class="col-md-6"><br>
                        <label>Número</label>
                        <input type="text" id="numero" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6"><br>
                        <label>Município</label>
                        <input type="text" id="municipio" class="form-control" />
                    </div>
                    <div class="col-md-6"><br>
                        <label>UF</label>
                        <input type="text" id="uf" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6"><br>
                        <label>Abertura</label>
                        <input type="text" data-mask="00/00/0000" id="abertura" class="form-control" />
                    </div>
                    <div class="col-md-6"><br>
                        <label>Tipo</label>
                        <input type="text" id="tipo" class="form-control" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6"><br>
                        <label>E-mail</label>
                        <input type="text" id="email" class="form-control" />
                    </div>
                    <div class="col-md-6"><br>
                        <label>Telefone</label>
                        <input type="text" data-mask="(00)00000-0000" id="telefone" class="form-control" />
                    </div>
                </div>
            </div>
            <!-- End form center -->
            <div class="col-md-4">
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <!-- JS Functions -->
        <script>
            function checkCnpj(cnpj) 
            {
                $.ajax ({
                    'url': 'https://www.receitaws.com.br/v1/cnpj/' + cnpj.replace(/[^0-9]/g, ''),
                    'type': "GET",
                    'dataType': 'jsonp',
                    'success': function(data) {
                        if(data.nome == undefined){
                            // alert(data.status + "O CNPJ informado não foi identificado!")
                            window.alert("O CNPJ informado não foi identificado!");
                        } else {
                            // console.log(dado);
                            document.getElementById('razaosocial').value = data.nome;
                            document.getElementById('fantasia').value = data.fantasia;
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('numero').value = data.numero;
                            document.getElementById('municipio').value = data.municipio;
                            document.getElementById('uf').value = data.uf;
                            document.getElementById('abertura').value = data.abertura;
                            document.getElementById('tipo').value = data.tipo;
                            document.getElementById('email').value = data.email;
                            document.getElementById('telefone').value = data.telefone;
                        }
                    }
                })
            }
        </script>
    </body>
</html>