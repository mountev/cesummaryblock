<?php

require_once 'cesummaryblocks.civix.php';
// phpcs:disable
use CRM_Cesummaryblocks_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function cesummaryblocks_civicrm_config(&$config) {
  _cesummaryblocks_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function cesummaryblocks_civicrm_xmlMenu(&$files) {
  _cesummaryblocks_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function cesummaryblocks_civicrm_install() {
  _cesummaryblocks_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function cesummaryblocks_civicrm_postInstall() {
  _cesummaryblocks_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function cesummaryblocks_civicrm_uninstall() {
  _cesummaryblocks_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function cesummaryblocks_civicrm_enable() {
  _cesummaryblocks_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function cesummaryblocks_civicrm_disable() {
  _cesummaryblocks_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function cesummaryblocks_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _cesummaryblocks_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function cesummaryblocks_civicrm_managed(&$entities) {
  _cesummaryblocks_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function cesummaryblocks_civicrm_caseTypes(&$caseTypes) {
  _cesummaryblocks_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function cesummaryblocks_civicrm_angularModules(&$angularModules) {
  _cesummaryblocks_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function cesummaryblocks_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _cesummaryblocks_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function cesummaryblocks_civicrm_entityTypes(&$entityTypes) {
  _cesummaryblocks_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function cesummaryblocks_civicrm_themes(&$themes) {
  _cesummaryblocks_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function cesummaryblocks_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function cesummaryblocks_civicrm_navigationMenu(&$menu) {
//  _cesummaryblocks_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _cesummaryblocks_civix_navigationMenu($menu);
//}
/**
 * Implements hook_civicrm_contactSummaryBlocks().
 *
 * @link https://github.com/civicrm/org.civicrm.contactlayout
 */
function cesummaryblocks_civicrm_contactSummaryBlocks(&$blocks) {

  $reports = CRM_Extendedreport_Page_Inline_ExtendedReportlets::getReportsToDisplay();

  if (empty($reports)) {
    return;
  }
  // Provide our own group for this block to visually distinguish it on the contact summary editor palette.
  $blocks += [
    'covideco' => [
      'title' => ts('Covid Economics Info'),
      'icon' => 'fa-table',
      'blocks' => [],
    ],
  ];
  foreach ($reports as $report) {
    $blocks['covideco']['blocks']['cep'] = [
      'icon' => 'crm-i fa-bar-chart',
      'title' => 'CE Paper Information',
      'tpl_file' => 'CRM/Cesummaryblocks/Page/Inline/CEPBlock.tpl',
      'edit' => FALSE,
      'collapsible' => TRUE,
    ];
    $blocks['covideco']['blocks']['cei'] = [
      'icon' => 'crm-i fa-bar-chart',
      'title' => 'CE Issue Information',
      'tpl_file' => 'CRM/Cesummaryblocks/Page/Inline/CEIBlock.tpl',
      'edit' => FALSE,
      'collapsible' => TRUE,
    ];
  }

}
