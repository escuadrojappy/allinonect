@extends('establishment_master_template.master')
@section('content')
<style>
    .btn-filter {
        width: 100%;
        margin-top: 20px;
    }

    .btn-report {
        margin-top: -5px;
    }
</style>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="javascript:void(0);">Contacts</a></li>
                <li class="active">Contact Tracing</li>
            </ol>
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Contact Tracing <small>List of all Reports on Visitors</small>
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <button type="button" class="btn bg-red btn-circle-lg btn-report waves-effect waves-circle waves-float pull-right">
                            <i class="material-icons">print</i>
                        </button>
                    </ul>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-3">
                            <b>Entrance Timestamps:</b><br>
                            <input type="text" class="form-control datepicker" name="datepicker" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <b>COVID-19 Results:</b><br>
                            <select class="form-select form-control covid-result" aria-label="Default select example">
                                <option value="">None</option>
                                <option value="0">Negative</option>
                                <option value="1">Positive</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success waves-effect btn-filter filter-submit">
                                Filter
                            </button>
                        </div>
                        <div class="col-md-3">
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
                                    <th>COVID-19 Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var columns = [
        { data: 'visitor_id', name: 'visitor_id' },
        { data: 'visitor_last_name', name: 'visitor_last_name' },
        { data: 'visitor_first_name', name: 'visitor_first_name' },
        { data: 'visitor_middle_name', name: 'visitor_middle_name' },
        { data: 'visitor_philsys_card_number', name: 'visitor_philsys_card_number' },
        { data: 'entrance_timestamp', name: 'entrance_timestamp' },
        { data: 'covid_result', name: 'covid_result' }
    ]
    
    var orderBy = [[5, 'desc']]
    
    dateRangePicker('.datepicker')

    initDataTable('.dataTable', columns, 'establishments/contact-tracing', orderBy, false)

    $(document).on('click', '.filter-submit', function (e) {
        e.preventDefault()
        var dateRangePicker = $('.datepicker').val().split('-')
        var startDate = moment(dateRangePicker[0]).format('YYYY-MM-DD HH:mm:ss')
        var endDate = moment(dateRangePicker[1]).format('YYYY-MM-DD HH:mm:ss')
        var covidResult = $('.covid-result').val()
        var dataTableSearch = $('.dataTables_filter input[type="search"]').val()

        var additionalParams = {
            date_range: [
                {
                    start_date: startDate,
                    end_date: endDate
                }
            ]
        }

        if (covidResult !== null && covidResult !== undefined) additionalParams.covid_result = covidResult
        if (dataTableSearch !== '') additionalParams.search = dataTableSearch

        initDataTable('.dataTable', columns, 'establishments/contact-tracing', orderBy, false, additionalParams)
    })

    $(document).on('click', '.filter-reset', function (e) {
        e.preventDefault()
        $('.covid-result').val('').change()
        initDataTable('.dataTable', columns, 'establishments/contact-tracing', orderBy, false)
    })

    $(document).on('click', '.btn-report', function (e) {
        e.preventDefault()
        fetch(`${apiUrl}establishments/contact-tracing/report`, {
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
</script>
@endsection