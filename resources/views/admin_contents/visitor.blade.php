@extends('admin_master_template.master')
@section('content')
<style>
    ::-webkit-datetime-edit-year-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-month-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
        color: transparent;
    }
</style>
<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);">User Accounts</a></li>
                    <li class="active">Visitors</li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Visitors <small>List of all Visitors</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <button type="button" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float btn-modal-add" data-toggle="modal" data-target="#visitor-registration-modal">
                                <i class="material-icons">add</i>
                            </button>
                            @include('admin_contents.visitor_registration_modal')
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>VID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>PCN</th>
                                        <th>Covid Result</th>
                                        <th>Date Result</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                {{-- @include('admin_contents.visitor_registration_and_result_modal') --}}
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
        var create = true
        var editId = null
        var orderBy = [[0, 'desc']]
        var activeNav = null
        var scanned = false
        var columns = [
            { data: 'id', name: 'visitors.id' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'philsys_card_number', name: 'philsys_card_number' },
            { data: 'covid_result', name: 'covid_result' },
            { data: 'date_result', name: 'date_result' },
        ]

        $(document).on('click', '.btn-modal-add', function (e) {
            e.preventDefault()
            clearFormFields('#form')
            $('#visitor-registration-modal .modal-title').text('Visitor Registration Form')
            $('#visitor-registration-modal button[type="submit"]').text('Submit')
            hideNavsOnReg()
            create = true
        })

        $(document).on('click', '.edit', function (e) {
            e.preventDefault()
            var id = $(this).attr('id')
            create = false
            editId = id
            hideNavsOnEdit()
            getValues(this)
            $('#visitor-registration-modal').modal('toggle')
            $('#visitor-registration-modal .modal-title').text('Visitor Form')
            $('#visitor-registration-modal button[type="submit"]').text('Update')
        })

        $(document).on('click', '.delete', function (e) {
            e.preventDefault()
            var id = $(this).attr('id')
            confirmAlert(
                'Confirm!',
                'Are you sure you want to delete?',
                () => {
                    destroy(`${apiUrl}admin/visitor/${id}`).done((result) => {
                        successAlert(
                            'Success!',
                            'Successfully Deleted Visitor.',
                            () => { 
                                clearFormFields('#form')
                                initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
                            }
                        )
                    }).fail((error) => {
                        errorAlert('Error!', error.responseJSON.message)
                    }).always(() => {
                        rollBackButtons('#form', footer)
                    })
                }
            )
        })

        $('#visitor-registration-modal').on('hidden.bs.modal', function () {
            if (!scanned) return false
            initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
        })

        function removeActiveNavs () {
            $('.nav-tabs li').removeClass('active')
            $('.tab-content div.tab-pane.active').removeClass('active')
        }

        function hideNavsOnEdit () {
            removeActiveNavs()
            $('.nav-tabs #tab01').addClass('active')
            // $('.tab-content div#covid-result').addClass('active')
            $('.tab-content div#visitor-information').addClass('active')
            $('.tab-content div#visitor-information').css({ opacity: 1 })
            $('.modal-footer').show()
            $('#tab02').show()
            $('#tab01').show()
            $('#tab03').hide()
            getActiveNav()
        }

        function hideNavsOnReg () {
            removeActiveNavs()
            $('.nav-tabs #tab01').addClass('active')
            $('.tab-content div#visitor-information').addClass('active')
            $('.tab-content div#visitor-information').css({ opacity: 1 })
            $('.modal-footer').show()
            $('#tab01').show()
            $('#tab03').show()
            $('#tab02').hide()
            getActiveNav()
        }

        function getActiveNav () {
            activeNav = $('.nav-tabs li.active a').attr('href')
            scanned = false
        }

        function getValues (element) {
            var id = $(element).attr('id')
            var first_name = $(element).attr('first_name')
            var middle_name = $(element).attr('middle_name')
            var last_name = $(element).attr('last_name')
            var philsys_card_number = $(element).attr('philsys_card_number')
            var contact_number = $(element).attr('contact_number')
            var place_of_birth = $(element).attr('place_of_birth')
            var email = $(element).attr('email') !== 'null' ? $(element).attr('email') : ''
            var birthdate = $(element).attr('birthdate')

            $('#first_name').val(first_name).prop('readonly', true).parent().addClass('focused')
            $('#middle_name').val(middle_name).prop('readonly', true).parent().addClass('focused')
            $('#last_name').val(last_name).prop('readonly', true).parent().addClass('focused')
            $('#philsys_card_number').prop('readonly', true).val(philsys_card_number).parent().addClass('focused')
            $('#place_of_birth').val(place_of_birth).prop('readonly', true).parent().addClass('focused')
            $('#email').val(email).prop('readonly', true).parent().addClass('focused')
            $('#contact_number').val(contact_number).parent().addClass('focused')
            $('#birthdate').val(birthdate).prop('readonly', true).parent().addClass('focused')
        }

        initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
</script>

@endsection