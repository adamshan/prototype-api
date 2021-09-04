<?php

namespace App\Http\Controllers;

use App\APIError;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return Service::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request->all(), [
            'name' => 'required',
            'contact' => 'required',
            'adresse' => 'required'
        ]);
        $service = Service::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'adresse' => $request->adresse
        ]);

        return response()->json($service,201);
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        return Service::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service == null) {
            $notFoundError = new APIError;
            $notFoundError->setStatus("404");
            $notFoundError->setCode("SERVICE_NOT_FOUND");
            $notFoundError->setMessage("Service  with id " . $id . " not found");
            return response()->json($notFoundError, 404);
        }
        Service::find($id)->delete();
        return response()->json(null);
    }

}
