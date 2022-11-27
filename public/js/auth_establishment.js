function authEstablishment () {
    get(`${apiUrl}auth`).then(({ role_id }) => {
        if (role_id !== 2) {
            return get(`${apiUrl}auth/logout`)
        } else {
            $('.page-loader-wrapper').fadeOut()
            
        }
    }).then((result) => {
        if (result) location.href = webUrl + 'login/establishment'
    }).fail((error) => {
        location.href = webUrl + 'login/establishment'
    })
    
}

authEstablishment()