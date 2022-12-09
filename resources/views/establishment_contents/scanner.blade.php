@extends('establishment_master_template.master')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QR Code Scanner <small>Scan Visitors here...</small>
                    </h2>
                </div>
                <div class="body">
                    <div class="scanner">
                        <input type="hidden" id="openreader-btn" value="Scan QRCode"/>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <b>Result:</b>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
@endsection