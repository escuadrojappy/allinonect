<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\Services\{
    AdminService,
    EstablishmentService,
    VisitorService,
};
use App\Http\Requests\Admin\{
    ContactTracingAdminRequest,
    GenerateContactTracingAdminReportRequest,
    RegistrationEstablishmentRequest,
    CreateVisitorRequest,
    CreateVisitorByQrCodeRequest,
    DestroyVisitorRequest,
    CreateVisitorHealthStatusRequest,
    ForgotPasswordRequest,
};
use App\Http\Requests\Establishment\{
    IndexEstablishmentRequest,
    DestroyEstablishmentRequest,
    UpdateEstablishmentRequest,
};
use App\Http\Requests\Search\{
    AdminSearchEstablishmentRequest,
};
use App\Http\Requests\Visitor\{
    UpdateVisitorRequest,
};

class ForgotPasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        return $this->ForgotPasswordService->forgotPassword($request->validated());
    }

}
