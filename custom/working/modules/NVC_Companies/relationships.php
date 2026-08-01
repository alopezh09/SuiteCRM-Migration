<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */
$relationships = array (
  'nvc_companies_opportunities_1' => 
  array (
    'id' => '4b1788fa-0601-8d31-1def-6452d5c18244',
    'relationship_name' => 'nvc_companies_opportunities_1',
    'lhs_module' => 'NVC_Companies',
    'lhs_table' => 'nvc_companies',
    'lhs_key' => 'id',
    'rhs_module' => 'Opportunities',
    'rhs_table' => 'opportunities',
    'rhs_key' => 'id',
    'join_table' => 'nvc_companies_opportunities_1_c',
    'join_key_lhs' => 'nvc_companies_opportunities_1nvc_companies_ida',
    'join_key_rhs' => 'nvc_companies_opportunities_1opportunities_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'nvc_companies_leads_1' => 
  array (
    'id' => '5cee0096-ba38-4ab9-d159-6452d52856d3',
    'relationship_name' => 'nvc_companies_leads_1',
    'lhs_module' => 'NVC_Companies',
    'lhs_table' => 'nvc_companies',
    'lhs_key' => 'id',
    'rhs_module' => 'Leads',
    'rhs_table' => 'leads',
    'rhs_key' => 'id',
    'join_table' => 'nvc_companies_leads_1_c',
    'join_key_lhs' => 'nvc_companies_leads_1nvc_companies_ida',
    'join_key_rhs' => 'nvc_companies_leads_1leads_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'nvc_companies_veta_requerimiento_1' => 
  array (
    'id' => '5fdac47a-3d4e-3a71-1dbe-6452d5f33fb9',
    'relationship_name' => 'nvc_companies_veta_requerimiento_1',
    'lhs_module' => 'NVC_Companies',
    'lhs_table' => 'nvc_companies',
    'lhs_key' => 'id',
    'rhs_module' => 'Veta_Requerimiento',
    'rhs_table' => 'veta_requerimiento',
    'rhs_key' => 'id',
    'join_table' => 'nvc_companies_veta_requerimiento_1_c',
    'join_key_lhs' => 'nvc_companies_veta_requerimiento_1nvc_companies_ida',
    'join_key_rhs' => 'nvc_companies_veta_requerimiento_1veta_requerimiento_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'gdocs_global_documents_uploaded_nvc_companies' => 
  array (
    'id' => '634113c6-ed6e-4e25-5562-6452d53a4a08',
    'relationship_name' => 'gdocs_global_documents_uploaded_nvc_companies',
    'lhs_module' => 'NVC_Companies',
    'lhs_table' => 'nvc_companies',
    'lhs_key' => 'id',
    'rhs_module' => 'GDocs_Global_Documents_Uploaded',
    'rhs_table' => 'gdocs_global_documents_uploaded',
    'rhs_key' => 'id',
    'join_table' => 'gdocs_global_documents_uploaded_nvc_companies_c',
    'join_key_lhs' => 'gdocs_global_documents_uploaded_nvc_companiesnvc_companies_ida',
    'join_key_rhs' => 'gdocs_glob3f1fploaded_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'job_jobs_nvc_companies' => 
  array (
    'id' => '647e2598-dc4c-94e2-fb30-6452d55187d6',
    'relationship_name' => 'job_jobs_nvc_companies',
    'lhs_module' => 'NVC_Companies',
    'lhs_table' => 'nvc_companies',
    'lhs_key' => 'id',
    'rhs_module' => 'job_Jobs',
    'rhs_table' => 'job_jobs',
    'rhs_key' => 'id',
    'join_table' => 'job_jobs_nvc_companies_c',
    'join_key_lhs' => 'job_jobs_nvc_companiesnvc_companies_ida',
    'join_key_rhs' => 'job_jobs_nvc_companiesjob_jobs_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
    'from_studio' => true,
  ),
  'nvc_companies_modified_user' => 
  array (
    'id' => 'd270351b-2eef-6877-67b7-6452d5c02191',
    'relationship_name' => 'nvc_companies_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'NVC_Companies',
    'rhs_table' => 'nvc_companies',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'nvc_companies_created_by' => 
  array (
    'id' => 'd2f70bed-a204-1c3e-6a0c-6452d54cbc3c',
    'relationship_name' => 'nvc_companies_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'NVC_Companies',
    'rhs_table' => 'nvc_companies',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'nvc_companies_assigned_user' => 
  array (
    'id' => 'd33602ad-b1be-9c98-7519-6452d53358c4',
    'relationship_name' => 'nvc_companies_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'NVC_Companies',
    'rhs_table' => 'nvc_companies',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'securitygroups_nvc_companies' => 
  array (
    'id' => 'd3b024b9-77ee-2eaf-14be-6452d5408c81',
    'relationship_name' => 'securitygroups_nvc_companies',
    'lhs_module' => 'SecurityGroups',
    'lhs_table' => 'securitygroups',
    'lhs_key' => 'id',
    'rhs_module' => 'NVC_Companies',
    'rhs_table' => 'nvc_companies',
    'rhs_key' => 'id',
    'join_table' => 'securitygroups_records',
    'join_key_lhs' => 'securitygroup_id',
    'join_key_rhs' => 'record_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => 'module',
    'relationship_role_column_value' => 'NVC_Companies',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'nvc_companies_veta_recibo_1' => 
  array (
    'rhs_label' => 'Billing Statement',
    'lhs_label' => 'Companies',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NVC_Companies',
    'rhs_module' => 'Veta_Recibo',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'nvc_companies_veta_recibo_1',
  ),
);