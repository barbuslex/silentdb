<?php

class GroupController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::paginate(10);
		$this->layout->content = View::make('group.index')->with('groups', $groups);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('group.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required|unique:groups,name',
			'description' => '',
			'color' => 'required|regex:/^(#[a-fA-F0-9]{6})$/'
		);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}

		$group = new Group;
		$group->name = Input::get('name');
		$group->description = Input::get('description');
		$group->color = Input::get('color');

		if($group->save()) {
			return Redirect::to('admin/groups')->with('flash_success', 'Groupe créé');
		}

		return  Redirect::to('admin/groups')->with('flash_error', 'Impossible de créer le groupe');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::find($id);
		$this->layout->content = View::make('group.show')->with('group', $group);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::find($id);
		$this->layout->content = View::make('group.edit')->with('group', $group);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$group = Group::find($id);
		$group->name = Input::get('name');
		$group->description = Input::get('description');
		$group->color = Input::get('color');
		if($group->save()) {
			return Redirect::to('admin/groups')->with('flash_success', 'Modification(s) effectée(s)');
		}
		return Redirect::to('admin/groups')->with('flash_error', "Impossible d'appliquer les modifications");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = User::find($id);
		if($group->delete()) {
			return Redirect::to('admin/groups')->with('flash_success', 'Groupe supprimé');
		}
		return Redirect::to('admin/groups')->with('flash_error', 'Impossible de supprimer le groupe');
	}


}
