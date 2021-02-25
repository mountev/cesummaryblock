<?php
use CRM_Cesummaryblocks_ExtensionUtil as E;

/**
 * CovidEconomics.Getissueblock API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
function _civicrm_api3_covid_economics_Getissueblock_spec(&$spec) {
  $spec['contact_id']['api.required'] = 1;
}

/**
 * CovidEconomics.Getissueblock API
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @see civicrm_api3_create_success
 *
 * @throws API_Exception
 */
function civicrm_api3_covid_economics_Getissueblock($params) {
  $sql = "
    SELECT civicrm_case_civicrm_relationship.start_date AS civicrm_case_civicrm_relationship_start_date,
      civicrm_activity_civicrm_case_activity.activity_date_time AS civicrm_activity_civicrm_case_activity_activity_date_time,
      civicrm_contact_civicrm_relationship__civicrm_value_submission_de_35.for_accepted_ublications_what_or_200 AS civicrm_contact_civicrm_relationship__civicrm_value_submissi,
      civicrm_contact_civicrm_relationship__civicrm_value_submission_de_35.short_title_194 AS civicrm_contact_civicrm_relationship__civicrm_value_submissi_1,
      civicrm_contact_civicrm_relationship__civicrm_value_submission_de_35.full_title_187 AS civicrm_contact_civicrm_relationship__civicrm_value_submissi_ft,
      civicrm_case_civicrm_relationship__civicrm_value_cep_paper_sub_36.paper_191 AS civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s,
      civicrm_case_civicrm_relationship__civicrm_value_cep_paper_sub_36.entity_id AS civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s_1
    FROM
      civicrm_relationship civicrm_relationship
    LEFT JOIN civicrm_contact civicrm_contact_civicrm_relationship ON civicrm_relationship.contact_id_a = civicrm_contact_civicrm_relationship.id
    LEFT JOIN civicrm_relationship civicrm_contact_civicrm_relationship__civicrm_relationship
      ON civicrm_contact_civicrm_relationship.id = civicrm_contact_civicrm_relationship__civicrm_relationship.contact_id_a
    LEFT JOIN civicrm_case civicrm_case_civicrm_relationship ON civicrm_contact_civicrm_relationship__civicrm_relationship.case_id = civicrm_case_civicrm_relationship.id
    LEFT JOIN civicrm_case_activity civicrm_case_civicrm_relationship__civicrm_case_activity
      ON civicrm_case_civicrm_relationship.id = civicrm_case_civicrm_relationship__civicrm_case_activity.case_id
    LEFT JOIN civicrm_activity civicrm_activity_civicrm_case_activity
      ON civicrm_case_civicrm_relationship__civicrm_case_activity.activity_id = civicrm_activity_civicrm_case_activity.id
    LEFT JOIN civicrm_contact civicrm_contact_civicrm_relationship_1 ON civicrm_relationship.contact_id_b = civicrm_contact_civicrm_relationship_1.id
    LEFT JOIN civicrm_value_cep_paper_sub_36 civicrm_case_civicrm_relationship__civicrm_value_cep_paper_sub_36
      ON civicrm_case_civicrm_relationship.id = civicrm_case_civicrm_relationship__civicrm_value_cep_paper_sub_36.entity_id
    LEFT JOIN civicrm_value_submission_de_35 civicrm_contact_civicrm_relationship__civicrm_value_submission_de_35
      ON civicrm_contact_civicrm_relationship.id = civicrm_contact_civicrm_relationship__civicrm_value_submission_de_35.entity_id
    WHERE (( (civicrm_relationship.is_active <> '0') AND (civicrm_relationship.relationship_type_id = '25')
      AND (civicrm_case_civicrm_relationship__civicrm_value_cep_paper_sub_36.paper_191 IS NOT NULL )
      AND (civicrm_activity_civicrm_case_activity.subject LIKE '%to Accepted - Await Publication%')
      AND (civicrm_relationship.contact_id_b = %1) ))
    GROUP BY civicrm_case_civicrm_relationship_start_date, civicrm_activity_civicrm_case_activity_activity_date_time,
      civicrm_contact_civicrm_relationship__civicrm_value_submissi, civicrm_contact_civicrm_relationship__civicrm_value_submissi_1,
      civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s, civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s_1
    ORDER BY civicrm_contact_civicrm_relationship__civicrm_value_submissi ASC";
  $dao = CRM_Core_DAO::executeQuery($sql, [1 => [$params['contact_id'], 'Integer']]);
  $returnValues = [];
  while ($dao->fetch()) {
    $result = $dao->toArray();
    if ($result['civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s']) {
      $fileId = $result['civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s'];
      $entityId = $result['civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s_1'];
      $fileHash = CRM_Core_BAO_File::generateFileHash($entityId, $fileId);
      $paperUrl = CRM_Utils_System::url('civicrm/file',"reset=1&id={$fileId}&eid={$entityId}&fcs={$fileHash}", TRUE);
      $result['paper_url'] = $paperUrl;
      $result['paper_name'] = CRM_Core_DAO::getFieldValue('CRM_Core_DAO_File', $fileId, 'uri');
    }
    $returnValues[] = $result;
  }
  return civicrm_api3_create_success($returnValues, $params, 'CovidEconomics', 'Getissueblock');
}
