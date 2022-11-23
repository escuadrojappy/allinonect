var apiUrl = 'http://localhost/allinonect/public/api/'

/*
|--------------------------------------------------------------------------
| Http Requests Helpers
|--------------------------------------------------------------------------
*/

function post (endpoint, params) {
    return $.ajax({
        url: endpoint,
        type: 'POST',
        data: JSON.stringify(params),
        contentType:"application/json",
        dataType: 'json'
    })
}

/*
|--------------------------------------------------------------------------
| Alert Helpers
|--------------------------------------------------------------------------
*/

function successAlert (title, content, action=null) {
    $.confirm({
        title,
        content,
        type: 'green',
        typeAnimated: true,
        buttons: {
            success: {
                text: 'Okay',
                btnClass: 'btn-green',
                action
            }
        }
    })
}

function errorAlert (title, content, action=null) {
    $.confirm({
        title,
        content,
        type: 'red',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Try Again',
                btnClass: 'btn-red',
                action
            }
        }
    })
}

/*
|--------------------------------------------------------------------------
| Form Helpers
|--------------------------------------------------------------------------
*/

function resetForm (formId) {
    $(formId)[0].reset()
    $(`${formId} div.form-line`).each(function(key, element) {
        $(element).removeClass('focused')
    })
}

function formLoader (formId) {
    $(`${formId} .modal-footer`).html('')
    $(`${formId} .modal-footer`).prepend(`
        <div class="preloader pl-size-xs">
            <div class="spinner-layer pl-grey">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    `)
}

function rollBackButtons (formId) {
    $(`${formId} .modal-footer`).html(`
        <button type="submit" class="btn btn-link col-teal waves-effect">SAVE CHANGES</button>
        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
    `)
}