/*
|--------------------------------------------------------------------------
| Variables
|--------------------------------------------------------------------------
*/

var apiUrl = 'http://localhost/allinonect/public/api/'
var webUrl = 'http://localhost/allinonect/public/'

if (window.location.origin.indexOf('aioctracing') > -1) {
    var apiUrl = 'https://aioctracing.com/api/'
    var webUrl = 'https://aioctracing.com/'
}

var authCommon = null
var generateReportParams = null

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

function get (endpoint) {
    return $.ajax({
        url: endpoint,
        type: 'GET',
        contentType:"application/json",
        dataType: 'json'
    })
}


function put (endpoint, params) {
    return $.ajax({
        url: endpoint,
        type: 'PUT',
        data: JSON.stringify(params),
        contentType:"application/json",
        dataType: 'json'
    })
}

function destroy (endpoint) {
    return $.ajax({
        url: endpoint,
        type: 'DELETE',
        contentType:"application/json",
        dataType: 'json'
    })
}

/*
|--------------------------------------------------------------------------
| APIs
|--------------------------------------------------------------------------
*/
function apiScanner (json) {
    return new Promise((resolve, reject) => {
        var params = {
            establishment_id: authCommon.establishment.id,
            qrcode_result: JSON.stringify(JSON.parse(json))
        }
        post(`${apiUrl}establishments/visitor/scan`, params).done((result) => {
            successAlert(
                'Success!',
                'Successfully Scanned Visitor!',
                () => { 
                    resolve(result)
                }
            )
        }).fail((error) => {
            errorAlert(
                'Error!',
                error.responseJSON.message,
                () => {
                    reject(error)
                }
            )
        })  
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

function confirmAlert (title, content, action) {
    $.confirm({
        title,
        content,
        buttons: {
            yes: {
                text: 'Yes',
                btnClass: 'btn-green',
                keys: ['enter'],
                action
            },
            no: {
                text: 'No',
                btnClass: 'btn-red',
                keys: ['esc'],
            }
        }
    });
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
    $(`${formId} .modal-footer`).html(`
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

function rollBackButtons (formId, element = null) {
    if (element) {
        $(`${formId} .modal-footer`).html(element)
    } else {
        $(`${formId} .modal-footer`).html(`
            <button type="submit" class="btn btn-link col-teal waves-effect">Register</button>
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
        `)
    }
}

function clearFormFields (formId) {
    $(`${formId} input, textarea`).each((key, element) => {
        if ($(element).attr('readonly')) {
            $(element).prop('readonly', false)
        }
        if ($(element).parent().hasClass('focused')) {
            $(element).parent().removeClass('focused')
        }
        $(element).val('')
    })
}

/*
|--------------------------------------------------------------------------
| Data Table Helpers
|--------------------------------------------------------------------------
*/

function initDataTable (element, columns, url, orderBy = null, action = true, additionalParams = null) {
    var actionRender = {
        orderable: false,
        render: function (data, type, row, meta) {
            var attributes = ''
            $.each(row, (key, value) => {
                attributes += `${key}="${value}" `
            })
            if (action) {
                return `
                    <button type="button" class="btn btn-success waves-effect edit" ${attributes}>
                        <i class="material-icons">mode_edit</i>
                    </button>
                    <button type="button" class="btn btn-danger waves-effect delete" ${attributes}>
                        <i class="material-icons">delete</i>
                    </button>
                `
            }
        },
    }
    $(element).DataTable({
        pagingType: 'full_numbers',
        destroy: true,
        order: orderBy,
        responsive: true,
        processing: true,
        serverSide: true,
        search: {
            return: true,
        },
        language: {
            processing: 
            `
                <div style="display: flex; align-items: center; justify-content: center;">
                    <div>
                        <div class="preloader">
                            <div class="spinner-layer pl-grey">
                                <div class="circle-clipper left">
                                    <div class="circle"></div>
                                </div>
                                <div class="circle-clipper right">
                                    <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                        <br> Loading...
                    </div>
                </div>
            `
        },
        ajax: {
            url: `${apiUrl}${url}`,
            type: 'POST',
            data: function (params) {
                var columnIndex = params.order[0].column
                params.order[0].column = params.columns[columnIndex].name
                params.per_page = params.length
                params.page = (params.start / params.length) + 1
                params.order = params.order[0]
                params.search = params.search.value
                if (additionalParams) {
                    $.each(additionalParams, (k, v) => {
                        if (k === 'search') $('.dataTables_filter input[type="search"]').val(v)
                        if (v != '') params[k] = v
                    })
                }
                generateReportParams = params
            },
        },
        columns: action ? [...columns, actionRender] : [...columns]
    })
}

/*
|--------------------------------------------------------------------------
| Date Range Helpers
|--------------------------------------------------------------------------
*/
function dateRangePicker (element) {
    $(element).daterangepicker({
        timePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY/MM/DD HH:mm:ss',
            cancelLabel: 'Clear'
        },
    })

    $(element).on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY HH:mm:ss') + ' - ' + picker.endDate.format('MM/DD/YYYY HH:mm:ss'))
    })
  
    $(element).on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('None')
    });

    $(element).val('None')
}