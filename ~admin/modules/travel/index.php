<?php
switch ($action) {
	case 'travel_index': travel_index();
		break;
	case 'travel_bkdleall': travel_bkdleall();
		break;
	case 'travel_delete': travel_delete();
		break;
	case 'travel_add': travel_add();
		break;
	case 'travel_insert': travel_insert();
		break;
	case 'travel_editfm': travel_editfm();
		break;
	case 'travel_delete_img': travel_delete_img();
		break;
	case 'travel_edit': travel_edit();
		break;
	case 'travel_hidden_m': travel_hidden_m();
		break;
	case 'travel_hidden': travel_hidden();
		break;
}
?>