$(document).ready(function () {

    $(document).on('click', '.send_js', function () {

        var name = $('.name_js').val();
        var mail = $('.mail_js').val();
        //var phone = $('.phone_js').val();
        if (name != '' && mail != '') {
            $.ajax({
                url: '/pages/default/request',
                type: 'POST',
                data: {
                    name: name,
                    mail: mail,
                   // phone: phone
                },
                success: function (data) {
                    console.log(data);
                }
            });
        }
        return false;
    })

})