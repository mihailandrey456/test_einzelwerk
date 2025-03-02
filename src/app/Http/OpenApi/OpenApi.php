<?php

namespace App\Http\OpenApi;

use OpenApi\Attributes as OAT;

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
final class OpenApi{}