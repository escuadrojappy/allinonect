<div class="modal fade" id="visitor-registration-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Visitor Registration Form</h4>
            </div>
            <form id="form">
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" id="tab01" >
                            <a href="#visitor-information" class="name" aria-controls="visitor-information" role="tab" data-toggle="tab" aria-expanded="true">
                                Visitor Information
                            </a>
                        </li>
                        <li role="presentation" class="" id="tab02">
                            <a href="#covid-result" class="name" aria-controls="covid-result" role="tab" data-toggle="tab" aria-expanded="true">
                                Covid Result
                            </a>
                        </li>
                        <li role="presentation" class="" id="tab03">
                            <a href="#scan-id"  class="name" aria-controls="scan-id" role="tab" data-toggle="tab" aria-expanded="true">
                                Scan Information on National ID
                            </a>

                        </li>
                        <!-- <li role="presentation" class="active">
                            <a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="true">
                                Covid History
                            </a>
                        </li> -->
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="visitor-information">
                            <!-- <form id="visitor-registration-form"> -->
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
                                <div class="form-group">
                                    <div class="form-line">
                                        <span>Birthdate</span>
                                        <input type="date" id="birthdate" placeholder="Birthdate" class="form-control" name="birthdate" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Place of Birth</label>
                                        <textarea class="form-control place_of_birth" id="place_of_birth" name="place_of_birth" maxlength="1000" required></textarea>
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
                                        <input type="text" class="form-control" id="philsys_card_number" maxlength="19" name="philsys_card_number" required>
                                        <label class="form-label">PhilSys Card Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" id="email" maxlength="255" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                    
                        <div role="tabpanel" class="tab-pane fade in" id="covid-result">
                            <!-- <form id="covid-result-form"> -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select class="form-control" name="covid_result">
                                            <option value="1">Positive</option>
                                            <option value="0">Negative</option>
                                        </select>
                                        <label class="form-label">Covid Result</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <span>Date of Result</span>
                                        <input type="datetime-local" id="date_result" class="form-control" name="date_result" maxlength="255" required>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="remarks" class="form-control" name="remarks" maxlength="255" required>
                                        <label class="form-label">Remarks</label>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="scan-id">
                            <div class="scanner">
                                <input type="hidden" id="openreader-btn" value="Scan QRCode"/>
                                <div class="row">
                                    <div class="col-md-12"></div>
                                    <div class="col-md-12">
                                        <b>Result:</b>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link col-teal waves-effect">Submit</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    span {
        color: rgb(170, 170, 170);
        font-size: 13px;
    }
</style>

<script>
    $('#form').validate()
    var footer = $('#form .modal-footer').html()

    $(document).on('click', '.nav-tabs li a', function (e) {
        e.preventDefault()
        activeNav = $(this).attr('href')

        if (activeNav === '#scan-id') {
            scanned = true
            $('.modal-footer').hide()
            $('#openreader-btn').qrCodeReader({
                target: "#target-input",
                audioFeedback: true,
                // multiple: true,
                skipDuplicates: false,
                custom: true,
                callback: function(codes) {
                    console.log(codes);
                }
            })
            setTimeout(() => {
                $('#openreader-btn').trigger('click')
            }, 100);
        } else {
            $('.modal-footer').show()
        }
    })

    $(document).on('submit', '#form', function (e) {
        e.preventDefault()

        var params = {}
        formLoader('#form')

        $(`${activeNav} .form-control`).each((k, v) => {
            params[$(v).attr('name')] = $(v).val()
        })

        switch(activeNav) {
            case '#visitor-information':
                if (create) {
                    post(`${apiUrl}admin/visitor`, params).done((result) => {
                        successAlert(
                            'Success!',
                            'Successfully Registered Visitor.',
                            () => { 
                                clearFormFields('#form')
                                $('#visitor-registration-modal').modal('toggle')
                                initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
                            }
                        )
                    }).fail((error) => {
                        errorAlert('Error!', error.responseJSON.message)
                    }).always(() => {
                        rollBackButtons('#form', footer)
                    })
                } else {
                    put(`${apiUrl}admin/visitor/${editId}`, params).done((result) => {
                        successAlert(
                            'Success!',
                            'Successfully Updated Visitor.',
                            () => { 
                                clearFormFields('#form')
                                $('#visitor-registration-modal').modal('toggle')
                                initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
                            }
                        )
                    }).fail((error) => {
                        errorAlert('Error!', error.responseJSON.message)
                    }).always(() => {
                        rollBackButtons('#form', footer)
                    })
                }
                break;
            case '#covid-result':
                params.visitor_id = editId
                params.date_result = moment(params.date_result).format('YYYY-MM-DD HH:mm:ss')
                post(`${apiUrl}admin/visitor/health-status`, params).done((result) => {
                    successAlert(
                        'Success!',
                        'Successfully Updated Visitor Health Status.',
                        () => { 
                            clearFormFields('#form')
                            $('#visitor-registration-modal').modal('toggle')
                            initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
                        }
                    )
                }).fail((error) => {
                    errorAlert('Error!', error.responseJSON.message)
                }).always(() => {
                    rollBackButtons('#form', footer)
                })
                break
            default:
                // code block
        }
    })
</script>