<?php

class ItemsController extends \BaseController {

	protected $items;

    public function __construct(Item $items)
		{
        $this->item = $items;
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function showItems()
	{
		$items = DB::select('select * from items');
		return View::make('pages.item.itemIndex')->with('items',$items);
	}
	
	public function createItem()
	{
		return View::make('pages.item.createItem');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->item->itemName = Input::get('item_name');
		$this->item->price = Input::get('price');
		$this->item->category = Input::get('category');
		$this->item->postedBy = 'almer';
		$this->item->approvedBy = 25;

//		dd($this->user);
		
		$customer = DB::insert('insert into items '
		   . "(item_name, price, category, posted_by, approved_by) values('"
				.$this->item->itemName."','"
				.$this->item->price."','"
				.$this->item->category."','"
				.$this->item->postedBy."',"
				.$this->item->approvedBy.")");
		
		return Redirect::to('/itemIndex');
	}
	
	public function search(){
		$this->item->itemName = Input::get('itemSearch');
		$res = DB::select("select * from items where lower(item_name) like '%".strtolower(Input::get('itemSearch'))."%'");
		$count = DB::select("select count(item_name) from items where item_name like '%".Input::get('itemSearch')."%'");
	
		return View::make('pages.item.searchResult')->with('items',$res);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($itemName)
	{
		$itemRes = DB::select("select * from items where item_name like '".$itemName."'");
		return View::make('pages.item.itemFind')->with('item',$itemRes[0]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($itemName)
	{
		DB::statement("delete from items where item_name like '%".$itemName."%'");
		return Redirect::to("/item");
	}


}
