<?php

namespace App\Http\OpenApi;

use OpenApi\Attributes as OAT;

#[OAT\OpenApi(
    info: new OAT\Info(
        title: 'Test Einzelwerk',
        version: '1.0.0',
    )
)
]
#[OAT\Components(
    securitySchemes: [
        new OAT\SecurityScheme(
            securityScheme: 'bearerAuth',
            type: 'apiKey',
            in: 'header',
            name: 'Authorization',
        )
    ]
)]
final class OpenApi
{
}
