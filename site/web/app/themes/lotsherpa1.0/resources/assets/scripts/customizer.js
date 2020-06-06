import $ from 'jquery';

  wp.customize('blogname', (value) => {
    value.bind(to => $('.brand').text(to));
  });

  wp.customize('primary_color', (value) => {
    value.bind(to =>
      $('head').append(`<style>:root{--primary: ${to} !important;}</style>`));
  });

  wp.customize('primary_light_color', (value) => {
    value.bind(to =>
     $('head').append(`<style>:root{--primary-light: ${to} !important;}</style>`))
  });

  wp.customize('primary_dark_color', (value) => {
    value.bind(to =>
     $('head').append(`<style>:root{--primary-dark: ${to} !important;}</style>`));
  });

  wp.customize('accent1_color', (value) => {
    value.bind(to =>
      $('head').append(`<style>:root{--accent1: ${to} !important;}</style>`));
  });

  wp.customize('accent2_color', (value) => {
    value.bind(to =>
     $('head').append(`<style>:root{--accent2: ${to} !important;}</style>`));
  });

  wp.customize('light_color', (value) => {
    value.bind(to =>
      $('head').append(`<style>:root{--light: ${to} !important;}</style>`));
  });

  wp.customize('dark_color', (value) => {
    value.bind(to =>
      $('head').append(`<style>:root{--dark: ${to} !important;}</style>`));
  });

  wp.customize('address', function(value) {
    value.bind(function(to) {
      $('.footer__contact-address').html(to);
    });
  });

  wp.customize('phonenumber_humans', function(value) {
    value.bind(function(to) {
      $('.footer__contact-phone').html(to);
    });
  });

  wp.customize('email_address', function(value) {
    value.bind(function(to) {
      $('.footer__contact-email').html(to);
    });
  });
