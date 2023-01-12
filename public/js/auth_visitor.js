function authVisitor () {
    get(`${apiUrl}auth`).then((result) => {
        if (result.role_id !== 3) {
            return get(`${apiUrl}auth/logout`)
        } else {
            authCommon = result
            $('.page-loader-wrapper').fadeOut()
            $('.name-visitor').text(result.visitor.first_name + " " + result.visitor.last_name)
            $('.email-visitor').text(result.email)
            $('.address-visitor').text(result.visitor.place_of_birth)
            $('.birthdate-visitor').text(result.visitor.birthdate)
            $('.contact-number-visitor').text(result.visitor.contact_number)
            $('.covid-result-visitor').text(result.visitor.health_status.covid_result ? 'POSTIVE' : 'NEGATIVE')
        }
    }).then((result) => {
        if (result) location.href = webUrl + 'login/citizen'
    }).fail((error) => {
        location.href = webUrl + 'login/citizen'
    })
}

authVisitor()