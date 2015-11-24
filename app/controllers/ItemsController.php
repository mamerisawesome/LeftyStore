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
		$items = DB::select("select * from items where posted_by not like '".Session::get('username')."'");
		return View::make('pages.item.itemIndex')->with('items',$items);
	}
	
	public function viewMax(){
		$itemRes = DB::select("select * from items where views = (select max(views) from items)");		
		return View::make('pages.item.itemFind')->with('item',$itemRes[0]);
	}
	
	public function createItem()
	{
		return View::make('pages.item.createItem');
	}
	
	public function approvePage(){
		$item = DB::select('select * from for_item_approval');
		return View::make('pages.item.approval')->with('items',$item);
	}
	
	public function approve($item_name){
		$items = DB::select("select * from for_item_approval where item_name = '".$item_name."'");
		$item = $items[0];
		DB::insert("insert into items(views, item_name, price, category, avatar, posted_by, approved_by) values(0, '"
				.$item->item_name."',"
				.$item->price.",'"
				.$item->category."','"
				."/res/laptop.jpg"."','"
				//.$item->avatar."','"
				.$item->posted_by."',"
				.Session::get('id').")");
		
		DB::delete("delete from for_item_approval where item_name = '".$item_name."'");
		
		return Redirect::to('/item');
	}
	
	public function disapprove($item_name){
		DB::delete("delete from for_item_approval where item_name = '".$item_name."'");
	
		return Redirect::to('/item');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->item->avatar = Session::get('avatar');
		$this->item->itemName = Input::get('item_name');
		$this->item->price = Input::get('price');
		$this->item->category = Input::get('category');
		$this->item->postedBy = Session::get('username');
		$this->item->approvedBy = Session::get('id');

//		dd($this->user);
		
		$customer = DB::insert('insert into for_item_approval '
		   . "(avatar, item_name, price, category, posted_by) values('"
				.$this->item->avatar."','"
				.$this->item->itemName."',"
				.$this->item->price.",'"
				.$this->item->category."','"
				.$this->item->postedBy."'"
				.")");
		
		return Redirect::to('/item');
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
		DB::update('update items set '
			."views = ".($itemRes[0]->views + 1)." "
			."where item_name = '" . $itemName 	."'"
		);
		
		return View::make('pages.item.itemFind')->with('item',$itemRes[0]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($item_name)
	{
		$items = DB::select("select * from items where item_name = '".$item_name."'");
		return View::make('pages.item.edit')->with('item',$items[0]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($item_name)
	{
		DB::update('update items set '
			."item_name = '".Input::get('item_name')."', "
			."price = "		.Input::get('price')	.", "
			."category = '"	.Input::get('category') ."', "
			."avatar = '"	.Input::get('avatar')	."' "
			."where item_name = '" . $item_name 	."'"
		);
		
		return Redirect::to('/item/'.Input::get('item_name'));
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

	public function buy($itemName)
	{
		DB::statement("delete from items where item_name like '%".$itemName."%'");
		return Redirect::to("/item");
	}
	
	public function showCategory($category){
		$items = DB::select("select * from items where category = '".$category."'");
		return View::make('pages.item.itemIndex')->with('items',$items);
	
	}

}
