<?php
switch ($action) {
	case 'depositmoney_index': depositmoney_index();
		break;
	case 'depositmoney_confirm': depositmoney_confirm();
		break;
	case 'depositmoney_list_detail': depositmoney_list_detail();
		break;
	case 'depositmoney_interest': depositmoney_interest();
		break;
	case 'depositmoney_interest_detail': depositmoney_interest_detail();
		break;
}
?>