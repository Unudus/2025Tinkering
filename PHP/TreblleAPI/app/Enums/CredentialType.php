<?php

namespace App\Enums;

enum CredentialType: string
{
    case Bearer_auth = 'Bearer-Auth';
    case Basic_auth = 'Basic-Auth';
    case Digest_auth = 'Digest-Auth';
}