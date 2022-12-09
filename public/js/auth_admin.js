function authAdmin () {
    get(`${apiUrl}auth`).then(({ role_id }) => {
        if (role_id !== 1) {
            return get(`${apiUrl}auth/logout`)
        } else {
            $('.page-loader-wrapper').fadeOut()
        }
    }).then((result) => {
        if (result) location.href = webUrl + 'login/admin'
    }).fail((error) => {
        location.href = webUrl + 'login/admin'
    })
}

authAdmin()