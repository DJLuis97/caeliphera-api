<?php
namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	public function leader (): UserCollection {
		return new UserCollection(User::query()->leader()->get());
	}
}
