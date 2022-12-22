<div class="modal fade" id="visitor-registration-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Visitor Registration Form</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#visitor-information" aria-controls="visitor-information" role="tab" data-toggle="tab" aria-expanded="true">
                            Visitor Information
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#covid-result" aria-controls="covid-result" role="tab" data-toggle="tab" aria-expanded="true">
                            Covid Result
                        </a>
                    </li>
                    <!-- <li role="presentation" class="active">
                        <a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true">
                            Covid History
                        </a>
                    </li> -->
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="visitor-information">
                        <form id="visitor-registration-form">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="first_name" class="form-control" name="first_name" maxlength="255" required>
                                    <label class="form-label">First Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="middle_name" class="form-control" name="middle_name" maxlength="255" required>
                                    <label class="form-label">Middle Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="last_name" class="form-control" name="last_name" maxlength="255" required>
                                    <label class="form-label">Last Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="date" id="date" class="form-control" name="date" maxlength="255" required>
                                    <label class="form-label">Birthdate</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Place of Birth</label>
                                    <textarea class="form-control address" id="address" name="address" maxlength="1000" required></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" id="contact_number" maxlength="11" name="contact_number" required>
                                    <label class="form-label">Contact Number</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="philsys_number" maxlength="19" name="philsys_number" required>
                                    <label class="form-label">PhilSys Card Number</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" id="email" maxlength="255" name="email" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="covid-result">
                        <form id="covid-result-form">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="covid_results" class="form-control" name="covid_results" maxlength="255" required>
                                    <label class="form-label">COVID-19 Result</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line focused">
                                    <input type="date" id="date_of_result" class="form-control" name="date_of_result" maxlength="255" required>
                                    <label class="form-label">Date of Result</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="remarks" class="form-control" name="remarks" maxlength="255" required>
                                    <label class="form-label">Remarks</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link col-teal waves-effect">Register</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#visitor-registration-form').validate()
    $(document).on('submit', '#visitor-registration-form', function (e) {
        e.preventDefault()
        formLoader('#visitor-registration-form')
        var params = {
            first_name: $('#first_name').val(),
            middle_name: $('#middle_name').val(),
            last_name: $('#last_name').val(),
            date: $('#date').val(),
            address: $('#address').val(),
            contact_number: $('#contact_number').val(),
            philsys_card_number: $('#philsys_card_number').val(),
            email: $('#email').val(),
            role_id: 3
        }
    })
</script>