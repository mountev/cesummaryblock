{crmAPI var='result' entity='CovidEconomics' action='getissueblock' sequential='0' contact_id=$contactId}
{assign var="info" value=$result.values}
<div class="crm-summary-row">
  <div class="crm-label">{ts}Date of Submission:{/ts}</div>
  <div class="crm-content">{$info.civicrm_case_civicrm_relationship_start_date}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Date of Acceptance:{/ts}</div>
  <div class="crm-content">{$info.civicrm_activity_civicrm_case_activity_activity_date_time}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Order in Issue:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_civicrm_relationship__civicrm_value_submissi}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Short title:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_civicrm_relationship__civicrm_value_submissi_1}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Paper:{/ts}</div>
  <div class="crm-content">{$info.civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s}</div>
</div>
