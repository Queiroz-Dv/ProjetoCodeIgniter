<?php 
namespace order\TIN\Algo;

abstract class TINAlgorithm implements TINAlgorithmInterface{
  public function isValid(string $tin)
  {
    return $this->validate($tin);
  }

  public abstract function validate(string $tin);
}