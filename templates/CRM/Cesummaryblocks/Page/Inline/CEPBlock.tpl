{crmAPI var='result' entity='CovidEconomics' action='getpaperblock' sequential='0' contact_id=$contactId}
{assign var="info" value=$result.values}
<div class="crm-summary-row">
  <div class="crm-label">{ts}Full Title:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_display_name}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Date Last Modified:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_modified_date}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Abstract:{/ts}</div>
  <div class="crm-content">{$info.civicrm_value_submission_de_35_abstract_188}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Additional Comments:{/ts}</div>
  <div class="crm-content">{$info.civicrm_value_submission_de_35_additional_comments_189}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Author:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_civicrm_relationship_1_display_name}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Paper:{/ts}</div>
  <div class="crm-content">{$info.civicrm_case_civicrm_relationship__civicrm_value_cep_paper_s}</div>
</div>
<div class="crm-summary-row">
  <div class="crm-label">{ts}Co-Author:{/ts}</div>
  <div class="crm-content">{$info.civicrm_contact_civicrm_relationship_2_display_name}</div>
</div>
