<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserSettingsController extends Controller
{
    /**
     * @Route("/settings", name="settings")
     */
    public function viewAction()
    {
        return $this->render('subscription/aboutMe.html.twig');
    }
    
    /**
     * @Route("/settings/form", name="settings_form")
     */
    public function formAction(Request $request)
    {
        $bag = $request->request;
        $data['firstName'] = $bag->get('first_name');
        $data['lastName'] = $bag->get('last_name');
        $data['email'] = $bag->get('email');
        $data['twitterUserName'] = $bag->get('twitter_user_name');
        
        //here some line with adding to database
        
        $this->get('session')->getFlashBag()->add('notice', 'Settings saved successfully');
        return $this->render('subscription/aboutMe.html.twig', $data);
        
    }
}
