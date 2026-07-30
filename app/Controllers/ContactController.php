<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ContactController extends BaseController
{
    public function submit()
    {
        $data = $this->request->getJSON(true);

        $rules = [
            'name' => [
                'label' => 'Name',
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[A-Za-z ]+$/]'
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            'phone' => [
                'label' => 'Phone',
                'rules' => 'required|regex_match[/^[6-9][0-9]{9}$/]'
            ],
            'city' => [
                'label' => 'City',
                'rules' => 'required'
            ],
            'concern' => [
                'label' => 'Procedure',
                'rules' => 'required'
            ],
            'source_url'   => 'required',
            'source_id'    => 'required',
            'campaign_id'  => 'required',
            'campaign_name'=> 'required',
            'form_id'      => 'required',
            'form_name'    => 'required'
        ];

        if (!$this->validateData($data, $rules)) {
            return $this->response
                ->setStatusCode(ResponseInterface::HTTP_UNPROCESSABLE_ENTITY)
                ->setJSON([
                    'status'  => false,
                    'message' => 'Validation failed.',
                    'errors'  => $this->validator->getErrors()
                ]);
        }

        $client = Services::curlrequest();

        try {

            $url = rtrim(env('api.baseURL'), '/') . '/campaign-leads';

            $response = $client->post($url, [

                'http_errors' => false,

                'headers' => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
                    'X-CSRF-TOKEN' => ''
                ],

                'json' => [
                    'name'                  => $data['name'],
                    'email'                 => $data['email'],
                    'mobile_country_code'   => '91',
                    'mobile'                => $data['phone'],
                    'city'                  => $data['city'],
                    'source_id'             => $data['source_id'],
                    'source_url'            => $data['source_url'],
                    'description'           => $data['message'] ?? $data['concern'],
                    'campaign_id'           => $data['campaign_id'],
                    'campaign_name'         => $data['campaign_name'],
                    'ad_id'                 => $data['ad_id'] ?: null,
                    'ad_name'               => $data['ad_name'] ?: null,
                    'form_id'               => $data['form_id'],
                    'form_name'             => $data['form_name'],
                   'procedure_category_id' => (int) $data['concern']
                ]
            ]);

            return $this->response->setJSON([
                'status'      => true,
                'status_code' => $response->getStatusCode(),
                'body'        => json_decode($response->getBody(), true),
                'raw'         => $response->getBody()
            ]);

        } catch (\Throwable $e) {

            return $this->response->setStatusCode(500)->setJSON([
                'status'  => false,
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine()
            ]);

        }
    }
}