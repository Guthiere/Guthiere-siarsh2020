<?php

/**
 * User Trait extencion de modelo y gate para blindar los componentes del sistema
 */

    namespace App\Traits;
    use App\Models\Role;

trait UserTrait
{

    /**
     * Relacion Usuarios Roles
     */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Funcion Gate Para verificar el Acceso funciones Globales de
     * crear eliminar actualizar
     */
    public function Tpermiso($permiso){

        if($this->role->full_access=='yes'){
            return true;
        }
        foreach ($this->role->permisos as $perm) {
            if($perm->slug ==$permiso){
                return true;
            }
        }
        return false;
    }
}
