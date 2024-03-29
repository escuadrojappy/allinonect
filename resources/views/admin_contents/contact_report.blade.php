@extends('admin_master_template.master')
@section('content')
<style>
    .btn-filter {
        width: 100%;
        margin-top: 20px;
    }
</style>
    <div class="container-fluid" >
        <div class="row clearfix" >
            <div class="col-md-12">
                <div class="card"  >
                    <div class="header bg-green" >
                        <h2>
                        Contact Report <small>List of all Reports on Citizens.</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                        <button type="button" class="btn bg-red btn-circle-lg btn-report waves-effect waves-circle waves-float pull-right">
                            <i class="material-icons">print</i>
                        </button>
                    </ul>
                    </div>   
                    <div class="body" >
                        <div class="row">
                          <div class="col-sm-2">
                            <b>Entrance Timestamps:</b><br>
                            <input type="text" name="datetimes" class="form-control datepicker" name="datepicker" readonly/>
                          </div>
                          <div class="col-sm-2" >
                            <b>Establishments:</b><br>
                            <select class="form-select form-control establishmentlist" aria-label="Default select example" id="establishmentlist" >
                            <option value="">None</option>
                            </select>
                          </div>
                          <div class="col-sm-2">
                            <b>COVID-19 Results:</b><br>
                            <select class="form-select form-control covid-result" aria-label="Default select example" >
                                <option value="">None</option>
                                <option value="0">Negative</option>
                                <option value="1">Positive</option>
                              </select>
                          </div>
                          <div class="col-sm-3">
                                <button type="button" class="btn btn-success waves-effect btn-filter filter-submit">
                                    Filter
                                </button>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-warning waves-effect btn-filter filter-reset">
                                    Reset Filter
                                </button>
                            </div>    
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>VID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>PCN</th>
                                        <th>Entrance Timestamp</th>
                                        <th>Establishment Visited</th>
                                        <th>COVID-19 Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        var orderBy = [[5, 'desc']]
        var columns = [
            { data: 'visitor_id', name: 'visitor_id' },
            { data: 'visitor_last_name', name: 'visitor_last_name' },
            { data: 'visitor_first_name', name: 'visitor_first_name' },
            { data: 'visitor_middle_name', name: 'visitor_middle_name' },
            { data: 'visitor_philsys_card_number', name: 'visitor_philsys_card_number' },
            { data: 'entrance_timestamp', name: 'entrance_timestamp' },
            { data: 'establishment_name', name: 'establishment_name' },
            { data: 'covid_result', name: 'covid_result' }
        ]
    
        dateRangePicker('.datepicker')

        initDataTable('.dataTable', columns, 'admin/contact-tracing', orderBy, false)

        $(document).on('click', '.filter-submit', function (e) {
            e.preventDefault()

            var additionalParams = {}

            if ($('.datepicker').val() !== 'None') {
                var dateRangePicker = $('.datepicker').val().split('-')
                var startDate = moment(dateRangePicker[0]).format('YYYY-MM-DD HH:mm:ss')
                var endDate = moment(dateRangePicker[1]).format('YYYY-MM-DD HH:mm:ss')
                additionalParams = {
                    date_range: [
                        {
                            start_date: startDate,
                            end_date: endDate
                        }
                    ]
                }
            }

            var covidResult = $('.covid-result').val()
            var establishmentId = $('.establishmentlist').val()
            var dataTableSearch = $('.dataTables_filter input[type="search"]').val()
            console.log(establishmentId)
            if (establishmentId) additionalParams.establishment_id = establishmentId
            if (covidResult !== null && covidResult !== undefined) additionalParams.covid_result = covidResult
            if (dataTableSearch !== '') additionalParams.search = dataTableSearch

            initDataTable('.dataTable', columns, 'admin/contact-tracing', orderBy, false, additionalParams)
        })

        $(document).on('click', '.filter-reset', function (e) {
            e.preventDefault()
            $('.covid-result').val('').change()
            $('.datepicker').val('None')
            $('.establishmentlist').val(null).change()
            initDataTable('.dataTable', columns, 'admin/contact-tracing', orderBy, false)
        })

        $(document).on('click', '.btn-report', function (e) {
            e.preventDefault()
            fetch(`${apiUrl}admin/contact-tracing/report`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(generateReportParams)
            }).then(async (result) => {
                return {
                    filename: result.headers.get('filename'),
                    excel: await result.blob()
                }
            }).then(({ filename, excel }) => {
                const element = document.createElement('a');
                element.setAttribute('download', filename);
                const href = URL.createObjectURL(excel);
                element.href = href;
                element.setAttribute('target', '_blank');
                element.click();
                URL.revokeObjectURL(href);
            }).catch((error) => {
                console.log(error)
            })
        })

        $("#establishmentlist").select2({
            ajax: {
                url: `${apiUrl}admin/establishment`,
                delay: 250,
                dataType: 'json',
                type: 'GET',
                data: function (term) {
                    return {
                        term: term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

    </script>
@endsection
