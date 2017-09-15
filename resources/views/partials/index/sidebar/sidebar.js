/**
 * Created by Mes on 14.06.2017.
 */
import './sidebar.scss';
import './img/banner.png';
import './img/bk1.png';
import './img/bk2.png';
import './img/bk2.png';

import './img/Football.png';
import './img/Basketball.png';
import './img/Hockey.png';
import './img/Volleyball.png';
import './img/UFC.png';


var count_items = $('.list_cats .list_cats').size();

if(count_items <= 3){
    $('.list_cats').addClass('hide_btns');
}