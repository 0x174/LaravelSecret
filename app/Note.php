<?php

namespace App;

use Crypt;
use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Notifications\Notifiable;
use App\Notifications\noteRead;
use Tebru\AesEncryption\AesEncrypter;

class Note extends Model
{
	use Uuids, Notifiable;

    protected $fillable = ['note', 'email'];

	public function getRouteKeyName()
	{
	    return 'uuid';
	}
	
    public function url($key)
    {
    	return url('/'.$this->uuid.'?key='.$key);
    }

    public function storeEncrypted($key)
    {
    	$encrypter = new AesEncrypter($key);

    	$this->note = $encrypter->encrypt($this->note);

    	$this->save();
    }

    public function read($key) 
    {
    	$decrypter = new AesEncrypter($key);

    	$decrypted = $decrypter->decrypt($this->note);

    	$this->notify(new noteRead);
        
        $this->delete(); 

        return $decrypted;
    }
}
