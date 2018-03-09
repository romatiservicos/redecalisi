// JavaScript Document

var date = new Date();
var d = date.getDate();
var m = date.getMonth() + 1;
var y = date.getFullYear();
var n = date.toISOString();
var tam = n.length - 5;
var agora = n.substring(0, tam);

//sequencia de comandos necess�ria para estrair a pasta raiz do endere�o,
//ou seja, qual m�dulo est� sendo utilizado (ex: salao, odonto, etc)
app = window.location.pathname;
app = app.substring(1);
pos = app.indexOf('/');
app = app.substring(0, pos);

//Captura a data do dia e carrega no campo correspondente
var currentDate = moment();

//vari�vel de op��es necess�ria para o funcionamento do datepiker em divs
//geradas dinamicamente
var dateTimePickerOptions = {
    tooltips: {
        today: 'Hoje',
        clear: 'Limpar sele��o',
        close: 'Fechar este menu',
        selectMonth: 'Selecione um m�s',
        prevMonth: 'M�s anterior',
        nextMonth: 'Pr�ximo m�s',
        selectYear: 'Selecione um ano',
        prevYear: 'Ano anterior',
        nextYear: 'Pr�ximo ano',
        selectDecade: 'Selecione uma d�cada',
        prevDecade: 'D�cada anterior',
        nextDecade: 'Pr�xima d�cada',
        prevCentury: 'Centen�rio anterior',
        nextCentury: 'Pr�ximo centen�rio',
        incrementHour: 'Aumentar hora',
        decrementHour: 'Diminuir hora',
        incrementMinute: 'Aumentar minutos',
        decrementMinute: 'Diminuir minutos',
        incrementSecond: 'Aumentar segundos',
        decrementSecond: 'Diminuir segundos'
    },
    showTodayButton: true,
    showClose: true,
    format: 'DD/MM/YYYY',
    //minDate: moment(m + '/' + d + '/' + y),
    locale: 'pt-br'
}

/*
 * Fun��o respons�vel por carregar valores nos respectivos campos do orcatrata
 * caso o bot�o Quitado seja alterado para SIM
 *
 * @param {int} quant
 * @param {string} campo
 * @param {int} num
 * @returns {decimal}
 */

 /*Carrega a Data do Dia do lan�amento*/
function carregaQuitado(value, name, i, cadastrar = 0) {

    if (value == "S") {

        if (!$("#ValorPagoRecebiveis"+i).val() || $("#ValorPagoRecebiveis"+i).val() == "0,00")
            $("#ValorPagoRecebiveis"+i).val($("#ValorParcelaRecebiveis"+i).val())

        if (!$("#DataPagoRecebiveis"+i).val()) {
            if (cadastrar == 1)
                $("#DataPagoRecebiveis"+i).val($("#DataVencimentoRecebiveis"+i).val())
            else
                $("#DataPagoRecebiveis"+i).val(currentDate.format('DD/MM/YYYY'))
        }


    }
    else {

        $("#ValorPagoRecebiveis"+i).val("")
        $("#DataPagoRecebiveis"+i).val("")

    }

}

/*Carrega a Data do Dia do Vencimento*/
function carregaQuitado2(value, name, i, cadastrar = 0) {

    if (value == "S") {

        if (!$("#ValorPagoRecebiveis"+i).val() || $("#ValorPagoRecebiveis"+i).val() == "0,00")
            $("#ValorPagoRecebiveis"+i).val($("#ValorParcelaRecebiveis"+i).val())

		if (!$("#DataPagoRecebiveis"+i).val()) {
            if (cadastrar == 1)
                $("#DataPagoRecebiveis"+i).val($("#DataVencimentoRecebiveis"+i).val())
            else
                $("#DataPagoRecebiveis"+i).val($("#DataVencimentoRecebiveis"+i).val())
        }

    }
    else {

        $("#ValorPagoRecebiveis"+i).val("")
        $("#DataPagoRecebiveis"+i).val("")

    }

}

/*
 * Fun��o respons�vel por carregar valores nos respectivos campos do despesas
 * caso o bot�o Quitado seja alterado para SIM
 *
 * @param {int} quant
 * @param {string} campo
 * @param {int} num
 * @returns {decimal}
 */

 /*Carrega a Data do Dia do lan�amento*/
function carregaQuitadoDespesas(value, name, i, cadastrar = 0) {

    if (value == "S") {

        if (!$("#ValorPagoPagaveis"+i).val() || $("#ValorPagoPagaveis"+i).val() == "0,00")
            $("#ValorPagoPagaveis"+i).val($("#ValorParcelaPagaveis"+i).val())

		if (!$("#DataPagoPagaveis"+i).val()) {
            if (cadastrar == 1)
                $("#DataPagoPagaveis"+i).val($("#DataVencimentoPagaveis"+i).val())
            else
                $("#DataPagoPagaveis"+i).val(currentDate.format('DD/MM/YYYY'))
        }

    }
    else {

        $("#ValorPagoPagaveis"+i).val("")
        $("#DataPagoPagaveis"+i).val("")

    }

}

/*Carrega a Data do Dia do Vencimento*/
function carregaQuitadoDespesas2(value, name, i, cadastrar = 0) {

    if (value == "S") {

        if (!$("#ValorPagoPagaveis"+i).val() || $("#ValorPagoPagaveis"+i).val() == "0,00")
            $("#ValorPagoPagaveis"+i).val($("#ValorParcelaPagaveis"+i).val())

		if (!$("#DataPagoPagaveis"+i).val()) {
            if (cadastrar == 1)
                $("#DataPagoPagaveis"+i).val($("#DataVencimentoPagaveis"+i).val())
            else
                $("#DataPagoPagaveis"+i).val($("#DataVencimentoPagaveis"+i).val())
        }

    }
    else {

        $("#ValorPagoPagaveis"+i).val("")
        $("#DataPagoPagaveis"+i).val("")

    }

}

/*
 * Fun��o respons�vel por aplicar a m�scara de valor real com separa��o de
 * decimais e milhares.
 *
 * @param {float} value
 * @returns {decimal}
 */
function mascaraValorReal(value) {

    var r;

    r = value.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    r = r.replace(/[,.]/g, function (m) {
        // m is the match found in the string
        // If `,` is matched return `.`, if `.` matched return `,`
        return m === ',' ? '.' : ',';
    });

    return r;

}

/*
 * Fun��o respons�vel por calcular o subtotal dos campos de produto
 *
 * @param {int} quant
 * @param {string} campo
 * @param {int} num
 * @returns {decimal}
 */
function calculaResta(entrada) {

    //recebe o valor do or�amento
    var orcamento = $("#ValorOrca").val();
    var resta = (orcamento.replace(".","").replace(",",".") - entrada.replace(".","").replace(",","."));

    resta = mascaraValorReal(resta);

    //o valor � escrito no seu campo no formul�rio
    $('#ValorRestanteOrca').val(resta);

}

function calculaRestaDespesas(entrada) {

    //recebe o valor da despesa
    var despesa = $("#ValorDespesas").val();
    var resta = (despesa.replace(".","").replace(",",".") - entrada.replace(".","").replace(",","."));

    resta = mascaraValorReal(resta);

    //o valor � escrito no seu campo no formul�rio
    $('#ValorRestanteDespesas').val(resta);

}

function calculaRestaConsumo(entrada) {

    //recebe o valor da despesa
    var despesa = $("#ValorConsumo").val();
    var resta = (despesa.replace(".","").replace(",",".") - entrada.replace(".","").replace(",","."));

    resta = mascaraValorReal(resta);

    //o valor � escrito no seu campo no formul�rio
    $('#ValorRestanteConsumo').val(resta);

}

/*
$(document).on('focus',".input_fields_parcelas", function(){
    $(this).datepicker();
});
*/
/*
 * Fun��o respons�vel por calcular as parcelas do or�amento em fun��o do dados
 * informados no formul�rio (valor restante / parcelas e datas do vencimento)
 */
function calculaParcelas() {

    //captura os valores dos campos indicados
    var resta = $("#ValorRestanteOrca").val();
    var parcelas = $("#QtdParcelasOrca").val();
    var vencimento = $("#DataVencimentoOrca").val();

    //valor de cada parcela
    var parcorca = (resta.replace(".","").replace(",",".") / parcelas);
    parcorca = mascaraValorReal(parcorca);

    //pega a data do primeiro vencimento e separa em dia, m�s e ano
    var split = vencimento.split("/");

    //define a data do primeiro vencimento no formato do momentjs
    var currentDate = moment(split[2]+'-'+split[1]+'-'+split[0]);

    //console.log(currentDate.format('DD-MM-YYYY'));
    //console.log(futureMonth.format('DD-MM-YYYY'));
    //alert('>>v '+vencimento+'::d1 '+currentDate.format('DD/MM/YYYY')+'::d2 '+futureMonth.format('DD/MM/YYYY')+'::d3 '+futureMonthEnd.format('DD/MM/YYYY')+'<<');

    //caso as parcelas j� tenham sido geradas elas ser�o exclu�das para que
    //sejam geradas novas parcelas
    $(".input_fields_parcelas").empty();

    //gera os campos de parcelas
    for (i=1; i<=parcelas; i++) {

        //calcula as datas das pr�ximas parcelas
        var futureMonth = moment(currentDate).add(i-1, 'M');
        var futureMonthEnd = moment(futureMonth).endOf('month');

        if(currentDate.date() != futureMonth.date() && futureMonth.isSame(futureMonthEnd.format('YYYY-MM-DD')))
            futureMonth = futureMonth.add(i-1, 'd');

        $(".input_fields_parcelas").append('\
            <div class="form-group">\
				<div class="panel panel-info">\
					<div class="panel-heading">\
						<div class="row">\
							<div class="col-md-2">\
								<label for="ParcelaRecebiveis">Parcela:</label><br>\
								<input type="text" class="form-control" maxlength="6" readonly=""\
									   name="ParcelaRecebiveis'+i+'" value="'+i+'/'+parcelas+'">\
							</div>\
							<div class="col-md-2">\
								<label for="ValorParcelaRecebiveis">Valor Parcela:</label><br>\
								<div class="input-group" id="txtHint">\
									<span class="input-group-addon" id="basic-addon1">R$</span>\
									<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00"\
										    id="ValorParcelaRecebiveis'+i+'" name="ValorParcelaRecebiveis'+i+'" value="'+parcorca+'">\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="DataVencimentoRecebiveis">Data Venc. Parc.</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" id="DataVencimentoRecebiveis'+i+'" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataVencimentoRecebiveis'+i+'" value="'+futureMonth.format('DD/MM/YYYY')+'">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="ValorPagoRecebiveis">Valor Pago:</label><br>\
								<div class="input-group" id="txtHint">\
									<span class="input-group-addon" id="basic-addon1">R$</span>\
									<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00"\
										    id="ValorPagoRecebiveis'+i+'" name="ValorPagoRecebiveis'+i+'" value="">\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="DataPagoRecebiveis">Data Pag.</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" id="DataPagoRecebiveis'+i+'" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataPagoRecebiveis'+i+'" value="">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="QuitadoRecebiveis">Quitado????</label><br>\
								<div class="form-group">\
									<div class="btn-group" data-toggle="buttons">\
										<label class="btn btn-warning active" name="radio_QuitadoRecebiveis'+i+'" id="radio_QuitadoRecebiveis'+i+'N">\
										<input type="radio" name="QuitadoRecebiveis'+i+'" id="radiogeraldinamico"\
											onchange="carregaQuitado(this.value,this.name,'+i+',1)" autocomplete="off" value="N" checked>N�o\
										</label>\
										<label class="btn btn-default" name="radio_QuitadoRecebiveis'+i+'" id="radio_QuitadoRecebiveis'+i+'S">\
										<input type="radio" name="QuitadoRecebiveis'+i+'" id="radiogeraldinamico"\
											onchange="carregaQuitado(this.value,this.name,'+i+',1)" autocomplete="off" value="S">Sim\
										</label>\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>\
			</div>'
        );

    }
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //permite o uso de radio buttons nesse bloco din�mico
    $('input:radio[id="radiogeraldinamico"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        //console.log(value + ' <<>> ' + name);

        $('label[name="radio_' + name + '"]').removeClass();
        $('label[name="radio_' + name + '"]').addClass("btn btn-default");
        $('#radio_' + name + value).addClass("btn btn-warning active");
        //$('#radiogeral'+ value).addClass("btn btn-warning active");

    });
}

/*
 * Fun��o respons�vel por calcular as parcelas PAGAVEIS do or�amento em fun��o do dados
 * informados no formul�rio (valor restante / parcelas e datas do vencimento)
 */
function calculaParcelasPagaveis() {

    //captura os valores dos campos indicados
    var resta = $("#ValorRestanteDespesas").val();
    var parcelas = $("#QtdParcelasDespesas").val();
    var vencimento = $("#DataVencimentoDespesas").val();

    //valor de cada parcela
    var parcdesp = (resta.replace(".","").replace(",",".") / parcelas);
    parcdesp = mascaraValorReal(parcdesp);

    //pega a data do primeiro vencimento e separa em dia, m�s e ano
    var split = vencimento.split("/");

    //define a data do primeiro vencimento no formato do momentjs
    var currentDate = moment(split[2]+'-'+split[1]+'-'+split[0]);

    //console.log(currentDate.format('DD-MM-YYYY'));
    //console.log(futureMonth.format('DD-MM-YYYY'));
    //alert('>>v '+vencimento+'::d1 '+currentDate.format('DD/MM/YYYY')+'::d2 '+futureMonth.format('DD/MM/YYYY')+'::d3 '+futureMonthEnd.format('DD/MM/YYYY')+'<<');

    //caso as parcelas j� tenham sido geradas elas ser�o exclu�das para que
    //sejam geradas novas parcelas
    $(".input_fields_parcelas").empty();

    //gera os campos de parcelas
    for (i=1; i<=parcelas; i++) {

        //calcula as datas das pr�ximas parcelas
        var futureMonth = moment(currentDate).add(i-1, 'M');
        var futureMonthEnd = moment(futureMonth).endOf('month');

        if(currentDate.date() != futureMonth.date() && futureMonth.isSame(futureMonthEnd.format('YYYY-MM-DD')))
            futureMonth = futureMonth.add(i-1, 'd');

        $(".input_fields_parcelas").append('\
			<div class="form-group">\
				<div class="panel panel-danger">\
					<div class="panel-heading">\
						<div class="row">\
							<div class="col-md-2">\
								<label for="ParcelaPagaveis">Parcela:</label><br>\
								<input type="text" class="form-control" maxlength="6" readonly=""\
									   name="ParcelaPagaveis'+i+'" value="'+i+'/'+parcelas+'">\
							</div>\
							<div class="col-md-2">\
								<label for="ValorParcelaPagaveis">Valor Parcela:</label><br>\
								<div class="input-group" id="txtHint">\
									<span class="input-group-addon" id="basic-addon1">R$</span>\
									<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00"\
										    id="ValorParcelaPagaveis'+i+'" name="ValorParcelaPagaveis'+i+'" value="'+parcdesp+'">\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="DataVencimentoPagaveis">Data Venc. Parc.</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" id="DataVencimentoPagaveis'+i+'" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataVencimentoPagaveis'+i+'" value="'+futureMonth.format('DD/MM/YYYY')+'">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="ValorPagoPagaveis">Valor Pago:</label><br>\
								<div class="input-group" id="txtHint">\
									<span class="input-group-addon" id="basic-addon1">R$</span>\
									<input type="text" class="form-control Valor" maxlength="10" placeholder="0,00"\
										    id="ValorPagoPagaveis'+i+'" name="ValorPagoPagaveis'+i+'" value="">\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="DataPagoPagaveis">Data Pag.</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" id="DataPagoPagaveis'+i+'" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataPagoPagaveis'+i+'" value="">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-2">\
								<label for="QuitadoPagaveis">Quitado?</label><br>\
								<div class="form-group">\
									<div class="btn-group" data-toggle="buttons">\
										<label class="btn btn-warning active" name="radio_QuitadoPagaveis'+i+'" id="radio_QuitadoPagaveis'+i+'N">\
										<input type="radio" name="QuitadoPagaveis'+i+'" id="radiogeraldinamico"\
											onchange="carregaQuitadoDespesas(this.value,this.name,'+i+',1)" autocomplete="off" value="N" checked>N�o\
										</label>\
										<label class="btn btn-default" name="radio_QuitadoPagaveis'+i+'" id="radio_QuitadoPagaveis'+i+'S">\
										<input type="radio" name="QuitadoPagaveis'+i+'" id="radiogeraldinamico"\
											onchange="carregaQuitadoDespesas(this.value,this.name,'+i+',1)" autocomplete="off" value="S">Sim\
										</label>\
									</div>\
								</div>\
							</div>\
						</div>\
					</div>\
				</div>\
			</div>'
        );

    }
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //permite o uso de radio buttons nesse bloco din�mico
    $('input:radio[id="radiogeraldinamico"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        //console.log(value + ' <<>> ' + name);

        $('label[name="radio_' + name + '"]').removeClass();
        $('label[name="radio_' + name + '"]').addClass("btn btn-default");
        $('#radio_' + name + value).addClass("btn btn-warning active");
        //$('#radiogeral'+ value).addClass("btn btn-warning active");

    });
}


/*
 * Fun��o respons�vel por adicionar novos campos de Procedimento dinamicamente no
 * formul�rio de or�amento/tratametno
 */
function adicionaProcedimento() {

    var pc = $("#PMCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    pc++; //text box increment
    $("#PMCount").val(pc);
    //console.log(pc);

    if (pc >= 2) {
        //console.log( $("#listadinamicac"+(pc-1)).val() );
        var chosen;
        chosen = $("#listadinamicac"+(pc-1)).val();
        //console.log( chosen + ' :: ' + pc );
    }

    //Captura a data do dia e carrega no campo correspondente
    var currentDate = moment();

    $(".input_fields_wrap3").append('\
        <div class="form-group" id="3div'+pc+'">\
			<div class="panel panel-info">\
				<div class="panel-heading">\
					<div class="row">\
						<div class="col-md-4">\
							<label for="Procedimento'+pc+'">Procedimento:</label>\
							<textarea class="form-control" id="Procedimento'+pc+'"\
									  name="Procedimento'+pc+'"></textarea>\
						</div>\
						<div class="col-md-3">\
							<label for="DataProcedimento'+pc+'">Data do Proced.:</label>\
							<div class="input-group DatePicker">\
								<input type="text" class="form-control Date" maxlength="10" placeholder="DD/MM/AAAA"\
									   name="DataProcedimento'+pc+'" value="'+currentDate.format('DD/MM/YYYY')+'">\
								<span class="input-group-addon" disabled>\
									<span class="glyphicon glyphicon-calendar"></span>\
								</span>\
							</div>\
						</div>\
						<div class="col-md-3">\
							<label for="ConcluidoProcedimento">Proc. Concl.? </label><br>\
							<div class="form-group">\
								<div class="btn-group" data-toggle="buttons">\
									<label class="btn btn-warning active" name="radio_ConcluidoProcedimento'+pc+'" id="radio_ConcluidoProcedimento'+pc+'N">\
									<input type="radio" name="ConcluidoProcedimento'+pc+'" id="radiogeraldinamico"\
										autocomplete="off" value="N" checked>N�o\
									</label>\
									<label class="btn btn-default" name="radio_ConcluidoProcedimento'+pc+'" id="radio_ConcluidoProcedimento'+pc+'S">\
									<input type="radio" name="ConcluidoProcedimento'+pc+'" id="radiogeraldinamico"\
										autocomplete="off" value="S">Sim\
									</label>\
								</div>\
							</div>\
						</div>\
						<div class="col-md-2">\
							<label><br></label><br>\
							<button type="button" id="'+pc+'" class="remove_field3 btn btn-danger">\
								<span class="glyphicon glyphicon-trash"></span>\
							</button>\
						</div>\
					</div>\
				</div>\
			</div>\
        </div>'
    ); //add input box
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //get a reference to the select element
    $select = $('#listadinamicac'+pc);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=3',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                if (val.id == chosen)
                    $select.append('<option value="' + val.id + '" selected="selected">' + val.name + '</option>');
                else
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaB');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

}

/*
 * Fun��o respons�vel por adicionar novos campos de Procedtarefa dinamicamente no
 * formul�rio de tarefa
 */
function adicionaProcedtarefa() {

    var pt = $("#PTCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    pt++; //text box increment
    $("#PTCount").val(pt);
    //console.log(pt);

    if (pt >= 2) {
        //console.log( $("#listadinamicad"+(pt-1)).val() );
        var chosen;
        chosen = $("#listadinamicad"+(pt-1)).val();
        //console.log( chosen + ' :: ' + pt );
    }

    //Captura a data do dia e carrega no campo correspondente
    var currentDate = moment();

    $(".input_fields_wrap3").append('\
        <div class="form-group" id="3div'+pt+'">\
			<div class="panel panel-info">\
				<div class="panel-heading">\
					<div class="row">\
						<div class="col-md-4">\
							<label for="Procedtarefa'+pt+'">A��o:</label>\
							<textarea class="form-control" id="Procedtarefa'+pt+'"\
									  name="Procedtarefa'+pt+'"></textarea>\
						</div>\
						<div class="col-md-3">\
							<label for="DataProcedtarefa'+pt+'">Data da A��o:</label>\
							<div class="input-group DatePicker">\
								<input type="text" class="form-control Date" maxlength="10" placeholder="DD/MM/AAAA"\
									   name="DataProcedtarefa'+pt+'" value="'+currentDate.format('DD/MM/YYYY')+'">\
								<span class="input-group-addon" disabled>\
									<span class="glyphicon glyphicon-calendar"></span>\
								</span>\
							</div>\
						</div>\
						<div class="col-md-3">\
							<label for="ConcluidoProcedtarefa">A��o Concl.? </label><br>\
							<div class="form-group">\
								<div class="btn-group" data-toggle="buttons">\
									<label class="btn btn-warning active" name="radio_ConcluidoProcedtarefa'+pt+'" id="radio_ConcluidoProcedtarefa'+pt+'N">\
									<input type="radio" name="ConcluidoProcedtarefa'+pt+'" id="radiogeraldinamico"\
										autocomplete="off" value="N" checked>N�o\
									</label>\
									<label class="btn btn-default" name="radio_ConcluidoProcedtarefa'+pt+'" id="radio_ConcluidoProcedtarefa'+pt+'S">\
									<input type="radio" name="ConcluidoProcedtarefa'+pt+'" id="radiogeraldinamico"\
										autocomplete="off" value="S">Sim\
									</label>\
								</div>\
							</div>\
						</div>\
						<div class="col-md-2">\
							<label><br></label><br>\
							<button type="button" id="'+pt+'" class="remove_field3 btn btn-danger">\
								<span class="glyphicon glyphicon-trash"></span>\
							</button>\
						</div>\
					</div>\
				</div>\
			</div>\
        </div>'
    ); //add input box
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //get a reference to the select element
    $select = $('#listadinamicad'+pt);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=3',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                if (val.id == chosen)
                    $select.append('<option value="' + val.id + '" selected="selected">' + val.name + '</option>');
                else
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaB');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

}

function adicionaValor() {

    var pt = $("#PTCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    pt++; //text box increment
    $("#PTCount").val(pt);
    //console.log(pt);

    if (pt >= 2) {
        //console.log( $("#listadinamicad"+(pt-1)).val() );
        var chosen;
        chosen = $("#listadinamicad"+(pt-1)).val();
        //console.log( chosen + ' :: ' + pt );
    }

    //Captura a data do dia e carrega no campo correspondente
    var currentDate = moment();

    $(".input_fields_wrap3").append('\
        <div class="form-group" id="3div'+pt+'">\
			<div class="panel panel-info">\
				<div class="panel-heading">\
					<div class="row">\
						<div class="col-md-4">\
							<label for="Convenio'+pt+'">Tabelas & Planos:</label>\
							<select data-placeholder="Selecione uma op��o..." class="form-control"\
									 id="listadinamicad'+pt+'" name="Convenio'+pt+'">\
								<option value="">-- Selecione uma op��o --</option>\
							</select>\
						</div>\
						<div class="col-md-4">\
							<label for="Convdesc'+pt+'">Descri��o:</label>\
							<input type="text" class="form-control" id="Convdesc'+pt+'"\
									  name="Convdesc'+pt+'" value="">\
						</div>\
						<div class="col-md-3">\
							<label for="ValorVendaProduto'+pt+'">Valor Venda:</label><br>\
							<div class="input-group id="ValorVendaProduto'+pt+'">\
								<span class="input-group-addon" id="basic-addon1">R$</span>\
								<input type="text" class="form-control Valor" id="ValorVendaProduto'+pt+'" maxlength="10" placeholder="0,00" \
									name="ValorVendaProduto'+pt+'" value="">\
							</div>\
						</div>\
						<div class="col-md-1">\
							<label><br></label><br>\
							<button type="button" id="'+pt+'" class="remove_field3 btn btn-danger">\
								<span class="glyphicon glyphicon-trash"></span>\
							</button>\
						</div>\
					</div>\
				</div>\
			</div>\
        </div>'
    ); //add input box
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //get a reference to the select element
    $select = $('#listadinamicad'+pt);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=4',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                if (val.id == chosen)
                    $select.append('<option value="' + val.id + '" selected="selected">' + val.name + '</option>');
                else
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaB');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

}

function adicionaValorServ() {

    var pt = $("#PTCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    pt++; //text box increment
    $("#PTCount").val(pt);
    //console.log(pt);

    if (pt >= 2) {
        //console.log( $("#listadinamicad"+(pt-1)).val() );
        var chosen;
        chosen = $("#listadinamicad"+(pt-1)).val();
        //console.log( chosen + ' :: ' + pt );
    }

    //Captura a data do dia e carrega no campo correspondente
    var currentDate = moment();

    $(".input_fields_wrap3").append('\
        <div class="form-group" id="3div'+pt+'">\
			<div class="panel panel-info">\
				<div class="panel-heading">\
					<div class="row">\
						<div class="col-md-4">\
							<label for="Convenio'+pt+'">Plano:</label>\
							<select data-placeholder="Selecione uma op��o..." class="form-control"\
									 id="listadinamicad'+pt+'" name="Convenio'+pt+'">\
								<option value="">-- Selecione uma op��o --</option>\
							</select>\
						</div>\
						<div class="col-md-3">\
							<label for="ValorVendaServico'+pt+'">Valor Venda:</label><br>\
							<div class="input-group id="ValorVendaServico'+pt+'">\
								<span class="input-group-addon" id="basic-addon1">R$</span>\
								<input type="text" class="form-control Valor" id="ValorVendaServico'+pt+'" maxlength="10" placeholder="0,00" \
									name="ValorVendaServico'+pt+'" value="">\
							</div>\
						</div>\
						<div class="col-md-1">\
							<label><br></label><br>\
							<button type="button" id="'+pt+'" class="remove_field3 btn btn-danger">\
								<span class="glyphicon glyphicon-trash"></span>\
							</button>\
						</div>\
					</div>\
				</div>\
			</div>\
        </div>'
    ); //add input box
    //habilita o bot�o de calend�rio ap�s a gera��o dos campos din�micos
    $('.DatePicker').datetimepicker(dateTimePickerOptions);

    //get a reference to the select element
    $select = $('#listadinamicad'+pt);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=4',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                if (val.id == chosen)
                    $select.append('<option value="' + val.id + '" selected="selected">' + val.name + '</option>');
                else
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaB');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

}

 /*
  * Fun��o criada para funcionar junto com o recurso de hide/show do jquery nos
  * casos de radio button, que exigem um tratamento especial para funcionar
  * corretamente
  *
  * @param {string} campo
  * @param {string} hideshow
  */
 function radioButtonColorNS(campo, hideshow) {

     if (hideshow == 'showradio') {
        active = 'showradio';
        not = 'hideradio';
     } else {
        active = 'hideradio';
        not = 'showradio';
     }

     $('label[name="' + campo + '_' + not + '"]').removeClass();
     $('label[name="' + campo + '_' + not + '"]').addClass("btn btn-default");

     $('label[name="' + campo + '_' + active + '"]').removeClass();
     $('label[name="' + campo + '_' + active + '"]').addClass("btn btn-warning active");

 }

/*
 * Fun��o respons�vel por capturar o servi�o/produto selecionado e buscar seu valor
 * correspondente no arquivo Valor_json.php. Ap�s obter o valor ele �
 * aplicado no campo de Valor correspondente.
 *
 * @param {int} id
 * @param {string} campo
 * @param {string} tabela
 * @returns {decimal}
 */
function buscaValor(id, campo, tabela, num, campo2) {

    $.ajax({
        // url para o arquivo json.php
        url: window.location.origin + "/" + app + "/Valor_json.php?tabela=" + tabela,
        // dataType json
        dataType: "json",
        // fun��o para de sucesso
        success: function (data) {

            // executo este la�o para acessar os itens do objeto javaScript
            for (i = 0; i < data.length; i++) {

                if (data[i].id == id) {

                    //carrega o valor no campo de acordo com a op��o selecionada
                    $('#'+campo).val(data[i].valor);

                    //if (tabela == area && $("#QtdVenda"+tabela+num).val()) {
                    if ($("#QtdVenda"+tabela+num).val()) {
                        calculaSubtotal($("#idTab_"+tabela+num).val(),$("#QtdVenda"+tabela+num).val(),num,'OUTRO',tabela);
                        break;
                    }

                    //para cada valor carregado o or�amento � calculado/atualizado
                    //atrav�s da chamada de sua fun��o
                    calculaOrcamento();
                    break;
                }

            }//fim do la�o

        }
    });//termina o ajax


}

function buscaValor2Tabelas(id, campo, tabela, num, campo2) {

    $.ajax({
        // url para o arquivo json.php
        url: window.location.origin + "/" + app + "/Valor_json.php?tabela=" + tabela + "&campo2=" + campo2,
        // dataType json
        dataType: "json",
        // fun��o para de sucesso
        success: function (data) {

            // executo este la�o para acessar os itens do objeto javaScript
            for (i = 0; i < data.length; i++) {

                if (data[i].id == id) {

                    //carrega o valor no campo de acordo com a op��o selecionada
                    $('#'+campo).val(data[i].valor);

                    //if (tabela == area && $("#QtdVenda"+tabela+num).val()) {
                    if ($("#QtdVenda"+campo2+num).val()) {
                        calculaSubtotal($("#idTab_"+campo2+num).val(),$("#QtdVenda"+campo2+num).val(),num,'OUTRO',campo2);
                        break;
                    }

                    //para cada valor carregado o or�amento � calculado/atualizado
                    //atrav�s da chamada de sua fun��o
                    calculaOrcamento();
                    break;
                }

            }//fim do la�o

        }
    });//termina o ajax


}


function buscaValorCompra(id, campo, tabela, num) {

    $.ajax({
        // url para o arquivo json.php
        url: window.location.origin + "/" + app + "/ValorCompra_json.php?tabela=" + tabela,
        // dataType json
        dataType: "json",
        // fun��o para de sucesso
        success: function (data) {

            // executo este la�o para acessar os itens do objeto javaScript
            for (i = 0; i < data.length; i++) {

                if (data[i].id == id) {

                    //carrega o valor no campo de acordo com a op��o selecionada
                    $('#'+campo).val(data[i].valor);

                    //if (tabela == area && $("#QtdCompra"+tabela+num).val()) {
                    if ($("#QtdCompra"+tabela+num).val()) {
                        calculaSubtotalCompra($("#idTab_"+tabela+num).val(),$("#QtdCompra"+tabela+num).val(),num,'OUTRO',tabela);
                        break;
                    }

                    //para cada valor carregado a despesa � calculado/atualizado
                    //atrav�s da chamada de sua fun��o
                    calculaDespesas();
                    break;
                }

            }//fim do la�o

        }
    });//termina o ajax


}

function buscaValorConsumo(id, campo, tabela, num) {

    $.ajax({
        // url para o arquivo json.php
        url: window.location.origin + "/" + app + "/ValorConsumo_json.php?tabela=" + tabela,
        // dataType json
        dataType: "json",
        // fun��o para de sucesso
        success: function (data) {

            // executo este la�o para acessar os itens do objeto javaScript
            for (i = 0; i < data.length; i++) {

                if (data[i].id == id) {

                    //carrega o valor no campo de acordo com a op��o selecionada
                    $('#'+campo).val(data[i].valor);

                    //if (tabela == area && $("#QtdCompra"+tabela+num).val()) {
                    if ($("#QtdConsumo"+tabela+num).val()) {
                        calculaSubtotalConsumo($("#idTab_"+tabela+num).val(),$("#QtdConsumo"+tabela+num).val(),num,'OUTRO',tabela);
                        break;
                    }

                    //para cada valor carregado a despesa � calculado/atualizado
                    //atrav�s da chamada de sua fun��o
                    calculaConsumo();
                    break;
                }

            }//fim do la�o

        }
    });//termina o ajax


}

/*
 * Fun��o respons�vel por calcular o subtotal dos campos de produto
 *
 * @param {int} quant
 * @param {string} campo
 * @param {int} num
 * @returns {decimal}
 */
function calculaSubtotal(valor, campo, num, tipo, tabela) {

    if (tipo == 'VP') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#QtdVenda"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * data);
        //alert('>>>'+valor+' :: '+campo+' :: '+num+' :: '+tipo+'<<<');
    } else if (tipo == 'QTD') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#idTab_"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor * data.replace(".","").replace(",","."));
    } else {
        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * campo.replace(".","").replace(",","."));
    }

    subtotal = mascaraValorReal(subtotal);
    //o subtotal � escrito no seu campo no formul�rio
    $('#Subtotal'+tabela+num).val(subtotal);

    //para cada vez que o subtotal for calculado o or�amento e o total restante
    //tamb�m ser�o atualizados
    calculaOrcamento();

}

function calculaSubtotalCompra(valor, campo, num, tipo, tabela) {

    if (tipo == 'VP') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#QtdCompra"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * data);
        //alert('>>>'+valor+' :: '+campo+' :: '+num+' :: '+tipo+'<<<');
    } else if (tipo == 'QTD') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#idTab_"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor * data.replace(".","").replace(",","."));
    } else {
        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * campo.replace(".","").replace(",","."));
    }

    subtotal = mascaraValorReal(subtotal);
    //o subtotal � escrito no seu campo no formul�rio
    $('#Subtotal'+tabela+num).val(subtotal);

    //para cada vez que o subtotal for calculado o or�amento e o total restante
    //tamb�m ser�o atualizados
    calculaDespesas();

}

function calculaSubtotalConsumo(valor, campo, num, tipo, tabela) {

    if (tipo == 'VP') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#QtdConsumo"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * data);
        //alert('>>>'+valor+' :: '+campo+' :: '+num+' :: '+tipo+'<<<');
    } else if (tipo == 'QTD') {
        //vari�vel valor recebe o valor do produto selecionado
        var data = $("#idTab_"+tabela+num).val();

        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor * data.replace(".","").replace(",","."));
    } else {
        //o subtotal � calculado como o produto da quantidade pelo seu valor
        var subtotal = (valor.replace(".","").replace(",",".") * campo.replace(".","").replace(",","."));
    }

    subtotal = mascaraValorReal(subtotal);
    //o subtotal � escrito no seu campo no formul�rio
    $('#Subtotal'+tabela+num).val(subtotal);

    //para cada vez que o subtotal for calculado o or�amento e o total restante
    //tamb�m ser�o atualizados
    calculaConsumo();

}

/*
 * Fun��o respons�vel por calcular o or�amento total
 *
 * @returns {int}
 */
function calculaOrcamento() {

    //captura o n�mero incrementador do formul�rio, que controla quantos campos
    //foram acrescidos tanto para servi�os quanto para produtos
    var sc = parseFloat($('#SCount').val().replace(".","").replace(",","."));
    var pc = parseFloat($('#PCount').val().replace(".","").replace(",","."));
    //define o subtotal inicial em 0.00
    var subtotal = 0.00;

    //vari�vel incrementadora
    var i = 0;
    //percorre todos os campos de servi�o, somando seus valores
    while (i <= sc) {

        //soma os valores apenas dos campos que existirem, o que forem apagados
        //ou removidos s�o ignorados
        if ($('#SubtotalServico'+i).val())
            //subtotal += parseFloat($('#idTab_Servico'+i).val().replace(".","").replace(",","."));
            subtotal += parseFloat($('#SubtotalServico'+i).val().replace(".","").replace(",","."));

        //incrementa a vari�vel i
        i++;
    }

    //faz o mesmo que o la�o anterior mas agora para produtos
    var i = 0;
    while (i <= pc) {

        if ($('#SubtotalProduto'+i).val())
            subtotal += parseFloat($('#SubtotalProduto'+i).val().replace(".","").replace(",","."));

        i++;
    }

    //calcula o subtotal, configurando para duas casas decimais e trocando o
    //ponto para o v�rgula como separador de casas decimais
    subtotal = mascaraValorReal(subtotal);

    //escreve o subtotal no campo do formul�rio
    $('#ValorOrca').val(subtotal);
    calculaResta($("#ValorEntradaOrca").val());
}

function calculaDespesas() {

    //captura o n�mero incrementador do formul�rio, que controla quantos campos
    //foram acrescidos tanto para servi�os quanto para produtos
    var sc = parseFloat($('#SCount').val().replace(".","").replace(",","."));
    var pc = parseFloat($('#PCount').val().replace(".","").replace(",","."));
    //define o subtotal inicial em 0.00
    var subtotal = 0.00;

    //vari�vel incrementadora
    var i = 0;
    //percorre todos os campos de servi�o, somando seus valores
    while (i <= sc) {

        //soma os valores apenas dos campos que existirem, o que forem apagados
        //ou removidos s�o ignorados
        if ($('#SubtotalServico'+i).val())
            //subtotal += parseFloat($('#idTab_Servico'+i).val().replace(".","").replace(",","."));
            subtotal += parseFloat($('#SubtotalServico'+i).val().replace(".","").replace(",","."));

        //incrementa a vari�vel i
        i++;
    }

    //faz o mesmo que o la�o anterior mas agora para produtos
    var i = 0;
    while (i <= pc) {

        if ($('#SubtotalProduto'+i).val())
            subtotal += parseFloat($('#SubtotalProduto'+i).val().replace(".","").replace(",","."));

        i++;
    }

    //calcula o subtotal, configurando para duas casas decimais e trocando o
    //ponto para o v�rgula como separador de casas decimais
    subtotal = mascaraValorReal(subtotal);

    //escreve o subtotal no campo do formul�rio
    $('#ValorDespesas').val(subtotal);
    calculaRestaDespesas($("#ValorEntradaDespesas").val());
}

function calculaConsumo() {

    //captura o n�mero incrementador do formul�rio, que controla quantos campos
    //foram acrescidos tanto para servi�os quanto para produtos
    var sc = parseFloat($('#SCount').val().replace(".","").replace(",","."));
    var pc = parseFloat($('#PCount').val().replace(".","").replace(",","."));
    //define o subtotal inicial em 0.00
    var subtotal = 0.00;

    //vari�vel incrementadora
    var i = 0;
    //percorre todos os campos de servi�o, somando seus valores
    while (i <= sc) {

        //soma os valores apenas dos campos que existirem, o que forem apagados
        //ou removidos s�o ignorados
        if ($('#SubtotalServico'+i).val())
            //subtotal += parseFloat($('#idTab_Servico'+i).val().replace(".","").replace(",","."));
            subtotal += parseFloat($('#SubtotalServico'+i).val().replace(".","").replace(",","."));

        //incrementa a vari�vel i
        i++;
    }

    //faz o mesmo que o la�o anterior mas agora para produtos
    var i = 0;
    while (i <= pc) {

        if ($('#SubtotalProduto'+i).val())
            subtotal += parseFloat($('#SubtotalProduto'+i).val().replace(".","").replace(",","."));

        i++;
    }

    //calcula o subtotal, configurando para duas casas decimais e trocando o
    //ponto para o v�rgula como separador de casas decimais
    subtotal = mascaraValorReal(subtotal);

    //escreve o subtotal no campo do formul�rio
    $('#ValorConsumo').val(subtotal);
    calculaRestaConsumo($("#ValorEntradaConsumo").val());
}

/*
 * Fun��o respons�vel por adicionar novos campos de servi�o dinamicamente no
 * formul�rio de or�amento/tratametno
 */
function adicionaServico() {

    var ps = $("#SCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    ps++; //text box increment
    $("#SCount").val(ps);
    //console.log(ps);

    $(".input_fields_wrap").append('\
        <div class="form-group" id="1div'+ps+'">\
            <div class="panel panel-info">\
                <div class="panel-heading">\
                    <div class="row">\
						<div class="col-md-2">\
                            <label for="QtdVendaServico">Qtd:</label><br>\
                            <div class="input-group">\
                                <input type="text" class="form-control Numero" maxlength="3" id="QtdVendaServico'+ps+'" placeholder="0"\
                                    onkeyup="calculaSubtotal(this.value,this.name,'+ps+',\'QTD\',\'Servico\')"\
                                    name="QtdVendaServico'+ps+'" value="">\
                            </div>\
                        </div>\
						<div class="col-md-4">\
                            <label for="idTab_Servico">Servi�os:</label><br>\
                            <select class="form-control" id="listadinamica'+ps+'" onchange="buscaValor(this.value,this.name,\'Servico\','+ps+')" name="idTab_Servico'+ps+'">\
                                <option value="">-- Selecione uma op��o --</option>\
                            </select>\
                        </div>\
                        <div class="col-md-3">\
                            <label for="ValorVendaServico">Valor do Servi�o:</label><br>\
                            <div class="input-group" id="txtHint">\
                                <span class="input-group-addon" id="basic-addon1">R$</span>\
                                <input type="text" class="form-control Valor" id="idTab_Servico'+ps+'" maxlength="10" placeholder="0,00" \
                                    onkeyup="calculaSubtotal(this.value,this.name,'+ps+',\'VP\',\'Servico\')"\
                                    name="ValorVendaServico'+ps+'" value="">\
                            </div>\
                        </div>\
                        <div class="col-md-3">\
                            <label for="SubtotalServico">Subtotal:</label><br>\
                            <div class="input-group id="txtHint">\
                                <span class="input-group-addon" id="basic-addon1">R$</span>\
                                <input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalServico'+ps+'"\
                                       name="SubtotalServico'+ps+'" value="">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-md-6">\
                            <label for="ObsServico'+ps+'">Obs:</label><br>\
                            <input type="text" class="form-control" id="ObsServico'+ps+'" maxlength="250"\
                                   name="ObsServico'+ps+'" value="">\
                        </div>\
                        <div class="col-md-3">\
                            <label for="ConcluidoServico">Conclu�do? </label><br>\
                            <div class="form-group">\
                                <div class="btn-group" data-toggle="buttons">\
                                    <label class="btn btn-warning active" name="radio_ConcluidoServico'+ps+'" id="radio_ConcluidoServico'+ps+'N">\
                                    <input type="radio" name="ConcluidoServico'+ps+'" id="radiogeraldinamico"\
                                        autocomplete="off" value="N" checked>N�o\
                                    </label>\
                                    <label class="btn btn-default" name="radio_ConcluidoServico'+ps+'" id="radio_ConcluidoServico'+ps+'S">\
                                    <input type="radio" name="ConcluidoServico'+ps+'" id="radiogeraldinamico"\
                                        autocomplete="off" value="S">Sim\
                                    </label>\
                                </div>\
                            </div>\
                        </div>\
						<div class="col-md-2">\
                            <label><br></label><br>\
                            <a href="#" id="'+ps+'" class="remove_field btn btn-danger">\
                                <span class="glyphicon glyphicon-trash"></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>\
            </div>\
        </div>'
    ); //add input box

    //get a reference to the select element
    $select = $('#listadinamica'+ps);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=1',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaA');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

    //permite o uso de radio buttons nesse bloco din�mico
    $('input:radio[id="radiogeraldinamico"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        //console.log(value + ' <<>> ' + name);

        $('label[name="radio_' + name + '"]').removeClass();
        $('label[name="radio_' + name + '"]').addClass("btn btn-default");
        $('#radio_' + name + value).addClass("btn btn-warning active");

    });
}

function adicionaServicoCompra() {

    var ps = $("#SCount").val(); //initlal text box count

    //alert( $("#SCount").val() );
    ps++; //text box increment
    $("#SCount").val(ps);
    //console.log(ps);

    $(".input_fields_wrap5").append('\
        <div class="form-group" id="5div'+ps+'">\
            <div class="panel panel-info">\
                <div class="panel-heading">\
                    <div class="row">\
						<div class="col-md-2">\
                            <label for="QtdCompraServico">Qtd:</label><br>\
                            <div class="input-group">\
                                <input type="text" class="form-control Numero" maxlength="3" id="QtdCompraServico'+ps+'" placeholder="0"\
                                    onkeyup="calculaSubtotalCompra(this.value,this.name,'+ps+',\'QTD\',\'Servico\')"\
                                    name="QtdCompraServico'+ps+'" value="">\
                            </div>\
                        </div>\
						<div class="col-md-4">\
                            <label for="idTab_Servico">Servi�os:</label><br>\
                            <select class="form-control" id="listadinamica'+ps+'" onchange="buscaValorCompra(this.value,this.name,\'Servico\','+ps+')" name="idTab_Servico'+ps+'">\
                                <option value="">-- Selecione uma op��o --</option>\
                            </select>\
                        </div>\
                        <div class="col-md-3">\
                            <label for="ValorCompraServico">Valor do Servi�o:</label><br>\
                            <div class="input-group" id="txtHint">\
                                <span class="input-group-addon" id="basic-addon1">R$</span>\
                                <input type="text" class="form-control Valor" id="idTab_Servico'+ps+'" maxlength="10" placeholder="0,00" \
                                    onkeyup="calculaSubtotalCompra(this.value,this.name,'+ps+',\'VP\',\'Servico\')"\
                                    name="ValorCompraServico'+ps+'" value="">\
                            </div>\
                        </div>\
                        <div class="col-md-3">\
                            <label for="SubtotalServico">Subtotal:</label><br>\
                            <div class="input-group id="txtHint">\
                                <span class="input-group-addon" id="basic-addon1">R$</span>\
                                <input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalServico'+ps+'"\
                                       name="SubtotalServico'+ps+'" value="">\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-md-8">\
                            <label for="ObsServico'+ps+'">Obs:</label><br>\
                            <input type="text" class="form-control" id="ObsServico'+ps+'" maxlength="250"\
                                   name="ObsServico'+ps+'" value="">\
                        </div>\
                        <div class="col-md-2">\
                            <label for="ConcluidoServico">Conclu�do? </label><br>\
                            <div class="form-group">\
                                <div class="btn-group" data-toggle="buttons">\
                                    <label class="btn btn-warning active" name="radio_ConcluidoServico'+ps+'" id="radio_ConcluidoServico'+ps+'N">\
                                    <input type="radio" name="ConcluidoServico'+ps+'" id="radiogeraldinamico"\
                                        autocomplete="off" value="N" checked>N�o\
                                    </label>\
                                    <label class="btn btn-default" name="radio_ConcluidoServico'+ps+'" id="radio_ConcluidoServico'+ps+'S">\
                                    <input type="radio" name="ConcluidoServico'+ps+'" id="radiogeraldinamico"\
                                        autocomplete="off" value="S">Sim\
                                    </label>\
                                </div>\
                            </div>\
                        </div>\
						<div class="col-md-1">\
                            <label><br></label><br>\
                            <a href="#" id="'+ps+'" class="remove_field5 btn btn-danger">\
                                <span class="glyphicon glyphicon-trash"></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>\
            </div>\
        </div>'
    ); //add input box

    //get a reference to the select element
    $select = $('#listadinamica'+ps);

    //request the JSON data and parse into the select element
    $.ajax({
        url: window.location.origin+ '/' + app + '/GetvaluesCompra_json.php?q=1',
        dataType: 'JSON',
        type: "GET",
        success: function (data) {
            //clear the current content of the select
            $select.html('');
            //iterate over the data and append a select option
            $select.append('<option value="">-- Selecione uma op��o --</option>');
            $.each(data, function (key, val) {
                //alert(val.id);
                $select.append('<option value="' + val.id + '">' + val.name + '</option>');
            })
        },
        error: function () {
            //alert('erro listadinamicaA');
            //if there is an error append a 'none available' option
            $select.html('<option id="-1">ERRO</option>');
        }

    });

    //permite o uso de radio buttons nesse bloco din�mico
    $('input:radio[id="radiogeraldinamico"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        //console.log(value + ' <<>> ' + name);

        $('label[name="radio_' + name + '"]').removeClass();
        $('label[name="radio_' + name + '"]').addClass("btn btn-default");
        $('#radio_' + name + value).addClass("btn btn-warning active");

    });
}

$("#first-choice").change(function () {

    var $dropdown = $(this);
    var items = [];

    $.getJSON("dt.json", function (data) {

        $.each(data, function (key, val) {
            items.push(val + '<br>');
        });

        $.getJSON("data.json", function (data) {

            var key = $dropdown.val();
            var vals = [];

            if (key == 'beverages')
                vals = data.beverages.split(",");
            else if (key == 'snacks')
                vals = data.snacks.split(",");
            else
                vals = ['Please choose from above'];

            var $secondChoice = $("#second-choice");
            $secondChoice.empty();
            $.each(vals, function (index, value) {
                $secondChoice.append("<option>" + value + "</option>");
            });
            $(".Chosen").trigger("chosen:updated");
        });

        $("#demo").html(items);
        //alert('opa');
    });

});

$(document).ready(function () {

    $(".Date").mask("99/99/9999");
	$(".Cnpj").mask("99.999.999/9999-99");
    $(".Time").mask("99:99");
    $(".Cpf").mask("99999999999");
    $(".Cep").mask("99999999");
	$(".Rg").mask("999999999");
    $(".TituloEleitor").mask("9999.9999.9999");
    $(".Valor").mask("#.##0,00", {reverse: true});
    $('.Numero').mask('0#');

    $(".Celular").mask("99999999999");
    $(".CelularVariavel").on("blur", function () {
        var last = $(this).val().substr($(this).val().indexOf("-") + 1);

        if (last.length == 3) {
            var move = $(this).val().substr($(this).val().indexOf("-") - 1, 1);
            var lastfour = move + last;

            var first = $(this).val().substr(0, 9);

            $(this).val(first + '-' + lastfour);
        }
    });

    $("[data-toggle='tooltip']").tooltip();

    $('input:radio[id="radio"]').change(function() {

        var value = $(this).val();

        if (value == 1)
            var btn = "btn btn-warning active";
        else if (value == 2)
            var btn = "btn btn-success active";
        else if (value == 3)
            var btn = "btn btn-primary active";
        else
            var btn = "btn btn-danger active";

        $('label[name="radio"]').removeClass();
        $('label[name="radio"]').addClass("btn btn-default");
        $('#radio'+ value).addClass(btn);

    });

    //permite o uso de radio buttons em blocos est�ticos
    $('input:radio[id="radiobutton"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        $('label[name="radiobutton_' + name + '"]').removeClass();
        $('label[name="radiobutton_' + name + '"]').addClass("btn btn-default");
        $('#radiobutton_' + name + value).addClass("btn btn-warning active");

    });

    //permite o uso de radio buttons em blocos din�micos
    $('input:radio[id="radiobuttondinamico"]').change(function() {

        var value = $(this).val();
        var name = $(this).attr("name");

        $('label[name="radiobutton_' + name + '"]').removeClass();
        $('label[name="radiobutton_' + name + '"]').addClass("btn btn-default");
        $('#radiobutton_' + name + value).addClass("btn btn-warning active");

    });

    //adiciona campos dinamicamente
    var pc = $("#PCount").val(); //initlal text box count
    $(".add_field_button2").click(function(e){ //on add input button click
        e.preventDefault();

        pc++; //text box increment
        $("#PCount").val(pc);

        $(".input_fields_wrap2").append('\
            <div class="form-group" id="2div'+pc+'">\
                <div class="panel panel-info">\
                    <div class="panel-heading">\
                        <div class="row">\
                            <div class="col-md-1">\
                                <label for="QtdVendaProduto">Qtd:</label><br>\
                                <div class="input-group">\
                                    <input type="text" class="form-control Numero" maxlength="3" id="QtdVendaProduto'+pc+'" placeholder="0"\
                                        onkeyup="calculaSubtotal(this.value,this.name,'+pc+',\'QTD\',\'Produto\')"\
                                        name="QtdVendaProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-7">\
                                <label for="idTab_Produto">Produto:</label><br>\
                                <select class="form-control Chosen" id="listadinamicab'+pc+'" onchange="buscaValor2Tabelas(this.value,this.name,\'Valor\','+pc+',\'Produto\')" name="idTab_Produto'+pc+'">\
                                    <option value="">-- Selecione uma op��o --</option>\
                                </select>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="ValorVendaProduto">Valor do Produto:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" id="idTab_Produto'+pc+'" maxlength="10" placeholder="0,00" \
                                        onkeyup="calculaSubtotal(this.value,this.name,'+pc+',\'VP\',\'Produto\')"\
                                        name="ValorVendaProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="SubtotalProduto">Subtotal:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalProduto'+pc+'"\
                                           name="SubtotalProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                        </div>\
						<div class="row">\
						<div class="col-md-1"></div>\
						<div class="col-md-7">\
								<label for="ObsProduto'+pc+'">Obs:</label><br>\
								<input type="text" class="form-control" id="ObsProduto'+pc+'" maxlength="250"\
									   name="ObsProduto'+pc+'" value="">\
							</div>\
							<div class="col-md-2">\
								<label for="DataValidadeProduto'+pc+'">Val. do Produto:</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataValidadeProduto'+pc+'" value="'+currentDate.format('DD/MM/YYYY')+'">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-1">\
                                <label><br></label><br>\
                                <a href="#" id="'+pc+'" class="remove_field2 btn btn-danger">\
                                    <span class="glyphicon glyphicon-trash"></span>\
                                </a>\
                            </div>\
						</div>\
                    </div>\
                </div>\
            </div>'
        ); //add input box

        //get a reference to the select element
        $select = $('#listadinamicab'+pc);

        //request the JSON data and parse into the select element
        $.ajax({
            url: window.location.origin+ '/' + app + '/Getvalues_json.php?q=2',
            dataType: 'JSON',
            type: "GET",
            success: function (data) {
                //clear the current content of the select
                $select.html('');
                //iterate over the data and append a select option
                $select.append('<option value="">-- Selecione uma op��o --</option>');
                $.each(data, function (key, val) {
                    //alert(val.id);
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
                })
                $('.Chosen').chosen({
                    disable_search_threshold: 10,
                    multiple_text: "Selecione uma ou mais op��es",
                    single_text: "Selecione uma op��o",
                    no_results_text: "Nenhum resultado para",
                    width: "100%"
                });
            },
            error: function () {
                //alert('erro listadinamicaB');
                //if there is an error append a 'none available' option
                $select.html('<option id="-1">ERRO</option>');
            }

        });

    });

	//adiciona campos dinamicamente
    var pc = $("#PCount").val(); //initlal text box count
    $(".add_field_button4").click(function(e){ //on add input button click
        e.preventDefault();

        pc++; //text box increment
        $("#PCount").val(pc);

		$(".input_fields_wrap4").append('\
            <div class="form-group" id="4div'+pc+'">\
                <div class="panel panel-info">\
                    <div class="panel-heading">\
                        <div class="row">\
                            <div class="col-md-1">\
                                <label for="QtdCompraProduto">Qtd:</label><br>\
                                <div class="input-group">\
                                    <input type="text" class="form-control Numero" maxlength="3" id="QtdCompraProduto'+pc+'" placeholder="0"\
                                        onkeyup="calculaSubtotalCompra(this.value,this.name,'+pc+',\'QTD\',\'Produto\')"\
                                        name="QtdCompraProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-7">\
                                <label for="idTab_Produto">Produto:</label><br>\
                                <select class="form-control Chosen" id="listadinamicab'+pc+'" onchange="buscaValorCompra(this.value,this.name,\'Produto\','+pc+')" name="idTab_Produto'+pc+'">\
                                    <option value="">-- Selecione uma op��o --</option>\
                                </select>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="ValorCompraProduto">Valor do Produto:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" id="idTab_Produto'+pc+'" maxlength="10" placeholder="0,00" \
                                        onkeyup="calculaSubtotalCompra(this.value,this.name,'+pc+',\'VP\',\'Produto\')"\
                                        name="ValorCompraProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="SubtotalProduto">Subtotal:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalProduto'+pc+'"\
                                           name="SubtotalProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-1">\
                                <label><br></label><br>\
                                <a href="#" id="'+pc+'" class="remove_field4 btn btn-danger">\
                                    <span class="glyphicon glyphicon-trash"></span>\
                                </a>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>'
        ); //add input box

        //get a reference to the select element
        $select = $('#listadinamicab'+pc);

        //request the JSON data and parse into the select element
        $.ajax({
            url: window.location.origin+ '/' + app + '/GetvaluesCompra_json.php?q=2',
            dataType: 'JSON',
            type: "GET",
            success: function (data) {
                //clear the current content of the select
                $select.html('');
                //iterate over the data and append a select option
                $select.append('<option value="">-- Selecione uma op��o --</option>');
                $.each(data, function (key, val) {
                    //alert(val.id);
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
                })
                $('.Chosen').chosen({
                    disable_search_threshold: 10,
                    multiple_text: "Selecione uma ou mais op��es",
                    single_text: "Selecione uma op��o",
                    no_results_text: "Nenhum resultado para",
                    width: "100%"
                });
            },
            error: function () {
                //alert('erro listadinamicaB');
                //if there is an error append a 'none available' option
                $select.html('<option id="-1">ERRO</option>');
            }

        });

    });

	//adiciona campos dinamicamente
    var pc = $("#PCount").val(); //initlal text box count
    $(".add_field_button6").click(function(e){ //on add input button click
        e.preventDefault();

        pc++; //text box increment
        $("#PCount").val(pc);

		$(".input_fields_wrap6").append('\
            <div class="form-group" id="6div'+pc+'">\
                <div class="panel panel-danger">\
                    <div class="panel-heading">\
                        <div class="row">\
                            <div class="col-md-1">\
                                <label for="QtdCompraProduto">Qtd:</label><br>\
                                <div class="input-group">\
                                    <input type="text" class="form-control Numero" maxlength="3" id="QtdCompraProduto'+pc+'" placeholder="0"\
                                        onkeyup="calculaSubtotalCompra(this.value,this.name,'+pc+',\'QTD\',\'Produto\')"\
                                        name="QtdCompraProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-7">\
                                <label for="idTab_Produto">Produto:</label><br>\
                                <select class="form-control Chosen" id="listadinamicab'+pc+'" onchange="buscaValorCompra(this.value,this.name,\'Produto\','+pc+')" name="idTab_Produto'+pc+'">\
                                    <option value="">-- Selecione uma op��o --</option>\
                                </select>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="ValorCompraProduto">Valor do Produto:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" id="idTab_Produto'+pc+'" maxlength="10" placeholder="0,00" \
                                        onkeyup="calculaSubtotalCompra(this.value,this.name,'+pc+',\'VP\',\'Produto\')"\
                                        name="ValorCompraProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <label for="SubtotalProduto">Subtotal:</label><br>\
                                <div class="input-group id="txtHint">\
                                    <span class="input-group-addon" id="basic-addon1">R$</span>\
                                    <input type="text" class="form-control Valor" maxlength="10" placeholder="0,00" readonly="" id="SubtotalProduto'+pc+'"\
                                           name="SubtotalProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                        </div>\
						<div class="row">\
						<div class="col-md-1"></div>\
						<div class="col-md-7">\
								<label for="ObsProduto'+pc+'">Obs:</label><br>\
								<input type="text" class="form-control" id="ObsProduto'+pc+'" maxlength="250"\
									   name="ObsProduto'+pc+'" value="">\
							</div>\
							<div class="col-md-2">\
								<label for="DataValidadeProduto'+pc+'">Val. do Produto:</label>\
								<div class="input-group DatePicker">\
									<input type="text" class="form-control Date" maxlength="10" placeholder="DD/MM/AAAA"\
										   name="DataValidadeProduto'+pc+'" value="'+currentDate.format('DD/MM/YYYY')+'">\
									<span class="input-group-addon" disabled>\
										<span class="glyphicon glyphicon-calendar"></span>\
									</span>\
								</div>\
							</div>\
							<div class="col-md-1">\
                                <label><br></label><br>\
                                <a href="#" id="'+pc+'" class="remove_field6 btn btn-danger">\
                                    <span class="glyphicon glyphicon-trash"></span>\
                                </a>\
                            </div>\
						</div>\
                    </div>\
                </div>\
            </div>'
        ); //add input box

        //get a reference to the select element
        $select = $('#listadinamicab'+pc);

        //request the JSON data and parse into the select element
        $.ajax({
            url: window.location.origin+ '/' + app + '/GetvaluesCompra_json.php?q=2',
            dataType: 'JSON',
            type: "GET",
            success: function (data) {
                //clear the current content of the select
                $select.html('');
                //iterate over the data and append a select option
                $select.append('<option value="">-- Selecione uma op��o --</option>');
                $.each(data, function (key, val) {
                    //alert(val.id);
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
                })
                $('.Chosen').chosen({
                    disable_search_threshold: 10,
                    multiple_text: "Selecione uma ou mais op��es",
                    single_text: "Selecione uma op��o",
                    no_results_text: "Nenhum resultado para",
                    width: "100%"
                });
            },
            error: function () {
                //alert('erro listadinamicaB');
                //if there is an error append a 'none available' option
                $select.html('<option id="-1">ERRO</option>');
            }

        });

    });

	//adiciona campos dinamicamente
    var pc = $("#PCount").val(); //initlal text box count
    $(".add_field_button7").click(function(e){ //on add input button click
        e.preventDefault();

        pc++; //text box increment
        $("#PCount").val(pc);

		$(".input_fields_wrap7").append('\
            <div class="form-group" id="7div'+pc+'">\
                <div class="panel panel-danger">\
                    <div class="panel-heading">\
                        <div class="row">\
                            <div class="col-md-1">\
                                <label for="QtdCompraProduto">Qtd:</label><br>\
                                <div class="input-group">\
                                    <input type="text" class="form-control Numero" maxlength="3" id="QtdCompraProduto'+pc+'" placeholder="0"\
                                        onkeyup="calculaSubtotalCompra(this.value,this.name,'+pc+',\'QTD\',\'Produto\')"\
                                        name="QtdCompraProduto'+pc+'" value="">\
                                </div>\
                            </div>\
                            <div class="col-md-7">\
                                <label for="idTab_Produto">Produto:</label><br>\
                                <select class="form-control Chosen" id="listadinamicab'+pc+'" onchange="buscaValorCompra(this.value,this.name,\'Produto\','+pc+')" name="idTab_Produto'+pc+'">\
                                    <option value="">-- Selecione uma op��o --</option>\
                                </select>\
                            </div>\
                        </div>\
						<div class="row">\
						<div class="col-md-1"></div>\
						<div class="col-md-7">\
								<label for="ObsProduto'+pc+'">Obs:</label><br>\
								<input type="text" class="form-control" id="ObsProduto'+pc+'" maxlength="250"\
									   name="ObsProduto'+pc+'" value="">\
							</div>\
							<div class="col-md-1">\
                                <label><br></label><br>\
                                <a href="#" id="'+pc+'" class="remove_field7 btn btn-danger">\
                                    <span class="glyphicon glyphicon-trash"></span>\
                                </a>\
                            </div>\
						</div>\
                    </div>\
                </div>\
            </div>'
        ); //add input box

        //get a reference to the select element
        $select = $('#listadinamicab'+pc);

        //request the JSON data and parse into the select element
        $.ajax({
            url: window.location.origin+ '/' + app + '/GetvaluesCompra_json.php?q=2',
            dataType: 'JSON',
            type: "GET",
            success: function (data) {
                //clear the current content of the select
                $select.html('');
                //iterate over the data and append a select option
                $select.append('<option value="">-- Selecione uma op��o --</option>');
                $.each(data, function (key, val) {
                    //alert(val.id);
                    $select.append('<option value="' + val.id + '">' + val.name + '</option>');
                })
                $('.Chosen').chosen({
                    disable_search_threshold: 10,
                    multiple_text: "Selecione uma ou mais op��es",
                    single_text: "Selecione uma op��o",
                    no_results_text: "Nenhum resultado para",
                    width: "100%"
                });
            },
            error: function () {
                //alert('erro listadinamicaB');
                //if there is an error append a 'none available' option
                $select.html('<option id="-1">ERRO</option>');
            }

        });

    });

    //Remove os campos adicionados dinamicamente
    $(".input_fields_wrap").on("click",".remove_field", function(e){ //user click on remove text
        $("#1div"+$(this).attr("id")).remove();
        //ap�s remover o campo refaz o c�lculo do or�amento e total restante
        calculaOrcamento();
    })

    //Remove os campos adicionados dinamicamente
    $(".input_fields_wrap2").on("click",".remove_field2", function(e){ //user click on remove text
        $("#2div"+$(this).attr("id")).remove();
        //ap�s remover o campo refaz o c�lculo do or�amento e total restante
        calculaOrcamento();
    })

	//Remove os campos adicionados dinamicamente
    $(".input_fields_wrap4").on("click",".remove_field4", function(e){ //user click on remove text
        $("#4div"+$(this).attr("id")).remove();
        //ap�s remover o campo refaz o c�lculo do or�amento e total restante
        calculaOrcamento();
    })

	//Remove os campos adicionados dinamicamente
    $(".input_fields_wrap5").on("click",".remove_field5", function(e){ //user click on remove text
        $("#5div"+$(this).attr("id")).remove();
        //ap�s remover o campo refaz o c�lculo da despesa e total restante
        calculaDespesas();
    })

	//Remove os campos adicionados dinamicamente
    $(".input_fields_wrap6").on("click",".remove_field6", function(e){ //user click on remove text
        $("#6div"+$(this).attr("id")).remove();
        //ap�s remover o campo refaz o c�lculo do or�amento e total restante
        calculaDespesas();
    })

	//Remove os campos adicionados dinamicamente
    $(".input_fields_wrap7").on("click",".remove_field7", function(e){ //user click on remove text
        $("#7div"+$(this).attr("id")).remove();
		//ap�s remover o campo refaz o c�lculo do or�amento e total restante
        //calculaCompra();
    })

    //Remove os campos adicionados dinamicamente
    $(".input_fields_wrap3").on("click",".remove_field3", function(e){ //user click on remove text
        $("#3div"+$(this).attr("id")).remove();
    })

    /*
     * Fun��o para capturar o valor escolhido no campo select (Servi�o e Produto, por exemplo)
     */
    $("#addValues").change(function () {
        //var n = $(this).attr("value");
        //var n = $("option:selected", this);

        alert (this.value);

        //alert('oi');
    });

    /*
     * As duas fun��es a seguir servem para exibir ou ocultar uma div em fun��o
     * do seu nome
     */
    $("input[id$='hide']").click(function () {
        var n = $(this).attr("name");
        $("#" + n).hide();
    });
    $("input[id$='show']").click(function () {
        var n = $(this).attr("name");
        $("#" + n).show();
    });

    /*
     * Mesma fun��o que a de cima mas com uma modifica��o para funcionar nos
     * radios buttons e permitir a altern�ncia da cor do bot�o
     */
     $("input[id$='hideradio']").change(function () {
         var n = $(this).attr("name");
         $("#" + n).hide();
         radioButtonColorNS(n, 'hideradio');
     });
     $("input[id$='showradio']").change(function () {
         var n = $(this).attr("name");
         $("#" + n).show();
         radioButtonColorNS(n, 'showradio');
     });

    /*
     * A fun��o a seguir servem para exibir ou ocultar uma div em fun��o do
     * valor selecionado no select/pulldown
     */
    $('#SelectShowHide').change(function () {
        $('.colors').hide();
        $('.div' + $(this).val()).show();
    });

    $('#SelectShowHideId').change(function () {
        var n = $(this).attr("name");
        //alert(n + $(this).val());
        //$('#' + n).hide();
        $('.' + n).hide();
        $('#' + n + $(this).val()).show();
    });

    $('.Chosen').chosen({
        disable_search_threshold: 10,
        multiple_text: "Selecione uma ou mais op��es",
        single_text: "Selecione uma op��o",
        no_results_text: "Nenhum resultado para",
        width: "100%"
    });

    $("button.fc-today-button").click(function () {
        $('#datepickerinline').datetimepicker({
            today: '2011-01-01',
        });
        alert(date);
    });
    $('.DatePicker').datetimepicker(dateTimePickerOptions);
    $('.TimePicker').datetimepicker({
        tooltips: {
            today: 'Hoje',
            clear: 'Limpar sele��o',
            close: 'Fechar este menu',
            selectMonth: 'Selecione um m�s',
            prevMonth: 'M�s anterior',
            nextMonth: 'Pr�ximo m�s',
            selectYear: 'Selecione um ano',
            prevYear: 'Ano anterior',
            nextYear: 'Pr�ximo ano',
            selectDecade: 'Selecione uma d�cada',
            prevDecade: 'D�cada anterior',
            nextDecade: 'Pr�xima d�cada',
            prevCentury: 'Centen�rio anterior',
            nextCentury: 'Pr�ximo centen�rio',
            incrementHour: 'Aumentar hora',
            decrementHour: 'Diminuir hora',
            incrementMinute: 'Aumentar minutos',
            decrementMinute: 'Diminuir minutos',
            incrementSecond: 'Aumentar segundos',
            decrementSecond: 'Diminuir segundos',
        },
        showTodayButton: true,
        showClose: true,
        //stepping: 30,
        format: 'HH:mm',
        locale: 'pt-br'
    });
});
$('#datepickerinline').datetimepicker({
    tooltips: {
        today: 'Hoje',
        clear: 'Limpar sele��o',
        close: 'Fechar este menu',
        selectMonth: 'Selecione um m�s',
        prevMonth: 'M�s anterior',
        nextMonth: 'Pr�ximo m�s',
        selectYear: 'Selecione um ano',
        prevYear: 'Ano anterior',
        nextYear: 'Pr�ximo ano',
        selectDecade: 'Selecione uma d�cada',
        prevDecade: 'D�cada anterior',
        nextDecade: 'Pr�xima d�cada',
        prevCentury: 'Centen�rio anterior',
        nextCentury: 'Pr�ximo centen�rio',
        incrementHour: 'Aumentar hora',
        decrementHour: 'Diminuir hora',
        incrementMinute: 'Aumentar minutos',
        decrementMinute: 'Diminuir minutos',
        incrementSecond: 'Aumentar segundos',
        decrementSecond: 'Diminuir segundos'
    },
    inline: true,
    showTodayButton: true,
    //showClear: true,
    format: 'DD/MM/YYYY',
    //defaultDate: '2015-01-01',
    locale: 'pt-br'
});

$("#datepickerinline").on("dp.change", function (e) {
    var d = new Date(e.date);
    $('#calendar').fullCalendar('gotoDate', d);
});
/*
 * veio junto com o �ltimo datetimepicker, n�o parei pra analisar sua relev�ncia
 * vou deixar aqui por enquanto
 * http://eonasdan.github.io/bootstrap-datetimepicker/
 * */

ko.bindingHandlers.dateTimePicker = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        //initialize datepicker with some optional options
        var options = allBindingsAccessor().dateTimePickerOptions || {};
        $(element).datetimepicker(options);
        //when a user changes the date, update the view model
        ko.utils.registerEventHandler(element, "dp.change", function (event) {
            var value = valueAccessor();
            if (ko.isObservable(value)) {
                if (event.date != null && !(event.date instanceof Date)) {
                    value(event.date.toDate());
                } else {
                    value(event.date);
                }
            }
        });
        ko.utils.domNodeDisposal.addDisposeCallback(element, function () {
            var picker = $(element).data("DateTimePicker");
            if (picker) {
                picker.destroy();
            }
        });
    },
    update: function (element, valueAccessor, allBindings, viewModel, bindingContext) {

        var picker = $(element).data("DateTimePicker");
        //when the view model is updated, update the widget
        if (picker) {
            var koDate = ko.utils.unwrapObservable(valueAccessor());
            //in case return from server datetime i am get in this form for example /Date(93989393)/ then fomat this
            koDate = (typeof (koDate) !== 'object') ? new Date(parseFloat(koDate.replace(/[^0-9]/g, ''))) : koDate;
            picker.date(koDate);
        }
    }
};
function EventModel() {
    this.ScheduledDate = ko.observable('');
}
ko.applyBindings(new EventModel());
/*
 $("#inputDate").mask("99/99/9999");
 $("#inputDate0").mask("99/99/9999");
 $("#inputDate1").mask("99/99/9999");
 $("#inputDate2").mask("99/99/9999");
 $("#inputDate3").mask("99/99/9999");
 $("#Cpf").mask("999.999.999-99");
 $("#Cep").mask("99999-999");
 $("#TituloEleitor").mask("9999.9999.9999");
 */

$('#popoverData').popover();
$('#popoverOption').popover({trigger: "hover"});
var tempo = 5 * 60 * 60 * 1000;
//var tempo = 10 * 1000;
//var date = new Date(new Date().valueOf() + 60 * 60 * 1000);
var date = new Date(new Date().valueOf() + tempo);
$('#clock').countdown(date, function (event) {
    $(this).html(event.strftime('%H:%M:%S'));
});
var branco = tempo - 1200000;
$('#countdowndiv').delay(branco).queue(function () {
    $(this).addClass("btn-warning");
});
$('#submit').on('click', function () {
    var $btn = $(this).button('loading')
})

jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
        if(!$(event.target).hasClass('notclickable'))
           window.location = $(this).data("href");
        else
            event.stopPropagation();
    });

});
setTimeout(function () {
    $('#hidediv').fadeOut('slow');
}, 3000); // <-- time in milliseconds

setTimeout(function () {
    $('#hidediverro').fadeOut('slow');
}, 10000); // <-- time in milliseconds

$(document).ready(function () {
    $(".js-data-example-ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            //url: "http://localhost/sisgef/testebd.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, page) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data.items
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1
    });
});
$(document).ready(function () {
    $(".js-example-basic-single").select2();
});
//Determina a raiz do site
var pathArray = window.location.pathname.split('/');
var basePath = window.location.protocol + "//" + window.location.host + "/" + pathArray[1];
$("#series").remoteChained({
    parents: "#mark",
    url: basePath + "/api/teste.php"
});
$("#StatusAntigo").remoteChained({
    parents: "#Especialidade",
    url: basePath + "/api/teste.php",
    loading: "Carregando...",
});
$('#Chosen').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#id_Municipio').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "70%"
});
$('#Uf').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "70%"
});
$('#Municipio').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "70%"
});
$('#EstadoCivil').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "70%"
});
$('#Especialidade').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#Cid').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#Prestador').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#Cirurgia').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#Status').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#Posicao').chosen({
    disable_search_threshold: 10,
    multiple_text: "Selecione uma ou mais op��es",
    single_text: "Selecione uma op��o",
    no_results_text: "Nenhum resultado para",
    width: "100%"
});
$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    eventSources: [{
            url: 'Consulta_json.php', // use the `url` property
        }],
    //allDayDefault: true,
    defaultView: 'agendaWeek',
    //contentHeight: 700,
    height: 'auto',
    //handleWindowResize: false,
    //aspectRatio: 2,

    firstDay: '1',
	minTime: '07:00',
    maxTime: '21:00',
    //minTime: '00:00',
    //maxTime: '24:00',
    nowIndicator: true,
    selectable: true,
    //selectHelper: true,
    editable: false,
    timezone: "local",
    lang: 'pt-br',
    eventAfterRender: function (event, element) {

        if (event.Evento == 1)
            var title = "<b>Evento Agendado</b><br><br><b>Obs:</b> " + event.Obs + "<br>\n\<b>Profissional:</b> " + event.Profissional;
        else {

            if (event.Paciente == 'D')
                var title = "<b>" + event.title + "</b><br><b>Respons�vel:</b> " + event.subtitle + "<br><b>Tel.1:</b> " + event.Telefone1 + "<br>\n\<b>Profissional:</b> " + event.Profissional + "<br>\n\<b>Obs:</b> " + event.Obs + "<br>\n\<b>Tipo de Consulta:</b> " + event.TipoConsulta;
            else
                var title = "<b>" + event.title + "<b> " + "<br><b>Tel.1:</b> " + event.Telefone1 + "<br>\n\<b>Profissional:</b> " + event.Profissional + "<br>\n\<b>Obs:</b> " + event.Obs + "<br>\n\<b>Tipo de Consulta:</b> " + event.TipoConsulta;
        }


        $(element).tooltip({
            title: title,
            container: 'body',
            position: {my: "left bottom-3", at: "center top"},
            placement: 'auto top',
            html: true,
            delay: {"show": 500, "hide": 100},
            template: '<div class="tooltip" role="tooltip" ><div class="tooltip-inner" \n\
                    style="color: #000; border-radius: 4px; text-align: left; border-width: thin; border-style: solid; \n\
                    border-color: #000; background-color: #fff; white-space:pre-wrap;"></div></div>'
        });
    },
    /*
    selectConstraint: {
        start: agora,
        end: '2099-12-31T23:59:00'
    },*/
    select: function (start, end, jsEvent, view) {
        //var re = new RegExp(/^.*\//);
        //window.location = re.exec(window.location.href) + 'cliente/pesquisar?start=' + start + '&end=' + end;

        //alert(start + ' :: ' + end);

        //endtime = $.fullCalendar.formatDate(end, 'HH:mm');
        //starttime = $.fullCalendar.formatDate(start, 'DD/MM/YYYY, HH:mm');
        //var slot = 'start=' + start + '&end=' + end;

        $('#fluxo #start').val(start);
        $('#fluxo #end').val(end);
        //$('#fluxo #slot').text(slot);
        $('#fluxo').modal('show');
    },
});
/*
 * Redireciona o usu�rio de acordo com a op��o escolhida no modal da agenda,
 * que surge ao clicar em algum slot de tempo vazio.
 */
function redirecionar(x) {

    var re = new RegExp(/^.*\//);
    var start = moment($("#start").val());
    var end = moment($("#end").val());
    (x == 1) ? url = 'consulta/cadastrar_evento' : url = 'cliente/pesquisar';
    window.location = re.exec(window.location.href) + url + '?start=' + start + '&end=' + end
}

function redirecionar2(x) {

    var re = new RegExp(/^.*\//);
    var start = moment($("#start").val());
    var end = moment($("#end").val());
    (x == 3) ? url = 'consulta/cadastrar_particular' : url = 'cliente/pesquisar';
    window.location = re.exec(window.location.href) + url + '?start=' + start + '&end=' + end
}

/*
 * Fun��o para capturar a url com o objetivo de obter a data, ap�s criar/alterar
 * uma consulta, e assim usar a fun��o gotoDate do Fullcalendar para mostrar a
 * agenda na data escolhida
 */
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
var gtd = getUrlParameter('gtd');
(gtd) ? $('#calendar').fullCalendar('gotoDate', gtd) : false;
