<div class="modal fade" id="establishment-registration-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Establishment Registration Form</h4>
            </div>
            <form id="establishment-registration-form">
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="name" class="form-control" name="name" maxlength="255" required>
                            <label class="form-label">Business Name</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Business Address</label>
                            <textarea class="form-control address" id="address" name="address" maxlength="1000" required></textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" maxlength="255" name="email" required>
                            <label class="form-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" id="contact_number" maxlength="11" name="contact_number" required>
                            <label class="form-label">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link col-teal waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#establishment-registration-form').validate()
        $(document).on('submit', '#establishment-registration-form', function (e) {
            e.preventDefault()
            formLoader('#establishment-registration-form')
            var params = {
                email: $('#email').val(),
                name: $('#name').val(),
                address: $('#address').val(),
                contact_number: $('#contact_number').val(),
                role_id: 2
            }
            $.post(`${apiUrl}auth/registration`, params).done((result) => {
                successAlert(
                    'Success!',
                    'Successfully Registered Establishment.',
                    () => { 
                        resetForm('#establishment-registration-form')
                        $('#establishment-registration-modal').modal('toggle')
                    }
                )
            }).fail((error) => {
                errorAlert('Error!', error.responseJSON.message)
            }).always(() => {
                rollBackButtons('#establishment-registration-form')
            })
        })
    })
</script>