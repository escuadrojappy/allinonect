<?php
  
namespace App\Http\Controllers\Api;
  
use App\Http\Controllers\Controller;
use App\Api\Services\ContactService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;

  
class ContactController extends Controller
{
     /**
     * The service instance.
     *
     * @return \App\Api\Services\ContactService $contactService
     */
    protected $contactService;

    /**
     * Create service instance.
     *
     * @param \App\Api\Services\ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

   
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(StoreContactRequest $request)
    {
        return $this->contactService->store($request->validated()); 
        // dd('asd');
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|digits:10|numeric',
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
  
        // Contact::create($request->all());
  
        // return redirect()->back()
        //                  ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }

}