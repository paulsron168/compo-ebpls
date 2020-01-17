<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('show')) {
		function show($data, $template = 'default') {
			echo Modules::run('template/index', $template, $data);
		}
	}

	if(!function_exists('pad')) {
		function pad($num = 0, $length = 3, $pad = '0') {
			return str_pad($num, $length, $pad, STR_PAD_LEFT);
		}
	}

	if(!function_exists('user_id')) {
		function user_id() {
			$userID = $this->session->userdata('user_id');
			if(!empty($userID)) {
				return $userID;
			} else {
				return false;
			}
		}
	}

	if(!function_exists('initials')) {
		function initials($str) {
			$ret = '';
			foreach (explode(' ', $str) as $word)
				$ret .= strtoupper($word[0]);
			return $ret;
		}
	}

	if(!function_exists('response')) {
		function response($error = 0, $message = '', $data = array()) {
			$response = array();

			$response = array(
				'error' => $error,
				'message' => $message
			);
			if(!empty($data)) {
				$response['data'] = $data;
			}

			echo json_encode($response);
		}
	}

	if(!function_exists('dropdown_options')) {
		function dropdown_options($data = array(), $key, $value, $type) {
			if(!empty($data)) { $i = 0;
				$result[$i] = 'Select '.$type;
				foreach ($data as $item) {
					$result[$item->{$key}] = ucfirst($item->{$value});
				}
			} else {
				$result = array('0' => 'No List');
			}

			return $result;
		}
	}

	if(!function_exists('checkbox_list')) {
		function checkbox_list($data = array(), $field = '') {
			if(!empty($data)) {
				foreach (array_chunk($data, count($data) / 2) as $items) { ?>
					<div class="col-sm-6">
						<?php foreach ($items as $item) {
							echo form_label(form_checkbox(array(
								'name' => $field,
								'value' => $item->bnID,
								'class' => 'checkbox-item'
							)).' '.ucfirst($item->nature), '', array('class' => 'checkbox-inline col-sm-6'));
						} ?>
					</div>
				<?php }
			} else {

			}
		}
	}

	if(!function_exists('missing_requirements')) {
		function missing_requirements($array1, $array2) {
			$array = array_diff($array1, $array2);
			$data = array();

			foreach ($array as $items) {
				$data[] = $items;
			}

			return $data;
		}
	}

	if(!function_exists('compute')) {
		function compute($formula, $variable, $capital) {

			$variable = json_decode($variable);
			extract((array)$variable);

			$C = $capital;

			eval("\$result = {$formula};");
			return (float)$result;
		}
	}

	if (!function_exists('site_setting')) {
		function site_setting($field){
			$ci =& get_instance();

			$ci->load->model('setting');

			$setting = $ci->setting->get_setting($field);
			return $setting->value;
		}
	}

	if(!function_exists('quote')){
		function quote($str){
			return sprintf("%s",$str);
		}
	}
