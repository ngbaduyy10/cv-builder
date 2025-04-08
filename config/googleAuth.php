<?php
require_once __DIR__ . '/../vendor/autoload.php';
class GoogleAuth {
    private $client;

    public function __construct() {
        $this->client = new Google_Client();
        $this->client->setClientId("55143665840-eqmg4v11ingrvcu745d5o405pfhmbvsq.apps.googleusercontent.com");
        $this->client->setClientSecret("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");
        $this->client->setRedirectUri("https://bright-cv-5dd136e7967b.herokuapp.com/redirect.php");
        $this->client->addScope(["email", "profile"]);
    }

    public function getAuthUrl() {
        return $this->client->createAuthUrl();
    }

    public function authenticate($code) {
        $token = $this->client->fetchAccessTokenWithAuthCode($code);
        if (!$token || isset($token['error'])) {
            die('Error fetching access token: ' . ($token['error'] || 'Unknown error'));
        }
        $this->client->setAccessToken($token);
    }

    public function getUserInfo() {
        if ($this->client->getAccessToken()) {
            $oauth = new Google_Service_Oauth2($this->client);
            return $oauth->userinfo->get();
        }
        throw new Exception('Access token is not set.');
    }
}