<?php

namespace Mixdinternet\Slackin\Http\Controllers;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Mixdinternet\Slackin\Http\Requests\InviteRequest;

class SlackinController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://slack.com/api/',
        ]);
    }

    public function index()
    {
        $view = [];
        $view['slack'] = $this->getSlackInfo();

        return view('mixdinternet/slackin::index', $view);
    }

    public function invite(InviteRequest $request)
    {
        $form_params = [
            #'first_name' => $request->get('username'),
            'email' => $request->get('email'),
            'channels' => config('services.slack.channel'),
            'resend' => config('services.slack.resend'),
            'token' => config('services.slack.token'),
        ];

        $response = $this->client->request('POST', 'users.admin.invite', [
            'form_params' => $form_params
        ]);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('slackin.index')->with('success', 'Email enviado com sucesso!');
        }

        return redirect()->route('slackin.index')->with('error', 'Falha no cadastro.');
    }

    private function getSlackInfo()
    {
        return cache()->remember(md5('team-' . config('services.slack.token')), 60 * 24, function () {
            $response = $this->client->request('POST', 'team.info', [
                'form_params' => [
                    'token' => config('services.slack.token')
                ]
            ]);

            return json_decode((string)$response->getBody());
        });
    }
}
