<?php
switch ($action) {
	case 'otop_index': otop_index();
		break;
	case 'otop_bkdleall': otop_bkdleall();
		break;
	case 'otop_delete': otop_delete();
		break;
	case 'otop_add': otop_add();
		break;
	case 'otop_insert': otop_insert();
		break;
	case 'otop_editfm': otop_editfm();
		break;
	case 'otop_delete_img': otop_delete_img();
		break;
	case 'otop_edit': otop_edit();
		break;
	case 'otop_hidden_m': otop_hidden_m();
		break;
	case 'otop_hidden': otop_hidden();
		break;
}
?>