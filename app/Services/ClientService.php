<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    /**
     * @param array $data
     * @return true
     * @description Create a client and products in database
     */
    public function create(array $data)
    {
        $client = Client::create(
            Arr::only($data, [
                'first_name',
                'last_name',
                'email',
                'phone_number'
            ])
        );

        if (isset($data['loan_type_cash'])) {
            $client->cashLoanProducts()->create([
                'adviser_id' => Auth::id(),
                'loan_amount' => $data['loan_amount']
            ]);
        }

        if (isset($data['loan_type_home'])) {
            $client->homeLoanProducts()->create([
                'adviser_id' => Auth::id(),
                'property_value' => $data['property_value'],
                'down_payment_amount' => $data['down_payment_amount']
            ]);
        }

        return true;
    }


    /**
     * @param Client $client
     * @param array $data
     * @return true
     * @description Update a client and products in database
     */
    public function update(Client $client, array $data)
    {
        $client->update(
            Arr::only($data, [
                'first_name',
                'last_name',
                'email',
                'phone_number'
            ])
        );
        if (!isset($data['loan_type_cash']) && $client->cashLoanProducts) {
            $client->cashLoanProducts()->delete();
        } elseif (isset($data['loan_type_cash']) && !$client->cashLoanProducts) {
            $client->cashLoanProducts()->create([
                'adviser_id' => Auth::id(),
                'loan_amount' => $data['loan_amount']
            ]);
        } elseif (isset($data['loan_type_cash']) && $client->cashLoanProducts) {
            $client->cashLoanProducts()->update([
                'loan_amount' => $data['loan_amount']
            ]);
        }


        if (!isset($data['loan_type_home']) && $client->homeLoanProducts) {
            $client->homeLoanProducts()->delete();
        } elseif (isset($data['loan_type_home']) && !$client->homeLoanProducts) {
            $client->homeLoanProducts()->create([
                'adviser_id' => Auth::id(),
                'property_value' => $data['property_value'],
                'down_payment_amount' => $data['down_payment_amount']
            ]);
        } elseif (isset($data['loan_type_home']) && $client->homeLoanProducts) {
            $client->homeLoanProducts()->update([
                'property_value' => $data['property_value'],
                'down_payment_amount' => $data['down_payment_amount']
            ]);
        }
        return true;
    }
}
