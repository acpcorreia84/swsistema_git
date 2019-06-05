function modalDuvida(valor,tela){
    //dados a enviar, vai buscar os valores dos campos que queremos enviar para a BD
    var dadosajax = {
        'edtModal' : valor,
        'edtTela' : tela
        
    };
    pageurl = 'inc/ajuda.php';
    //para consultar mais opcoes possiveis numa chamada ajax
    //http://api.jquery.com/jQuery.ajax/
    console.log(valor);
    $.ajax({

        //url da pagina
        url: pageurl,
        //parametros a passar
        data: dadosajax,
        //tipo: POST ou GET
        type: 'POST',
        //cache
        cache: false,
        //se ocorrer um erro na chamada ajax, retorna este alerta
        //possiveis erros: pagina nao existe, erro de codigo na pagina, falha de comunicacao/internet, etc etc etc
        error: function(){
            alert('Erro: Inserir Registo!!');
        },
        //retorna o resultado da pagina para onde enviamos os dados
        success: function(result){
            //se foi inserido com sucesso
            if($.trim(result) == '0'){
                alert("Ocorreu um erro ao inserir o seu registo!");
            }else{
                document.getElementById("ajudateste").innerHTML = result;
            }
        }
    });
}
