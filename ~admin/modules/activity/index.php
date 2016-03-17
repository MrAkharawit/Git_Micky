<?php
switch ($action) {
	case 'activity_index': activity_index();
		break;
	case 'activity_bkdleall': activity_bkdleall();
		break;
	case 'activity_delete': activity_delete();
		break;
	case 'activity_add': activity_add();
		break;
	case 'activity_insert': activity_insert();
		break;
	case 'activity_editfm': activity_editfm();
		break;
	case 'activity_delete_img': activity_delete_img();
		break;
	case 'activity_edit': activity_edit();
		break;
	case 'activity_hidden_m': activity_hidden_m();
		break;
	case 'activity_hidden': activity_hidden();
		break;
}
?>