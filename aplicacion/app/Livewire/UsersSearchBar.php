<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersSearchBar extends Component
{
	public function render()
	{
		$roles = Role::all();
		return view('livewire.users-search-bar', compact('roles'));
	}
}
