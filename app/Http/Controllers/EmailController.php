<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Http\Resources\EmailResource;
use App\Models\Email;

class EmailController extends Controller
{
    public function index()
    {
        return EmailResource::collection(Email::all());
    }

    public function store(EmailRequest $request)
    {
        return new EmailResource(Email::create($request->validated()));
    }

    public function show(Email $email)
    {
        return new EmailResource($email);
    }

    public function update(EmailRequest $request, Email $email)
    {
        $email->update($request->validated());

        return new EmailResource($email);
    }

    public function destroy(Email $email)
    {
        $email->delete();

        return response()->json();
    }
}
