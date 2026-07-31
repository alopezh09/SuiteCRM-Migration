<?php

require_once('modules/Opportunities/OpportunitiesListViewSmarty.php');

class OpportunitiesViewList extends ViewList
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    public function OpportunitiesViewList()
    {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct();
    }


    public function preDisplay()
    {
        $this->lv = new OpportunitiesListViewSmarty();
    }
	
	
	
	function listViewProcess() {
        global $current_user;
        
        // Añadir tu cláusula WHERE adicional
		//error_log("filtro - case manager " . $userID);
		
		
		// Verifica si el usuario tiene el rol "SuperGerente"
        if(!$this->userHasRole('Main Manager', $current_user->id)) {
            // Si no tiene el rol, aplica el filtro

            // Obtener el ID del usuario actual
            $userID = $GLOBALS['db']->quote($current_user->id);

            // Añadir tu cláusula WHERE adicional
            $this->params['custom_where'] = " AND (opportunities_cstm.user_id3_c = '$userID' OR opportunities_cstm.user_id2_c = '$userID' OR opportunities_cstm.user_id1_c = '$userID')";
        }
		
		
        //$this->params['custom_where'] = " AND (opportunities_cstm.user_id3_c = '$userID' OR opportunities_cstm.user_id2_c = '$userID' OR opportunities_cstm.user_id1_c = '$userID')";
		//$this->params['custom_where'] = " AND opportunities_cstm.user_id3_c = '$userID'";
		
		//if ($bean->assigned_user_id != $userID && $bean->user_id3_c != $userID && $bean->user_id2_c != $userID && $bean->user_id1_c != $userID) {
		//error_log("filtro - PROCESO EL LIST VIEW");
        // Llama al método padre
        parent::listViewProcess();
    }
	
	
	// Función para verificar el rol del usuario
    function userHasRole($roleName, $userID) {
        $query = "SELECT acl_roles.name 
                  FROM acl_roles 
                  INNER JOIN acl_roles_users ON acl_roles.id = acl_roles_users.role_id 
                  WHERE acl_roles_users.user_id = '$userID' AND acl_roles.name = '$roleName' AND acl_roles_users.deleted = 0";

        $result = $GLOBALS['db']->query($query);
        $row = $GLOBALS['db']->fetchByAssoc($result);

        if ($row) {
            return true; // El usuario tiene el rol
        } else {
            return false; // El usuario no tiene el rol
        }
    }
	
	
	
	
}
