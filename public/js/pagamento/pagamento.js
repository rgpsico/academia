
var config = document.createElement('script');
config.src = '../../../js/config/config.js' ?? '../../js/config/config.js';
document.head.appendChild(config);

$('.bt-habilitar').click(function (event) {
    event.preventDefault();
    $('#confirmar-usuario-modal').modal('show');
    getUser()

});

$('.bt-logar').click(function (event) {
    let nome = $('.nome-usuario').val();
    let password = $('.password').val();
    if (authUsuer(nome, password)) {

    }
});

function authUsuer(nome, password) {
    request = $.ajax({
        type: "POST",
        url: urlApi + '/auth',
        data: {
            name: nome,
            password: password
        },
        statusCode: {
            200: function (data) {
                console.log(data)
                $('#confirmar-usuario-modal').modal('hide');
                $('.bt-habilitar').hide();
                $('.pagar').removeClass('d-none');
                $('#name').val(data.name)
                $('#user_id').val(data.id)
                $('#name').prop('disabled', true);
            },
            403: function () {
                console.log('erro ao Logar')
            }
        }
    });
}

function getUser() {
    $('.nome-usuario').html(' ')
    $.get(urlApi + '/users',
        function (data) {
            for (x = 0; x < data.length; x++) {
                $('.nome-usuario').append(`<option value="${data[x].name}">${data[x].name}</option>`);

            }

        });
}