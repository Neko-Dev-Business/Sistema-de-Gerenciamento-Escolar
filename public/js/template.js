
function controleTipo() {
    let cpf = document.getElementById("div-cpfPessoa")
    let cnpj = document.getElementById('div-cnpjPessoa')
    let rg = document.getElementById('div-rgPessoa')
    let dataNascimento = document.getElementById('div-dataNascimentoPessoa')
    let genero = document.getElementById('div-generoPessoa')
    let nacionalidade = document.getElementById('div-nacionalidadePessoa')
    let nomeMae = document.getElementById('div-nomeMaePessoa')
    let nomePai = document.getElementById('div-nomePaiPessoa')

    var tipoPessoa = document.getElementById("tipoPessoa").value;
    
    
    if (tipoPessoa == "J") {
        cpf.style.display = "none";
        rg.style.display = "none";
        dataNascimento.style.display = "none";
        genero.style.display = "none";
        nacionalidade.style.display = "none";
        nomeMae.style.display = "none";
        nomePai.style.display = "none";
        //cpf.required = false;
        cnpj.style.display = "block";
        //cnpj.required = true;
        


        cnpj.querySelector('input').required = true;
        
        cpf.querySelector('input').required = false;
        rg.querySelector('input').required = false;
        dataNascimento.querySelector('input').required = false;
        genero.querySelector('input').required = false;
        nacionalidade.querySelector('input').required = false;
        nomeMae.querySelector('input').required = false;
        nomePai.querySelector('input').required = false;

        //APAGAR CONTEÚDO DOS CAMPOS
        cpf.value=("");
        document.getElementById('nomePessoa').value=("");
        document.getElementById('telefonePessoa').value=("");
        document.getElementById('cepEndereco').value=("");
        document.getElementById('logradouroEndereco').value=("");
        document.getElementById('numeroEndereco').value=("");
        document.getElementById('complementoEndereco').value=("");
        document.getElementById('bairroEndereco').value=("");
        document.getElementById('cidadeEndereco').value=("");
        document.getElementById('ufEndereco').value=("");

    }
    else {
        cpf.style.display = "block";
        rg.style.display = "block";
        dataNascimento.style.display = "block";
        genero.style.display = "block";
        nacionalidade.style.display = "block";
        nomeMae.style.display = "block";
        nomePai.style.display = "block";
        //cpf.required = true;
        cnpj.style.display = "none";
        //cnpj.required = false;

        cnpj.querySelector('input').required = false;

        cpf.querySelector('input').required = true;
        rg.querySelector('input').required = true;
        dataNascimento.querySelector('input').required = true;
        genero.querySelector('input').required = true;
        nacionalidade.querySelector('input').required = true;
        nomeMae.querySelector('input').required = true;
        nomePai.querySelector('input').required = true;

        //APAGAR CONTEÚDO DOS CAMPOS
        cnpj.value=("");
        document.getElementById('nomePessoa').value=("");
        document.getElementById('telefonePessoa').value=("");
        document.getElementById('cepEndereco').value=("");
        document.getElementById('logradouroEndereco').value=("");
        document.getElementById('numeroEndereco').value=("");
        document.getElementById('complementoEndereco').value=("");
        document.getElementById('bairroEndereco').value=("");
        document.getElementById('cidadeEndereco').value=("");
        document.getElementById('ufEndereco').value=("");
    }
};

function controleTipoAoEntrarEdit() { 
    let cpf = document.getElementById("div-cpfPessoa")
    let cnpj = document.getElementById("div-cnpjPessoa")
    let tipoPessoa = document.getElementById("tipoPessoa").value;

    if (tipoPessoa == "J") {
        cnpj.style.display = "block";
        cnpj.required = true;
        cpf.style.display = "none";
        cpf.required = false;
    }
    else {
        cpf.style.display = "block";
        cpf.required = true;
        cnpj.style.display = "none";
        cnpj.required = false;
    }
}

/* WEBSERVICE ENDEREÇO */
function limpaFormularioCep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouroEndereco').value=("");
    document.getElementById('bairroEndereco').value=("");
    document.getElementById('cidadeEndereco').value=("");
    document.getElementById('ufEndereco').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouroEndereco').value=(conteudo.logradouro);
        document.getElementById('bairroEndereco').value=(conteudo.bairro);
        document.getElementById('cidadeEndereco').value=(conteudo.localidade);
        document.getElementById('ufEndereco').value=(conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpaFormularioCep();
        var aviso = document.getElementById('div-alert');
        aviso.style.display = "block";
        aviso.innerHTML = "CEP não encontrado.";
    }
}

function pesquisaCep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouroEndereco').value="...";
            document.getElementById('bairroEndereco').value="...";
            document.getElementById('cidadeEndereco').value="...";
            document.getElementById('ufEndereco').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpaFormularioCep();
            var aviso = document.getElementById('div-alert');
            aviso.style.display = "block";
            aviso.innerHTML = "Formato de CEP inválido.";
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpaFormularioCep();
    }
};

/* endWEBSERVICE ENDEREÇO */



/* WEBSERVICE CNPJ */
function limpaFormularioCNPJ() {
    //Limpa valores do formulário de CNPJ.
    document.getElementById('nomePessoa').value=("");
    document.getElementById('telefonePessoa').value=("");
    document.getElementById('cepEndereco').value=("");
    document.getElementById('logradouroEndereco').value=("");
    document.getElementById('numeroEndereco').value=("");
    document.getElementById('complementoEndereco').value=("");
    document.getElementById('bairroEndereco').value=("");
    document.getElementById('cidadeEndereco').value=("");
    document.getElementById('ufEndereco').value=("");
}

function meu_callback2(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('nomePessoa').value=(conteudo.nome);
        document.getElementById('telefonePessoa').value=(conteudo.telefone);
        document.getElementById('cepEndereco').value=(conteudo.cep);
        document.getElementById('numeroEndereco').value=(conteudo.numero);
        document.getElementById('logradouroEndereco').value=(conteudo.logradouro);
        document.getElementById('bairroEndereco').value=(conteudo.bairro);
        document.getElementById('cidadeEndereco').value=(conteudo.municipio);
        document.getElementById('ufEndereco').value=(conteudo.uf);
    } //end if.
    else {
        //CNPJ não Encontrado.
        limpaFormularioCNPJ();
        var aviso = document.getElementById('div-alert-2');
        aviso.style.display = "block";
        aviso.innerHTML = "CNPJ não encontrado.";
    }
}

function validarCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g,'');

    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}


function pesquisaCNPJ(cnpj) {

    //Nova variável "CNPJ" somente com dígitos.
    var cnpj = cnpj.replace(/[^\d]+/g,'');
    //Verifica se campo cep possui valor informado.
    if (cnpj != "") {
        if(validarCNPJ(cnpj)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('nomePessoa').value="...";
            document.getElementById('telefonePessoa').value="...";
            document.getElementById('cepEndereco').value="...";
            document.getElementById('numeroEndereco').value="...";
            document.getElementById('logradouroEndereco').value="...";
            // document.getElementById('complementoEndereco').value="...";
            document.getElementById('bairroEndereco').value="...";
            document.getElementById('cidadeEndereco').value="...";
            document.getElementById('ufEndereco').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://www.receitaws.com.br/v1/cnpj/'+ cnpj + '?callback=meu_callback2';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //CNPJ é inválido.
            limpaFormularioCNPJ();
            var aviso = document.getElementById('div-alert-2');
            aviso.style.display = "block";
            aviso.innerHTML = "Formato de CNPJ inválido.";
        }
    } //end if.
    else {
        //CNPJ sem valor, limpa formulário.
        limpaFormularioCNPJ();
    }
    /* MÁSCARAS */
    document.getElementById('cnpjPessoa').value=(cnpj.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5"));
    /* endMÁSCARAS */

};
/* endWEBSERVICE CNPJ */


