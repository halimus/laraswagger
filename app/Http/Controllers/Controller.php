<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @SWG\Swagger(
 *   @SWG\Info(
 *     title="Book Stote API",
 *     description="A sample API that uses a bookstore as an example to demonstrate features in the swagger-2.0 specification",
 *     version="1.0.0",
 *     @SWG\Contact(
 *       email="apiteam@swagger.io",
 *       name="Swagger API Team",
 *       url="http://swagger.io"
 *     ),
 *     @SWG\License(
 *        name="MIT",
 *        url="http://github.com/gruntjs/grunt/blob/master/LICENSE-MIT"
 *     ),
 *     termsOfService="http://swagger.io/terms/"
 *   ),
 *   host="localhost:8000",
 *   basePath="/api",
 *   schemes={"http"},
 *   produces={"application/json"},
 *   consumes={"application/json"}
 * )
 */
class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
}
