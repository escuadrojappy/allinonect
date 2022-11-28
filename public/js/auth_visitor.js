function authVisitor () {
    get(`${apiUrl}auth`).then(({ role_id }) => {
        if (role_id !== 3) {
            return get(`${apiUrl}auth/logout`)
        } else {
            $('.page-loader-wrapper').fadeOut()
        }
    }).then((result) => {
        if (result) location.href = webUrl + 'login/citizen'
    }).fail((error) => {
        location.href = webUrl + 'login/citizen'
    })
}

authVisitor()