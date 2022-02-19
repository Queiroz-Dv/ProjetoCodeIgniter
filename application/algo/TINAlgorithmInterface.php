<?php
namespace order\TIN\Algo;

interface TINAlgorithmInterface{
  public function isValid(string $tin);
}