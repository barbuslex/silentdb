<?php

class UserController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		$this->layout->content = View::make('user.index')->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username' => 'required|between:3,20',
			'email' => 'required|email|confirmed|unique:users,email',
			'password' => 'required|min:6|alpha_num|confirmed'
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()) {
			return Redirect::back()->withErrors($validation);
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		if($user->save()){
			Auth::login($user);
			if(Auth::check()) {
				return Redirect::to('user/'.$user->id);
			}
			else {
				return Redirect::back()->with('flash_error', "Impossible de connecter l'utilisateur");
			}
		}
		else {
			return Redirect::back()->with('flash_error', "Impossible d'enregistrer l'utilisateur");
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::user()->id == $id || Auth::user()->id_admin()) {
			$user = User::find($id);
			$groups = Group::all();
			$select_groups = array();
			foreach($groups as $group) {
				$select_groups[$group->id] = $group->name;
			}
			$this->layout->content = View::make('user.show')->with('user', $user)->with('select_groups', $select_groups);
		}
		else {
			return App::abort(403, 'Unauthorized action.');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if($id == Auth::user()->id || Auth::user()->is_admin()) {
			$user = User::find($id);
			$this->content->layout = View::make('user.edit')->with('user', $user);
		}
		return App::abort(403, 'Unauthorized action.');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::user()->is_admin()) {
			$user = User::find($id);
			
			$user->email = Input::get('email');
			
			if(Input::has('password')) {			
				$user->password = Hash::make(Input::get('password'));
			}
			$user->group_id = Input::get('group_id');

			if($user->save()) {
				return Redirect::back()->with('flash_success', 'Modifications effectuées');
			}
			else {
				return Redirect::back()->with('flash_error', "Impossible d'effectuer les modifications");
			}
		}
		elseif($id == Auth::user()->id) {
			$user = User::find($id);

			// If old password set and verif - the new password function proceed
			if(Input::has('old_password')) {
				$rules = array('password' => 'required|min:6|alpha_num|confirmed');
				$elements = array(
					'password' => Input::get('password'),
					'password_confirmation' => Input::get('password_confirmation')
				);

				if(Hash::check(Input::get('old_password'), $user->password)) {
					$validation = Validator::make($elements, $rules);
					if($validation->fails()) {
						return Redirect::back()->withErrors($validation);
					}
					$user->password = Hash::make(Input::get('password'));
				} 
				else {
					return Redirect::back()->with('flash_error', 'Ancien mot de passe invalide');
				}
			}

			// If email change - update the email
			if($user->email <> Input::get('email')) {
				$rules = array('email' => 'required|email|unique:users,email');
				$elements = array('email' => Input::get('email'));
				$validation = Validator::make($elements, $rules);
				if($validation->fails()) {
					return Redirect::back()->withErrors($validation);
				}
				$user->email = Input::get('email');
			}

			if($user->save()) {
				return Redirect::back()->with('flash_success', 'Modifications effectuées');
			}
			else {
				return Redirect::back()->with('flash_error', "Impossible d'effectuer les modifications");
			}
		}
		else {
			return App::abort(403, 'Unauthorized action.');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getLogin() {
		$this->layout->content = View::make('user.login');
	}

	public function postLogin(){
		$rules = array(
			'username' => 'required|between:3,20',
			'password' => 'required|min:6|alpha_num'
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()){
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($credentials)) {
			return Redirect::intended('user/'.Auth::user()->id);
		}
		
		return Redirect::back()->with('flash_error', "Nom d'utilisateur et/ou mot de passe invalide")->withInput();
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('/')->with('flash_success', 'Vous êtes déconnecté');
	}

}
