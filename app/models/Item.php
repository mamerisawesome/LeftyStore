<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Item extends Eloquent implements UserInterface, RemindableInterface{

	public $timestamps = false;
	protected $fillable = ['item_no'];

	public static $auth_rules = [
		'item_no' => 'required|item_no'
	];

	public static $rules = [
		'item_no' => 'required'
	];

	public $messages;

	use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function isValid()
    {
        $validation = Validator::make($this->attributes, static::$rules);
        if($validation->passes())	return true;

        $this->messages = $validation->messages();
        return false;
    }

}
