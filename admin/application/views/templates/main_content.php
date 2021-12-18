<?php
$this->load->view('templates/header');
$this->load->view('templates/' . $nav);
$this->load->view('templates/settings_panel');
$this->load->view('templates/sidebar');
$this->load->view($view);
$this->load->view('templates/footer');
