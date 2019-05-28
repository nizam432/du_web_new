function numbersonly(myfield, e, dec)
{
    var key;
    var keychar;

    if (window.event)
        key = window.event.keyCode;
    else if (e)
        key = e.which;
    else
        return true;
    keychar = String.fromCharCode(key);

    // control keys
    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27))
        return true;

    // numbers
    else if ((("0123456789.").indexOf(keychar) > -1))
        return true;
    else
        return false;
}

function view_message(data, url, modal_id, form_id) {

    if (data)
    {
        var datas = data.split('##');
        if (datas[1] == 1)//Successful==1
        {
            $("#messagebox").fadeTo(200, 0.1, function () {
                $(this).html(datas[0]).fadeTo(900, 1);
                $('html, body').animate({scrollTop: 0}, 800);
                $(this).fadeOut(4000);
            });

            if (url != '')
            {
                setTimeout(function () {
                    window.location.href = url;
                }, 4000);
            }

            if (modal_id != '')
            {
                $('#' + modal_id).modal('hide');
            }

            if (form_id != '')
            {
                //alert (form_id);
                $('#' + form_id)[0].reset();
            }


        } else//Not Successful ==2
        {
            $("#messagebox").fadeTo(200, 0.1, function () {
                $(this).html(datas[0]).fadeTo(900, 1);
                $('html, body').animate({scrollTop: 0}, 800);
                //$(this).fadeOut(5000);
            });
        }
    } else
    {
        $("#messagebox").fadeTo(200, 0.1, function () {
            $(this).html('No Message Found').fadeTo(900, 1);
            $('html, body').animate({scrollTop: 0}, 800);
            //$(this).fadeOut(5000);
        });
    }
}