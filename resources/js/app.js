import './bootstrap';

import $ from 'jquery';     // Jquery
import axios from 'axios';  // Axios

/////////////////////////////// MENU ///////////////////////////

    // Main Menu Toggle
    $('.logo > i.toggle').click(function() {

        $('body').toggleClass('menu_open'); // Toggle Menu

        axios.post('/ajax/session/save', {
            menu_open: $('body').hasClass('menu_open')
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // External Icon Link
    $('.menu .item i.external').click(function() {
        window.open($(this).siblings('a').attr('href'), '_blank');
    });

    // Sub Menu Toggle
    $('.menu .item .toggle').click(function() {
        $(this).parent().toggleClass('open');
        $(this).siblings('.menu').slideToggle(200);
    });


