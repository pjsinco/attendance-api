<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{

  protected $request;
  protected $builder;
  
  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function filters()
  {
    return $this->request->all();
  }

  public function apply(Builder $builder)
  {
    $this->builder = $builder;
    
    foreach ($this->filters() as $name => $value) {
      try {
        if (method_exists($this, $name)) {
          if (trim($value) == '0' || trim($value)) {
            $this->$name($value);
          } else {
            $this->$name();
          }
        }
      } catch (\Exception $e) {
        throw $e;
      }
    }

    return $this->builder;
  }

}
