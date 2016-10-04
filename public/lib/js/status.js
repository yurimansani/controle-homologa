$(function () {

    /**
     * Salvar alteracao dados status
     */
    $('#salvarNovoStatus').click(function () {

        var dados = {
            cStatus: $('#cStatus').val()
        };

        createAjax({
            type: "POST",
            url: "/statusHomologa/salvar/",
            data: dados,
            beforeSend: false,
            success: function (data) {

                var json = $.parseJSON(data);

                var alteracaoEfetuada = json.status == true;
                if (!alteracaoEfetuada) {
                    alertModal(translate.atencao, json.message, 'dadosCliente');
                    $.each(json.error_form, function (i, item) {
                        var id = '#' + item;
                        $(id).css({"background-color": "pink"});
                        $(id).keyup(function () {
                            if ($(id).val() != '') {
                                $(id).css("background-color", "");
                            }
                        });
                    });

                    return;
                }

                alertModal('', json.message, 'dadosCliente');
                $('#dadosCliente button').addClass('redirecionamentoUrl');

                redirectUrl(json.url);
            }
        });
    });

    /**
     * Salvar alteracao dados cliente
     */
    $('#salvarDadosClienteCallCenter').click(function () {

        var dados = {
            clc_codigo: $('#clc_codigo').val(),
            clc_nome: $('#clc_nome').val(),
            clc_sobrenome: $('#clc_sobrenome').val(),
            clc_email: $('#clc_email').val(),
            clc_data_aniversario: $('#clc_data_aniversario').val(),
            clc_endereco: $('#clc_endereco').val(),
            clc_sexo: $('#clc_sexo').val(),
            pai_codigo: $('#pai_codigo').val(),
            clc_telefone: $('#clc_telefone').val(),
            est_codigo: $('#est_codigo').val(),
            gtt_codigo: $('#gtt_codigo').val(),
            cid_codigo: $('#cid_codigo').val(),
            clc_cep: $('#clc_cep').val()
        };

        createAjax({
            type: "POST",
            url: "/cliente/salvar/",
            data: dados,
            beforeSend: false,
            success: function (data) {

                var json = $.parseJSON(data);

                var alteracaoEfetuada = json.status == true;
                if (!alteracaoEfetuada) {

                    alertDialog(translate.ocorreu_erro, json.message, 'dadosClienteAlterado');

                    $.each(json.error_form, function (i, item) {
                        var id = '#' + item;
                        $(id).css({"background-color": "pink"});
                        $(id).keyup(function () {
                            if ($(id).val() != '') {
                                $(id).css("background-color", "");
                            }
                        });
                    });

                    return;
                }

                alertModal('titulo', json.message, 'dadosClienteAlterado');
                $('#dadosClienteAlterado button').addClass('redirecionamentoUrl');

            }
        });
    });
});


function createAjax(json) {

    if (json.beforeSend == undefined) {
        json.beforeSend = function () {
            alertAguarde('show');
        };
        json.done = function () {
            alertAguarde('hide');
        };
    }

    if (json.error == undefined) {

        json.error = function (xhr) {
            if (xhr.status == 401) {
                window.location.href = '/';
            } else {
                alertModal('Ocorreu um erro ao alterar o valor do campo',
                        'Erro', false, true, 'bg-danger');
            }
        };
    }
    ;

    $.ajax({
        type: json.type,
        url: json.url,
        data: json.data,
        beforeSend: json.beforeSend,
        error: json.error
    })
            .success(json.success)
            .done(json.done);

}

/**
 * Modal informativa
 *
 * @param action
 */
function alertAguarde(action) {
    if (action == 'show') {
        var alertModal = "<div class='modal fade' data-backdrop='static' id='alertModalAguarde'>"
                + "<div class='modal-dialog modal-sm'>"
                + "<div class='modal-content'>"
                + "<div class='modal-body text-center'>"
                + '<img src="/img/ajax-loader-3.gif">'
                + "</div>"
                + "</div>" + "</div>" + "</div>";

        $('body').append(alertModal);
        $('#alertModalAguarde').modal('show');

        $('#alertModalAguarde').on('hidden.bs.modal', function (e) {
            $('#alertModalAguarde').remove();
        });
    } else if (action == 'hide') {
        $('#alertModalAguarde').modal('hide');
    }
}

/**
 =======
 * Dialog de alerta
 */
function alertModal(title, message, idAlertDialog) {

    var alertDialog = "<div class='modal fade' data-backdrop='static' id='" + idAlertDialog + "'>"
            + "<div class='modal-dialog'>"
            + "<div class='modal-content'>"
            + '<div class="modal-header">'
            + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            + '<h4 class="modal-title">' + title + '</h4>'
            + '</div>'
            + "<div class='modal-body text-center'><p>" + message + "</p>"
            + "</div>"
            + '<div class="modal-footer">'
            + '<button type="button" class="btn btn-default fechar-dialog" data-dismiss="modal">' + translate.fechar + '</button>'
            + '</div>'
            + "</div>" + "</div>" + "</div>";

    $('body').append(alertDialog);

    $('#' + idAlertDialog).modal('show');

    $('.fechar-dialog').click(function () {
        $('#' + idAlertDialog).remove();
    });

}
