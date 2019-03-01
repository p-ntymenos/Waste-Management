<?php namespace App\Http\ViewComposers;

use App\Mitrwo;
use App\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;

class NavComposer
{
    private $mitrwo;
    /**
     * @var User
     */
    private $user;

    public function __construct(Mitrwo $mitrwo, User $user) {
        $this->mitrwo = $mitrwo;
        $this->user = $user;
    }
    /**
     * @param View $view
     */
    public function compose(View $view) {
        $data = $view->getData();

        $perifereies = $this->CanSeePeriferies('duktio');
        $chosenYear = Input::get('year',2014);
        $district = Input::get('district',null);

        $view->with('perifereies',$perifereies)
            ->with('chosenDistrict',$district)
            ->with('chosenYear',$chosenYear);
    }

    private function CanSeePeriferies($role) {
        $data = [];

        if (Auth::user()->hasRole($role))
        {
            $data = $this->mitrwo->getPerifereies();
        }

        return $data;
    }

}