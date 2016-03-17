<?php
switch ($action) {
	case 'news_index': news_index();
		break;
	case 'news_bkdleall': news_bkdleall();
		break;
	case 'news_delete': news_delete();
		break;
	case 'news_add': news_add();
		break;
	case 'news_insert': news_insert();
		break;
	case 'news_editfm': news_editfm();
		break;
	case 'news_delete_img': news_delete_img();
		break;
	case 'news_edit': news_edit();
		break;
	case 'news_hidden_m': news_hidden_m();
		break;
	case 'news_hidden': news_hidden();
		break;
}
?>