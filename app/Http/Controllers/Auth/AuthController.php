<?php namespace App\Http\Controllers\Auth;

use App\College;
use App\Http\Controllers\Controller;
use App\Services\Mailers\AppMailer;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	 /**
     * Where to redirect upon successful registration.
     *
     * @var string
     */

    protected $redirectTo = 'surveys/available';

    /**
     * Create a new authentication controller instance.
     *
     * @internal param \Illuminate\Contracts\Auth\Guard $auth
     * @internal param \Illuminate\Contracts\Auth\Registrar $registrar
     */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AppMailer $mailer
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request, AppMailer $mailer)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
        $mailer->sendEmailConfirmationTo($user);
//        Auth::login($this->create($request->all()));

        flash()->info('Please confirm your email address.');

//        return redirect($this->redirectPath());
        return redirect()->back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        $messages = [
            'exists' => 'The ID Number does not exist.',
            'IDNO.required' => 'The ID Number field is required.',
            'IDNO.unique' => 'The ID Number is already registered.',

        ];
        return Validator::make($data, [
//            'IDNO' => 'required|unique:users,userable_id|exists:'.env('OGS').'.COLLEGE,IDNO',
            'IDNO' => 'required|exists:'.env('OGS').'.COLLEGE,IDNO',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create(array $data)
    {
        return $this->saveUser($data);
    }

    private function saveUser(array $data
    ){
        $college = College::findOrFail($data['IDNO']);

        $user = new User();

        $user->fill([
            'name' => $college['NAME'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->save();

        $college->user()->save($user);

        return $user;
    }

    public function confirmEmail($token)
    {
        $user = User::whereConfirmation_token($token)->firstOrFail();

        $user->confirmed = true;
        $user->confirmation_token = null;
        $user->save();

        flash()->success('You are now confirmed. Please login.');

        return redirect('auth/login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();
    
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    protected function getCredentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'confirmed' => true
        ];
    }

}
