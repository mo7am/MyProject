<?php
namespace App\Traits;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
       /* if(auth()->user()->type_id == 1) {
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/indexAnyUserAdvanced';
        }elseif (auth()->user()->type_id == 2)
        {
            return property_exists($this, 'redirectTo') ? $this->redirectTo : '/indexReceptionist';
        }*/
    }
}
