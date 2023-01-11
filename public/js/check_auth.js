function authEstablishment () {
    get(`${apiUrl}auth`).done(({ role_id }) => {
        alert('You Are Already Logged In!')
        switch (role_id) {
            case 1:
                location.href = webUrl + 'admin/dashboard'
                break
            case 2:
                location.href = webUrl + 'establishment/dashboard'
                break
            case 3:
                location.href = webUrl + 'citizen/dashboard'
                break
        }
    }).fail((error) => {
        // location.href = webUrl 
    })
}

authEstablishment()