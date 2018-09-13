<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AuthenticationController
 *
 * @package AppBundle\Controller
 */
class AuthenticationController extends Controller
{
    public function loginCheck()
    {
//        Won't be called, it's handled by firewall
    }
    public function refreshToken(Request $request)
    {
        return $this->get('gesdinet.jwtrefreshtoken')->refresh($request);
    }
}
