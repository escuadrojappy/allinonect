function authEstablishment () {
    get(`${apiUrl}auth`).then((result) => {
        if (result.role_id !== 2) {
            return get(`${apiUrl}auth/logout`)
        } else {
            authCommon = result
            $('.page-loader-wrapper').fadeOut()
            $('.name-establishment').text(result.establishment.name)
            $('.address-establishment').text(result.establishment.address)
        }
    }).then((result) => {
        if (result) location.href = webUrl + 'login/establishment'
    }).fail((error) => {
        location.href = webUrl + 'login/establishment'
    })
}

authEstablishment()