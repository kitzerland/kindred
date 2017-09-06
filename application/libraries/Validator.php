<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validator {
	
	private $errors = null;

	public function validate($input, $rules, $messages){

		$errors = null;

		foreach($rules as $name => $rule){
			$explodes = explode('|', $rule);
			foreach($explodes as $explode){
				switch ($explode) {
					case 'required':
						if(isset($input[$name]) && array_key_exists($name, $input) && strlen(trim($input[$name])) == 0){
							$errors[$name] = $messages[$explode];
						}
						break;

					case 'integer':
						$true = isset($input[$name]) && is_numeric($input[$name]) && is_integer($input[$name] + 0);
						if(!$true){
							$errors[$name] = $messages[$explode];
						}
						break;
					
					case 'double':
						if(!is_numeric($input[$name]) || !(is_double($input[$name] + 0) || is_int($input[$name] + 0))){
							$errors[$name] = $messages[$explode];
						}
						break;

					case (preg_match('/max:\d+/', $explode) ? true : false):
						$length = explode(':', $explode)[1];
						if(strlen(trim($input[$name])) > $length){
							$errors[$name] = $messages['max'];
						}
						break;

					case 'positive':
						$true = is_numeric($input[$name]) && $input[$name] > 0;
						if(!$true){
							$errors[$name] = $messages[$explode];
						}
						break;

					case 'datetime':
						$true = preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}(\.\d{3})?$/', $input[$name]);
						if($true == 0){
							$errors[$name] = $messages[$explode];
						}
						break;
				}

			}
		}

		$this->errors = $errors;
	}

	public function fails(){
		if($this->errors != null && is_array($this->errors)){
			return true;
		}
		return false;
	}

	public function errors(){
		return $this->errors;
	}

}