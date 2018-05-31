<?php

namespace Pjs;

/**
 * Calculate basic descriptive statistics.
 *
 */
class DescriptiveStats
{
  public static function sum()
  {
    return array_sum(func_get_args());
  }

  /**
   * Calculate the mean of a data set.
   *
   * @param $data array The data set
   * @return float      The mean
   */
  public static function mean(array $data)
  {
    return array_sum($data) / count($data);
  }

  private static function standardDevSquare($x, $mean)
  {
    return pow($x - $mean, 2);
  }

  /**
   * Calculate the standard deviation.
   *
   * @param array $data The data set
   * @return float      The standard deviation
   */
  public static function standardDev(array $data)
  {
    $mean = static::mean($data);

    $variance = array_sum(array_map(function ($value) use ($mean) {
      return static::standardDevSquare($value, $mean);
    }, $data));

    $standardDev = sqrt ($variance / (count($data) - 1));

    return $standardDev;
  }

  /**
   * Calculate the Z score
   *
   * @param $x       float | int The value for the Z score
   * @param $dataset array       The dataset
   * @return float The Z score
   */
  public static function zScore($x, array $dataset)
  {
    $mean = static::mean($dataset);
    $standardDev = static::standardDev($dataset);

    return ((float) $x - $mean) / $standardDev;
  }
}
