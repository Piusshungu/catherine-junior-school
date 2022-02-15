<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Permission;

class addrole extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $permissions = Permission::all();

        return view('components.addrole-button', compact('permissions'));
    }
}
