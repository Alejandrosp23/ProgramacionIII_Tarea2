<?php

class core_persona{

    static function guardar($persona){
        $CI =& get_instance();
        if(isset($persona['id']) && $persona['id'] >0){
            $CI->db->where('id',$persona['id']);
            $CI->db->update('formulario', $persona);
        }else{
        $CI->db->insert('formulario',$persona);
        }
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "delete from formulario where id=?";
        $CI->db->query($sql,[$id]);
        
    }

    static function listado(){
        $CI =& get_instance();

        $rs= $CI->db->get('formulario')->result();
        return $rs;
    }
}
?>