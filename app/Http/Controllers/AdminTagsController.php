<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

use App\Entities\Tag;

class AdminTagsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::all();

		return view("admin.tags.index", compact("tags"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Tag $tag)
	{
		return view("admin.tags.create", compact("tag"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param TagRequest $request
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
		Tag::create($request->all());

		return redirect(action('AdminTagsController@index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Tag  $tag
	 * @return Response
	 */
	public function show($tag)
	{
		return view("admin.tags.show", compact("tag"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Tag  $tag
	 * @return Response
	 */
	public function edit($tag)
	{
		return view("admin.tags.edit", compact("tag"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param TagRequest $request
	 * @param            $tag
	 *
	 * @return Response
	 */
	public function update(TagRequest $request, $tag)
	{
		$tag->update($request->all());

		return redirect(action('AdminTagsController@index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Tag  $tag
	 * @return Response
	 */
	public function destroy($tag)
	{
		$tag->delete();

		return redirect(action('AdminTagsController@index'));
	}

}
