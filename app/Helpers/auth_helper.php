<?php

use App\Models\ClientModel;

function getAccessTokenFromRequest($authenticationHeader)
{
    if ($authenticationHeader == "") {
        throw new Exception('Missing or invalid Api Token in request');
    }
    return $authenticationHeader;
}


function validateApiToken($token)
{
    $clientModel = new ClientModel();
    $clientModel->vefiryClientToken($token);
}