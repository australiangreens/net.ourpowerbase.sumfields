<?php
$custom = array(
	'groups' => array(
		'summary_fields' => array(
			'name' => 'Summary_Fields',
			'title' => 'Summary Fields',
			'extends' => 'Contact',
			'style' => 'Tab',
			'collapse_display' => '0',
			'help_pre' => '',
			'help_post' => '',
			'weight' => '3',
			'is_active' => '1',
			'is_multiple' => '0',
			'collapse_adv_display' => '0',
		),
  ),
	'fields' => array(
		'contribution_total_lifetime' => array(
			'label' => 'Total Lifetime Contributions',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '10',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(SUM(total_amount) IS NULL, 0, SUM(total_amount)) 
      FROM civicrm_contribution t1 WHERE t1.contact_id = NEW.contact_id 
      AND t1.contribution_status_id = 1 AND t1.contribution_type_id IN (%contribution_type_ids))',
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_total_this_year' => array(
			'label' => 'Total Contributions this Year',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '15',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(SUM(total_amount) IS NULL, 0, SUM(total_amount)) 
      FROM civicrm_contribution t1 WHERE SUBSTR(receive_date,1,4)=YEAR(curdate()) 
      AND t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND 
      t1.contribution_type_id IN (%contribution_type_ids))',
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_total_last_year' => array(
			'label' => 'Total Contributions last Year',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '20',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(SUM(total_amount) IS NULL, 0, SUM(total_amount)) 
      FROM civicrm_contribution t1 WHERE SUBSTR(receive_date,1,4)=YEAR(curdate())-1 
      AND t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND 
      t1.contribution_type_id IN (%contribution_type_ids))',
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_amount_last' => array(
			'label' => 'Amount of last contribution',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '25',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(total_amount IS NULL, 0, total_amount) 
      FROM civicrm_contribution t1 WHERE t1.contact_id = NEW.contact_id 
      AND t1.contribution_status_id = 1  AND t1.contribution_type_id IN 
      (%contribution_type_ids) ORDER BY t1.receive_date DESC LIMIT 1)', 
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_date_last' => array(
			'label' => 'Date of Last Contribution',
			'data_type' => 'Date',
			'html_type' => 'Select Date',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '30',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT MAX(receive_date) FROM civicrm_contribution t1
      WHERE t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND 
      t1.contribution_type_id IN (%contribution_type_ids))',
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_date_first' => array(
			'label' => 'Date of First Contribution',
			'data_type' => 'Date',
			'html_type' => 'Select Date',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '35',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT MIN(receive_date) FROM civicrm_contribution t1 
      WHERE t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND 
      t1.contribution_type_id IN (%contribution_type_ids))', 
      'trigger_table' => 'civicrm_contribution',

		),
		'contribution_largest' => array(
			'label' => 'Largest Contribution',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '40',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(MAX(total_amount) IS NULL, 0, MAX(total_amount)) 
      FROM civicrm_contribution t1 WHERE t1.contact_id = NEW.contact_id AND 
      t1.contribution_status_id = 1 AND t1.contribution_type_id IN (%contribution_type_ids))', 
      'trigger_table' => 'civicrm_contribution',
		),
		'contribution_total_number' => array(
			'label' => 'Total Contributions',
			'data_type' => 'Int',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '45',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT IF(COUNT(id) IS NULL, 0, COUNT(id)) FROM civicrm_contribution t1
      WHERE t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 AND 
      t1.contribution_type_id IN (%contribution_type_ids))', 
      'trigger_table' => 'civicrm_contribution',
		),
    'contribution_average_annual_amount' => array(
			'label' => 'Average Annual Contribution',
			'data_type' => 'Money',
			'html_type' => 'Text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '50',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT SUM(total_amount) / (SELECT COUNT(DISTINCT SUBSTR(receive_date, 1, 4)) 
      FROM civicrm_contribution t0 WHERE t0.contact_id = NEW.contact_id AND t0.contribution_type_id 
      IN (%contribution_type_ids) AND t0.contribution_status_id = 1) FROM civicrm_contribution t1 
      WHERE t1.contact_id = NEW.contact_id AND t1.contribution_type_id IN (%contribution_type_ids) 
      AND t1.contribution_status_id = 1)', 
      'trigger_table' => 'civicrm_contribution',
		),
    'contribution_date_last_membership_payment' => array(
			'label' => 'Date of Last Membership Payment',
			'data_type' => 'Date',
			'html_type' => 'Select Date',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '55',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT MAX(receive_date) FROM civicrm_contribution t1 JOIN civicrm_membership_payment mp ON 
      t1.id = mp.contribution_id WHERE t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 ORDER BY 
      receive_date DESC LIMIT 1)',
      'trigger_table' => 'civicrm_contribution',
		),
    'contribution_amount_last_membership_payment' => array(
			'label' => 'Amount of Last Membership Payment',
			'data_type' => 'Money',
			'html_type' => 'text',
			'is_required' => '0',
			'is_searchable' => '1',
			'weight' => '60',
			'is_active' => '1',
			'is_view' => '1',
			'text_length' => '32',
      'trigger_sql' => '(SELECT total_amount FROM civicrm_contribution t1 JOIN civicrm_membership_payment mp ON 
      t1.id = mp.contribution_id WHERE t1.contact_id = NEW.contact_id AND t1.contribution_status_id = 1 
      ORDER BY receive_date DESC LIMIT 1)',
      'trigger_table' => 'civicrm_contribution',
		),
  ),
);
