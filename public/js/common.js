var apiUrl = 'http://localhost/allinonect/public/api/'

function post (endpoint, params) {
    return $.ajax({
        url: endpoint,
        type: 'POST',
        data: JSON.stringify(params),
        contentType:"application/json",
        dataType: 'json'
    })
}