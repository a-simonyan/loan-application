<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @description Show the view with clients list
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.index',compact('clients'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @description Show the view for create a client
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * @param ClientRequest $request
     * @param ClientService $service
     * @return void
     * @description Call the create function from the service
     */
    public function store(ClientRequest $request, ClientService $service)
    {
        $client = $service->create($request->validated());
        if ($client) {
            return redirect()->route('client.index')->withSuccess('Client created successfully');
        }
    }

    /**
     * @param Client $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @description Show the view for edit a client
     */
    public function edit(Client $client)
    {
        return view('client.edit',compact('client'));
    }

    /**
     * @param ClientUpdateRequest $request
     * @param Client $client
     * @param ClientService $service
     * @return \Illuminate\Http\RedirectResponse|void
     * @description Call the update function from the service, verifying that the product is assigned to the logged in adviser
     */
    public function update(ClientUpdateRequest $request, Client $client, ClientService $service)
    {
        if(
            ($client->cashLoanProducts &&  Auth::id() !== $client->cashLoanProducts->adviser_id) ||
            ($client->homeLoanProducts &&  Auth::id() !== $client->homeLoanProducts->adviser_id)
        ) {
            return redirect()->back()->withErrors(['access' => "You don't have permission for this action"]);
        }
        $client = $service->update($client,$request->validated());
        if ($client) {
            return redirect()->route('client.index')->withSuccess('Client updated successfully');
        }
    }

    /**
     * @param Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @description Delete the client function, verifying that the client has a product and the product is assigned to the logged in advisor or the client doesn't have a product
     */
    public function destroy(Client $client)
    {
        if(
            ($client->cashLoanProducts &&  Auth::id() !== $client->cashLoanProducts->adviser_id) ||
            ($client->homeLoanProducts &&  Auth::id() !== $client->homeLoanProducts->adviser_id)
        ) {
            return redirect()->back()->withErrors(['access' => "You don't have permission for this action"]);
        }
        $client->delete();
        return redirect()->route('client.index')
            ->withSuccess(__('Client deleted successfully.'));
    }
}
