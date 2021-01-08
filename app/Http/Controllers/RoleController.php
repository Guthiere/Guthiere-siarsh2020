<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('tAccess','role.index');
        $roles = Role::orderBy('id','ASC')->paginate(5);
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('tAccess','role.create');
        $permisos = Permiso::get();
        //
        return view('admin.roles.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('tAccess','role.create');
        //dd($request);
        $request->validate([
            'name'  => 'required|max:50|unique:roles,name',
            'slug'  => 'required|max:50|unique:roles,name',
            'full_access' => 'required|in:yes,no',
        ]);

        $role = Role::create($request->all());

        //if($request->get('permiso')){

            //return $request->all();
            $role->permisos()->sync($request->get('permiso'));
        //}
        return redirect()->route('role.index')/* ->with('status_success','El rol se ha creado satisfactoriamente') */;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('tAccess','role.show');
        //
        $permiso_role=[];
        foreach ($role->permisos as $permiso) {
            $permiso_role[]=$permiso->id;
        }

        $permisos = Permiso::get();
        return view('admin.roles.show',compact('role','permisos','permiso_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
       $this->authorize('tAccess','role.edit');
        //
        $permiso_role=[];
        foreach ($role->permisos as $permiso) {
            $permiso_role[]=$permiso->id;
        }

        $permisos = Permiso::get();
        return view('admin.roles.edit',compact('role','permisos','permiso_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
       $this->authorize('tAccess','role.edit');
        //
        $request->validate([
            'name'  => 'required|max:50|unique:roles,name,'.$role->id,
            'slug'  => 'required|max:50|unique:roles,name,'.$role->id,
            'full_access' => 'required|in:yes,no',
        ]);

        $role->update($request->all());

        //if($request->get('permiso')){
            $role->permisos()->sync($request->get('permiso'));
       // }
        return redirect()->route('role.index')/* ->with('status_success','El rol se ha Actualizado satisfactoriamente') */;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
       $this->authorize('tAccess','role.destroy');
        //
        $role->delete();
        return redirect()->route('role.index')/* ->with('status_success','El rol se ha Eliminado satisfactoriamente') */;
    }
}
