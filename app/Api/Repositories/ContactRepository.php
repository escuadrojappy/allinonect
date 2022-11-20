<?php

namespace App\Api\Repositories;

use App\Models\Contact;
use Illuminate\Support\Arr;

class ContactRepository extends Repository
{
   
    /**
     * Create Model Instance.
     *
     * @param \App\Models\Contact $contact
     */
    public function __construct(Contact $contact) 
    {
        $this->model = $contact;

    }

}
