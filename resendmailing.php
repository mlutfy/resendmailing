<?php

require_once 'resendmailing.civix.php';
use CRM_Resendmailing_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function resendmailing_civicrm_config(&$config) {
  _resendmailing_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function resendmailing_civicrm_xmlMenu(&$files) {
  _resendmailing_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function resendmailing_civicrm_install() {
  _resendmailing_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function resendmailing_civicrm_postInstall() {
  _resendmailing_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function resendmailing_civicrm_uninstall() {
  _resendmailing_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function resendmailing_civicrm_enable() {
  _resendmailing_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function resendmailing_civicrm_disable() {
  _resendmailing_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function resendmailing_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _resendmailing_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function resendmailing_civicrm_managed(&$entities) {
  _resendmailing_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function resendmailing_civicrm_caseTypes(&$caseTypes) {
  _resendmailing_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function resendmailing_civicrm_angularModules(&$angularModules) {
  _resendmailing_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function resendmailing_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _resendmailing_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function resendmailing_civicrm_entityTypes(&$entityTypes) {
  _resendmailing_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function resendmailing_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 */
function resendmailing_civicrm_navigationMenu(&$menu) {
  _resendmailing_civix_insert_navigation_menu($menu, 'Mailings', [
    'label' => E::ts('Resend a sent mailing'),
    'name' => 'resendmailing_single',
    'url' => 'civicrm/a#/resendmailing',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ]);
  _resendmailing_civix_navigationMenu($menu);
} // */

/**
 * Implements hook_civicrm_searchTasks.
 *
 * https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_searchTasks/
 */
function resendmailing_civicrm_searchTasks($objectType, &$tasks) {

  if ($objectType == 'contact') {
    if (CRM_Core_Permission::check(['access CiviMail'])) {
      $tasks[] = [
        'title'  => 'Email - resend a CiviMail mailing',
        'class'  => 'CRM_Resendmailing_Form_Task_SelectMailing'
        // 'result' => TRUE, unsure what this does.
      ];
    }
  }
}
