<?php
	Class BaseModel Extends \Eloquent
	{
		public static $rules = [];
		
		public function updateRules()
		{
			$rules = static::$rules;
			foreach ($rules as $field => $rule)
			{
				$rules[$field] = str_replace(':id', $this->getKey(), $rule);
			}
			return $rules;
		}
	}